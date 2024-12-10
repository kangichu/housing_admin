<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Facebook\Facebook;
use Facebook\FileUpload\FacebookFile;
use Illuminate\Support\Facades\Log;

class PostToFacebook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $content;
    private ?string $mediaPath;

    /**
     * Create a new job instance.
     *
     * @param string $content
     * @param string|null $mediaPath
     */
    public function __construct(string $content, ?string $mediaPath)
    {
        $this->content = $content;
        $this->mediaPath = $mediaPath;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        Log::info('Starting PostToFacebook job', [
            'content' => $this->content,
            'mediaPath' => $this->mediaPath,
        ]);

        try {
            Log::info('Initializing Facebook SDK');
            [$facebook, $accessToken] = $this->initializeFacebook();

            if (!$accessToken) {
                throw new \Exception("Facebook access token is not set.");
            }

            $data = ['message' => $this->content];

            if ($this->mediaPath) {
                Log::info('Uploading media', [
                    'mediaPath' => $this->mediaPath,
                ]);
                $data['source'] = $this->uploadMedia($facebook);
            }

            Log::info('Posting to Facebook', [
                'data' => $data,
            ]);
            $response = $facebook->post('/me/photos', $data, $accessToken);

            Log::info('Facebook post response', [
                'response' => $response->getDecodedBody(),
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to post to Facebook', [
                'message' => $e->getMessage(),
                'content' => $this->content,
                'mediaPath' => $this->mediaPath,
            ]);
            throw $e;
        }
    }

    /**
     * Initialize the Facebook SDK and retrieve the access token.
     *
     * @return array
     */
    private function initializeFacebook(): array
    {
        $config = config('services.facebook');

        $facebook = new Facebook([
            'app_id' => $config['client_id'],
            'app_secret' => $config['client_secret'],
            'default_graph_version' => 'v10.0',
        ]);

        $accessToken = env('FACEBOOK_ACCESS_TOKEN');

        return [$facebook, $accessToken];
    }

    /**
     * Upload media to Facebook.
     *
     * @param Facebook $facebook
     * @return FacebookFile
     * @throws \Exception
     */
    private function uploadMedia(Facebook $facebook): FacebookFile
    {
        $resolvedPath = storage_path("app/public/{$this->mediaPath}");

        Log::info('Resolved file path', [
            'resolvedPath' => $resolvedPath,
        ]);
        Log::info('File size', [
            'size' => filesize($resolvedPath),
        ]);
        Log::info('File extension', [
            'extension' => pathinfo($resolvedPath, PATHINFO_EXTENSION),
        ]);

        if (!file_exists($resolvedPath)) {
            throw new \InvalidArgumentException("File not found at {$resolvedPath}");
        }

        if (!is_readable($resolvedPath)) {
            throw new \InvalidArgumentException("File is not readable at {$resolvedPath}");
        }

        return new FacebookFile($resolvedPath);
    }
}