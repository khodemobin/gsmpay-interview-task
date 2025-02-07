<?php

namespace App\Services;

use App\Http\Requests\Post\IndexRequest;
use App\Models\Post;

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
}
