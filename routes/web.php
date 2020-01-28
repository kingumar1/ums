<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-user')->group(function (){
    Route::resource('/users', 'UserController', ['except'=> ['show', 'create', 'store']]);
});

Route::get('/posts','PostController@index')->name('posts');
Route::get('/posts/create','PostController@create')->name('post.create');
Route::post('/posts/create','PostController@store')->name('post.store');
Route::get('/posts/{post}/edit','PostController@edit')->name('posts.edit');
Route::put('/posts/{post}','PostController@update')->name('posts.update');
Route::delete('/posts/{post}','PostController@destroy')->name('posts.delete');
