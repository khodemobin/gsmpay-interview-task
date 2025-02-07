<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\IndexRequest;
use App\Http\Resources\PostResource;
use App\Services\PostService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PostController extends Controller
{
    public function index(IndexRequest $request, PostService $postService): AnonymousResourceCollection
    {
        $posts = $postService->index($request);

        return PostResource::collection($posts);
    }
}
