<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\IndexRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Knuckles\Scribe\Attributes\Authenticated;
use Knuckles\Scribe\Attributes\QueryParam;
use Knuckles\Scribe\Attributes\UrlParam;

class PostController extends Controller
{
    #[QueryParam('page', "Pagination's page", required: false, example: '1')]
    #[QueryParam('limit', "Pagination's limit.", required: false, example: '10')]
    #[Authenticated]
    public function index(IndexRequest $request, PostService $postService): AnonymousResourceCollection
    {
        $posts = $postService->index($request);

        return PostResource::collection($posts);
    }

    #[UrlParam('post', 'Them post id.', required: true, example: '1')]
    #[Authenticated]
    public function show(Request $request, Post $post, PostService $postService): PostResource
    {
        $postService->incrementView($request, $post);

        return new PostResource($post);
    }
}
