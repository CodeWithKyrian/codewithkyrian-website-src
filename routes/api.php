<?php

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

Route::prefix('v1')->namespace('Api\V1')->group(function () {
    Route::middleware(['auth:api', 'verified'])->group(function () {
        // Posts
        Route::post('/posts/{post}/likes', 'PostLikeController@store')->name('posts.likes.store');
        Route::delete('/posts/{post}/likes', 'PostLikeController@destroy')->name('posts.likes.destroy');

        // Users
        Route::apiResource('users', 'UserController')->only('update');

        // Media
    });


    Route::post('/authenticate', 'Auth\AuthenticateController@authenticate')->name('authenticate');

    // Comments
    Route::apiResource('comments', 'CommentController')->only('destroy');

    // Comments
    Route::apiResource('posts.comments', 'PostCommentController')->only('index', 'store', 'update');
    Route::apiResource('users.comments', 'UserCommentController')->only('index');
    Route::apiResource('comments', 'CommentController')->only(['index', 'show']);

    // Posts
    Route::apiResource('posts', 'PostController')->only(['update', 'store', 'destroy', 'index', 'show']);
    // Route::apiResource('users.posts', 'UserPostController')->only('index');

    // // Users
    // Route::apiResource('users', 'UserController')->only(['index', 'show', 'destroy']);

    // Media
    Route::apiResource('media', 'MediaController')->only(['index', 'store']);
});