<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
############################# Start Posts ##############################
Route::group(['prefix' => 'posts'], function () {
    Route::get('', [PostsController::class, 'getAllPosts']);
    Route::post('create', [PostsController::class, 'createPost']);
    Route::post('update/{postId}', [PostsController::class, 'updatePost']);
    Route::get('delete/{postId}', [PostsController::class, 'deletePost']);
});
############################# End Posts ##############################
