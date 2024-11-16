<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TwitterService
{
    protected $apiKey;
    protected $apiSecret;
    protected $accessToken;
    protected $accessTokenSecret;

    public function __construct($apiKey, $apiSecret, $accessToken, $accessTokenSecret)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
        $this->accessToken = $accessToken;
        $this->accessTokenSecret = $accessTokenSecret;
    }

    private function buildAuthorizationHeader($method, $url, $params)
    {
        $oauth = [
            'oauth_consumer_key' => $this->apiKey,
            'oauth_token' => $this->accessToken,
            'oauth_nonce' => bin2hex(random_bytes(16)),
            'oauth_timestamp' => time(),
            'oauth_signature_method' => 'HMAC-SHA1',
            'oauth_version' => '1.0',
        ];

        $allParams = array_merge($oauth, $params);
        ksort($allParams);

        $baseString = strtoupper($method) . '&' . rawurlencode($url) . '&' . rawurlencode(http_build_query($allParams, '', '&', PHP_QUERY_RFC3986));

        $signingKey = rawurlencode($this->apiSecret) . '&' . rawurlencode($this->accessTokenSecret);
        $oauth['oauth_signature'] = base64_encode(hash_hmac('sha1', $baseString, $signingKey, true));

        $authHeader = 'OAuth ' . urldecode(http_build_query(array_map(fn($k, $v) => "$k=\"$v\"", array_keys($oauth), array_values($oauth)), '', ', '));

        return $authHeader;
    }

    public function postTweet($message)
    {
        $url = "https://api.twitter.com/1.1/statuses/update.json";
        $params = ['status' => $message];

        $authorization = $this->buildAuthorizationHeader('POST', $url, $params);

        $response = Http::withHeaders([
            'Authorization' => $authorization,
            'Content-Type' => 'application/x-www-form-urlencoded',
        ])->post($url, $params);

        if ($response->successful()) {
            return $response->json();
        } else {
            Log::error('Twitter API error: ' . $response->body());
            return [
                'error' => true,
                'message' => 'Failed to post tweet',
                'details' => $response->json()
            ];
        }
    }
}