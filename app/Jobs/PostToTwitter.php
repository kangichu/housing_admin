<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Abraham\TwitterOAuth\TwitterOAuth;
use Illuminate\Support\Facades\Log;

class PostToTwitter implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $content;
    protected $mediaPath;

    public function __construct($content, $mediaPath = null)
    {
        $this->content = $content;
        $this->mediaPath = $mediaPath;
    }

    public function handle()
    {
        try {
            $twitter = $this->initializeTwitter();

            // Verify the connection by checking the authenticated user
            $response = $twitter->get('account/verify_credentials');
            if ($twitter->getLastHttpCode() != 200) {
                Log::error('Twitter connection failed with HTTP code: ' . $twitter->getLastHttpCode());
                throw new \Exception('Failed to connect to Twitter');
            }

            Log::info('Twitter connection verified: ' . json_encode($response));

            // Process Media Upload
            $mediaId = $this->mediaPath ? $this->uploadMedia($twitter) : null;

            // Post the tweet with or without media
            $params = ['status' => $this->content];
            if ($mediaId) {
                $params['media_ids'] = $mediaId;
            }

            $response = $twitter->post('statuses/update', $params);
            if ($twitter->getLastHttpCode() != 200) {
                throw new \Exception("Failed to post tweet: " . json_encode($response));
            }

            Log::info("Tweet posted successfully: {$this->content}");
        } catch (\Exception $e) {
            Log::error("Error posting tweet: " . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Initialize the Twitter API client.
     *
     * @return TwitterOAuth
     */
    private function initializeTwitter(): TwitterOAuth
    {
        $apiKey = config('services.twitter.client_id');
        $apiSecret = config('services.twitter.client_secret');
        $accessToken = config('services.twitter.access_token');
        $accessTokenSecret = config('services.twitter.access_token_secret');

        Log::info('Twitter API credentials: ' . json_encode([
            'apiKey' => $apiKey,
            'apiSecret' => $apiSecret,
            'accessToken' => $accessToken,
            'accessTokenSecret' => $accessTokenSecret,
        ]));

        $twitter = new TwitterOAuth($apiKey, $apiSecret, $accessToken, $accessTokenSecret);
        $twitter->setTimeouts(10, 30);

        return $twitter;
    }

    /**
     * Upload media to Twitter.
     *
     * @param TwitterOAuth $twitter
     * @return string|null
     * @throws \Exception
     */
    private function uploadMedia(TwitterOAuth $twitter): ?string
    {
        $resolvedPath = storage_path("app/public/{$this->mediaPath}");

        // Log file information
        Log::info('Resolved file path: ' . $resolvedPath);
        Log::info('File size: ' . filesize($resolvedPath) . ' bytes');
        Log::info('File extension: ' . pathinfo($resolvedPath, PATHINFO_EXTENSION));

        if (!file_exists($resolvedPath)) {
            throw new \InvalidArgumentException("File not found at {$resolvedPath}");
        }

        if (!is_readable($resolvedPath)) {
            throw new \InvalidArgumentException("File is not readable at {$resolvedPath}");
        }

        // Upload media to Twitter
        $media = $twitter->upload('media/upload', ['media' => $resolvedPath]);
        Log::info('Media upload response: ' . json_encode($media));

        if (isset($media->media_id_string)) {
            return $media->media_id_string;
        } else {
            $errorMessage = isset($media->errors) ? json_encode($media->errors) : 'Unknown error';
            throw new \Exception("Failed to upload media: {$errorMessage}");
        }
    }
}