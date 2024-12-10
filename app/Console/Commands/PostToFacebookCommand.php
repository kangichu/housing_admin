<?php

namespace App\Console\Commands;

use App\Models\SocialMedia;
use App\Jobs\PostToFacebook;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class PostToFacebookCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'facebook:post {--batch=10 : Number of posts to process in one run}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Post scheduled social media posts to Facebook';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $batchSize = (int) $this->option('batch') ?: 10;

        // Fetch posts marked as drafts for Facebook
        $socialMediaPosts = SocialMedia::where('status', 'draft')
            ->where('platform', 'LIKE', '%Facebook%')
            ->limit($batchSize)
            ->get();

        if ($socialMediaPosts->isEmpty()) {
            $this->info('No pending posts to process.');
            return 0;
        }

        foreach ($socialMediaPosts as $post) {
            try {
                $content = $post->post;
                $mediaPath = $post->image_path ?? null; // Path to the image, if available

                if (is_null($content)) {
                    $this->error("Post ID {$post->id} has no content.");
                    continue;
                }

                // Dispatch the job
                PostToFacebook::dispatch($content, $mediaPath);

                // Mark the post as dispatched
                $post->update(['status' => 'dispatched']);
                $this->info("Post ID {$post->id} dispatched successfully.");
            } catch (\Exception $e) {
                // Log and mark as error if dispatching fails
                Log::error("Failed to dispatch post ID {$post->id}: {$e->getMessage()}");
                $post->update(['status' => 'error']);
                $this->error("Failed to dispatch Post ID {$post->id}.");
            }
        }

        $this->info('Processed all pending posts for Facebook.');
        return 0;
    }
}