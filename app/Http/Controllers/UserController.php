<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers(){
        $users = User::get();
        return response()->json([
            'status' => 'success',
            "data" => ['users' => $users]
        ]);
    }
    public function getUserPosts($userId){
        $users = User::with('posts')->find($userId);
        return response()->json([
            'status' => 'success',
            "data" => ['users' => $users]
        ]);
    }
}
