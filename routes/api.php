<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

############################# Start Posts ##############################
Route::group(['prefix' => 'posts'], function () {
    Route::get('', [PostsController::class, 'getAllPosts']);
    Route::get('{postId}', [PostsController::class, 'getSinglePost']);
    Route::post('create', [PostsController::class, 'createPost']);
    Route::patch('update/{postId}', [PostsController::class, 'updatePost']);
    Route::delete('delete/{postId}', [PostsController::class, 'deletePost']);
});
############################# End Posts ##############################

############################# Start User ##############################
Route::group(['prefix' => 'users'], function () {
    Route::get('', [UserController::class, 'getAllUsers']);
    Route::get('{userId}', [UserController::class, 'getUserPosts']);
    Route::post('create', [UserController::class, 'createPost']);
    Route::patch('update/{userId}', [UserController::class, 'updatePost']);
    Route::delete('delete/{userId}', [UserController::class, 'deletePost']);
});
############################# End User ##############################
