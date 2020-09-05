<?php

namespace App\Services;


use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PostService
{
    /**
     * @var Post
     */
    private $post;

    /**
     * UserService constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function store(StorePostRequest $request)
    {
        $userId = Auth::user()->id;
        $createdPost = $this->post->create($request->except(['author_id']) + ['author_id'=>$userId]);

        return new PostResource($createdPost);
    }

    /**
     * @return JsonResource
     */
    public function index() : JsonResource
    {
        $userId = Auth::user()->id;

        $posts = $this->post->get();

        return PostResource::collection($posts);
    }

}
