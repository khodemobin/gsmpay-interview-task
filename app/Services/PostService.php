<?php

namespace App\Services;

use App\Http\Requests\Post\IndexRequest;
use App\Models\Post;
use App\Models\PostView;
use Illuminate\Http\Request;

class PostService
{
    /**
     * @throws \Throwable
     */
    public function index(IndexRequest $request)
    {
        return Post::userPosts($request->user()->id)
            ->paginate(page: $request->input('page', 1), perPage: $request->input('limit', 10));
    }

    public function incrementView(Request $request, Post $post): void
    {
        $isViewExists = PostView::query()
            ->where('post_id', $post->id)
            ->where('ip', $request->ip())
            ->exists();

        if ($isViewExists) {
            return;
        }

        $post->increment('view_count');

        PostView::query()->create([
            'post_id' => $post->id,
            'ip' => $request->ip(),
        ]);
    }
}
