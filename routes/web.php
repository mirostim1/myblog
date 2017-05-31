<?php

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

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

Route::get('/posts/{category}', ['as'=>'home.posts', 'uses'=>'AdminPostsController@posts']);

Route::group(['middleware' => 'admin'], function() {
    Route::get('admin', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::resource('admin/users', 'AdminUsersController', ['names' => [
        'index'  => 'admin.users.index',
        'create' => 'admin.users.create',
        'store'  => 'admin.users.store',
        'edit'   => 'admin.users.edit'
    ]]);

    Route::resource('admin/posts', 'AdminPostsController', ['names' => [
        'index'  => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store'  => 'admin.posts.store',
        'edit'   => 'admin.posts.edit'
    ]]);

    Route::resource('admin/categories', 'AdminCategoriesController', ['names' => [
        'index'  => 'admin.categories.index',
        'store'  => 'admin.categories.store',
        'edit'   => 'admin.categories.edit'
    ]]);

    Route::resource('admin/media', 'AdminMediaController', ['names' => [
        'index'  => 'admin.media.index',
        'create' => 'admin.media.create',
        'store'  => 'admin.media.store',
        'edit'   => 'admin.media.edit'
    ]]);

    Route::delete('admin/delete/media', 'AdminMediaController@deleteMedia');

});