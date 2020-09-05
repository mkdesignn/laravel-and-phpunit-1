<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class PostController extends Controller
{
    /**
     * @var PostService
     */
    private $postService;

    /**
     * UserController constructor.
     * @param PostService $userService
     */
    public function __construct(PostService $userService)
    {
        $this->postService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        return $this->postService->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePostRequest $request
     * @return PostResource
     */
    public function store(StorePostRequest $request)
    {
        return $this->postService->store($request);
    }

}
