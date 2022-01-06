<?php

use Illuminate\Support\Facades\Route;

Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::resource('posts', 'PostController');
Route::resource('categories', 'CategoryController');
// Route::delete('/posts/{post}/thumbnail', 'PostThumbnailController@destroy')->name('posts_thumbnail.destroy');
// Route::resource('users', 'UserController')->only(['index', 'edit', 'update']);
// Route::resource('comments', 'CommentController')->only(['index', 'edit', 'update', 'destroy']);
// Route::resource('media', 'MediaLibraryController')->only(['index', 'show', 'create', 'store', 'destroy']);
