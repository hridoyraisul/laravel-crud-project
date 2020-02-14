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


Route::get('/page1', 'PostsController@show');
Route::get('/', 'Controller@index');
Route::get('/contact', 'Controller@contact')->name('contact');
Route::get('/about', 'Controller@about')->name('about');
Route::get('/picture', 'Controller@picture')->name('picture');

//write post route
Route::get('/write-post', 'PostsController@writePost')->name('write.post');
Route::post('/add/post','PostsController@addPost')->name('add.post');
Route::get('show/post', 'PostsController@showPost')->name('show.post');
Route::get('/view/post/{id}', 'PostsController@viewPost');
Route::get('/edit/post/{id}','PostsController@editPost');
Route::post('/update/post/{id}', 'PostsController@updatePost');
Route::get('/delete/post/{id}','PostsController@deletePost');


//category route
Route::get('/add-category', 'CategoryController@addCategory')->name('add.category');
Route::get('/show-category', 'CategoryController@showCategory')->name('show.category');
Route::post('/store-category', 'CategoryController@storeCategory')->name('store.category');
Route::get('/view/category/{id}', 'CategoryController@viewCategory');
Route::get('/delete/category/{id}','CategoryController@deleteCategory');
Route::get('/edit/category/{id}','CategoryController@editCategory');
Route::post('/update/category/{id}', 'CategoryController@updateCategory');

//student route
Route::get('/add-student', 'StudentController@addStudent')->name('addstu');
Route::post('/insert', 'StudentController@insertStudent')->name('insertstu');
Route::get('/show-student', 'StudentController@showStudent')->name('showstu');