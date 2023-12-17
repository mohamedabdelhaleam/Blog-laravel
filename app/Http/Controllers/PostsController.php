<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostsRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function getAllPosts()
    {
        $posts = Post::with(['users' => function ($q) {
            $q->select('id', 'name', 'email');
        }])->get();
        return response()->json([
            'status' => 'success',
            "data" => ['post' => $posts]
        ]);
    }
    public function getSinglePost($postId)
    {
        $post = Post::with(['users' => function ($q) {
            $q->select('id', 'name', 'email');
        }])->find($postId);
        if (!$post) {
            return response()->json([
                'status' => 'fail',
                'message' => 'can not find post',
                "data" => ['post' => $post]
            ]);
        }
        return response()->json([
            'status' => 'success',
            "data" => ['post' => $post]
        ]);
    }
    public function createPost(PostsRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id
        ]);
        return response()->json([
            'status' => 'success',
            "data" => ['post' => $post]
        ],201);
    }
    public function updatePost(PostsRequest $request, $postId)
    {
        $post = Post::find($postId);
        if (!$post) {
            return response()->json([
                'status' => 'fail',
                'message' => 'can not find post',
                "data" => ['post' => $post]
            ],404);
        }
        $post->update($request->all());
        $post->makeVisible('updated_at');
        return response()->json([
            'status' => 'success',
            "data" => ['post' => $post]
        ]);
    }
    public function deletePost($postId)
    {
        $post = Post::find($postId);
        if (!$post) {
            return response()->json([
                'status' => 'fail',
                'message' => 'can not find post',
                "data" => ['post' => $post]
            ],404);
        }
        $post->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Deleted Successfully'
        ]);
    }
}
