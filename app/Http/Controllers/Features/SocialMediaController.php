<?php

namespace App\Http\Controllers\Features;

use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = SocialMedia::all();
        return view('pages.socials.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            try {
                // Process the tags in the post content
                Log::info('Processing tags in the post content');
                $postContent = $this->processTags($request->input('kt_post'), $request->input('tags'));

                // Handle image upload
                Log::info('Handling image upload');
                $postImage = $this->handleImageUpload($request);

                // Generate a unique reference code
                Log::info('Generating a unique reference code');
                $refCode = $this->generateRefCode();

                // Create a new social media post
                Log::info('Creating a new social media post');
                $isSaved = $this->createSocialMediaPost($request, $postContent, $postImage, $refCode);

                if ($isSaved) {
                    return response()->json(['status' => 'success', 'message' => 'Post created successfully.']);
                } else {
                    throw new \Exception('Failed to save the post.');
                }

            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => 'An error occurred while creating the post.'], 500);
            }
        });
    }

    /**
     * Process the tags in the post content.
     *
     * @param  string  $postContent
     * @param  string  $tags
     * @return string
     */
    protected function processTags($postContent, $tags)
    {
        $formattedTags = $this->formatTags($tags);
        return str_replace($tags, $formattedTags, $postContent);
    }

    /**
     * Format the tags.
     *
     * @param  string  $tags
     * @return string
     */
    protected function formatTags($tags)
    {
        $tagsArray = json_decode($tags, true);
        return collect($tagsArray)->map(function ($tag) {
            return '#' . $tag['value'];
        })->join(' ');
    }

    /**
     * Handle image upload.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function handleImageUpload(Request $request)
    {
        if ($request->hasFile('avatar')) {
            Log::info('Uploading the image');
            return $this->uploadDocument($request->file('avatar'));
        }

        Log::info('No image uploaded');
        return null;
    }

    /**
     * Generate a unique reference code.
     *
     * @return string
     */
    protected function generateRefCode()
    {
        return Str::uuid()->toString();
    }

    /**
     * Create a new social media post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $postContent
     * @param  string|null  $avatarPath
     * @param  string  $refCode
     * @return void
     */
    protected function createSocialMediaPost(Request $request, $postContent, $postImage, $refCode)
    {
        $socialMedia = new SocialMedia([
            'post' => $postContent,
            'image' => $postImage['filename'] ?? null,
            'image_path' => $postImage['path'] ?? null,
            'status' => $request->input('status'),
            'platform' => $request->input('platform'),
            'tags' => $this->formatTags($request->input('tags')),
            'schedule' => $request->input('kt_datepicker_schedule'),
            'repeat' => $request->input('repeat'),
            'repeat_every' => $request->input('repeat_every'),
            'repeat_ends' => $request->input('repeat_ends'),
            'referral_code' => $refCode,
        ]);
        Log::info('Saving the social media post');
    
        return $socialMedia->save();
    }

    /**
     * Upload document.
     *
     * @param  \Illuminate\Http\UploadedFile  $data
     * @return string
     */
    private function uploadDocument($data)
    {
        $filenameWithExt = $data->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $data->getClientOriginalExtension();
        $fileNameToStore = $filename . '_' . time() . '.' . $extension;

        $folder_name = 'social_media';

        // Upload Image
        $path = Storage::putFileAs($folder_name, $data, $fileNameToStore);

        return [
            'path' => $path,
            'filename' => $fileNameToStore
        ];
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialMedia $socialMedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SocialMedia  $socialMedia
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialMedia $socialMedia)
    {
        //
    }
}
