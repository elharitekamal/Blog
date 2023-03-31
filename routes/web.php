<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\CmntlikeController;
use App\Http\Controllers\SearchController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [LoginController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::get('/posts', [PostsController::class, 'index']);
Route::get('/comments/{id}', [CommentsController::class, 'index']);
Route::post('/addpost', [PostsController::class, 'addpost']);
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/signin', [AuthController::class, 'signin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::post('/addcomment/{id}', [CommentsController::class, 'addcomment']);
Route::DELETE('/deletepost/{id}', [PostsController::class, 'deletepost']);
Route::get('edit/{id}', [EditController::class, 'index']);
Route::post('update/{id}', [PostsController::class, 'update']);
Route::post('/like/{id}', [LikesController::class, 'like']);
Route::get('/dislike/{id}', [LikesController::class, 'dislike']);
Route::post('/cmntlike/{id}', [CmntlikeController::class, 'cmntlike']);
Route::get('/cmntdislike/{id}', [CmntlikeController::class, 'cmntdislike']);
Route::post('/search', [SearchController::class, 'search']);