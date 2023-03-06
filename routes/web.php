<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix'=>'dashboard', 'middleware' => 'auth'], function () {
   Route::get('/','PostController@index')->name('dashboard');
   Route::get('/create','PostController@create')->name('post.create');
   Route::post('/','PostController@store')->name('post.store');

   Route::group(['prefix' => '{post}'],function(){
    Route::get('/','PostController@show')->name('post.show');
    Route::get('/edit','PostController@edit')->name('post.edit');
    Route::patch('/','PostController@update')->name('post.update');
    Route::get('/comments','CommentController@index')->name('post.comment');
    Route::post('/comments','CommentController@store')->name('comment.store');
    Route::delete('/','PostController@destroy')->name('post.destroy');
   });
});


require __DIR__.'/auth.php';
