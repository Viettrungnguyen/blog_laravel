<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => ['web']], function() {

    // Authentication Routes...
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Registration Routes...
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register');

    // Password Reset Routes...
    Route::get('password/reset/{token}', 'Auth\ForgotPasswordController@showResetForm');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');

    Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
    Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);
    Route::get('/', 'PagesController@getIndex');
    Route::get('/about', 'PagesController@getAbout');
    Route::get('/contact', 'PagesController@getContact');
    Route::post('/contact', 'PagesController@postContact');

    // Post
    Route::resource('/posts', 'PostController');

    // Category
    Route::resource('/categories', 'CategoryController', ['except' => 'create']);

    // Tag
    Route::resource('/tags', 'TagController', ['except' => 'create']);

    // Comment
    Route::post('comment/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store']);
    Route::get('comment/{id}/edit', ['uses' => 'CommentController@edit', 'as' => 'comments.edit']);
    Route::put('comment/{id}', ['uses' => 'CommentController@update', 'as' => 'comments.update']);
    Route::delete('comment/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);
    Route::get('comment/{id}/delete', ['uses' => 'CommentController@delete', 'as' => 'comments.delete']);

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
