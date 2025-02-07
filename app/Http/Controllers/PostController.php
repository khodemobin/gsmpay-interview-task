<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\IndexRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
    public function index(IndexRequest $request, PostService $postService): AnonymousResourceCollection
    {
        $posts = $postService->index($request);

        return PostResource::collection($posts);
    }

    public function show(Request $request, Post $post, PostService $postService): PostResource
    {
        $postService->incrementView($request, $post);

        return new PostResource($post);
    }
}
