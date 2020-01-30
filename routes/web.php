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
Route::get('/posts/{post}','PostController@show')->name('post.show');

Route::get('/categories','CategoryController@index')->name('categories');
Route::get('/categories/create','CategoryController@create')->name('category.create');
Route::post('/categories/create','CategoryController@store')->name('category.store');
Route::get('/categories/{category}/edit','CategoryController@edit')->name('category.edit');
Route::put('/categories/{category}','CategoryController@update')->name('category.update');
Route::delete('/categories/{category}','CategoryController@destroy')->name('category.delete');

Route::post('/post/image/', 'PostController@uploadImage')->name('post.image.upload');
