<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;

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
Route::get('home', [PostController::class, 'index']);
//Get post to view
// Route::get('view-post/{post}', [PostController::class, 'show'])->where ('postId', '[A-z0-9_\-]+');

// Route::get('category/{category:category_code}', function (Category $category) {
//     return view('home', [
//         'postList' => $category->post
//     ]);
// });

// Route::get('author/{author:user_name}', function (User $author) {
//     return view('home', [
//         'postList' => $author->post
//     ]);
// });

// Route::get('test', [TestingController::class, 'test']);
//Testing API
Route::get('test', [TestingController::class, 'test']);
Route::middleware('auth:api')->post('test', [TestingController::class, 'test']);

//User API
Route::post('user/index', [UserController::class, 'index']);
Route::post('user/show/{user:user_name}', [UserController::class, 'show']);
Route::post('user/store', [UserController::class, 'store']);
Route::middleware('auth:api')->post('user/update', [UserController::class, 'update']);
Route::middleware('auth:api')->post('user/delete', [UserController::class, 'delete']);
Route::post('user/login', [SessionController::class, 'login']);
Route::post('user/logout', [SessionController::class, 'logout']);
Route::post('user/register', [SessionController::class, 'register']);

//Post API
Route::middleware('auth:api')->post('post/index', [PostController::class, 'index']);
Route::middleware('auth:api')->post('post/show/{post}', [PostController::class, 'show']);
Route::middleware('auth:api')->post('post/store', [PostController::class, 'store']);
Route::middleware('auth:api')->post('post/update', [PostController::class, 'update']);
Route::middleware('auth:api')->post('post/delete', [PostController::class, 'delete']);