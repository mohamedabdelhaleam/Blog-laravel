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
        return response()->json($posts);
    }
    public function createPost(PostsRequest $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id
        ]);

        return response()->json($post);
    }
    public function updatePost($postId)
    {
        $posts = Post::get();
        return response()->json($posts);
    }
    public function deletePost($postId)
    {
        $posts = Post::get();
        return response()->json($posts);
    }
}
