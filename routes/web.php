<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', 'PostController@index')->name('home');
Route::resource('posts', 'PostController')->only('show');
Route::resource('categories', 'CategoryController')->only('show');
Route::resource('users', 'UserController')->only('show');
Route::get('about', 'MiscController@about')->name('about');

// Route::get('newsletter-subscriptions/unsubscribe', 'NewsletterSubscriptionController@unsubscribe')->name('newsletter-subscriptions.unsubscribe');
Route::feeds();