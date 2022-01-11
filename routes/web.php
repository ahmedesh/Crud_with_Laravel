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


Route::get('/' , 'PostController@index')->name('posts.index');


//Route::get('/hello',function (){
//   return view('hello' , ['name' => 'ali' , 'age'=>20 , 'books'=>['html,','css,','js']]);
//});

Route::get('/hello','HelloController@Hi');

// to make atable of posts:
/*
   1- define anew Route
    2- define anew view
    3- define anew controller   4- define posts array
*/
Route::get('/posts' , 'PostController@index')->name('posts.index');

Route::get('/posts/create' , 'PostController@create')->name('posts.create');
Route::post('/posts}' , 'PostController@store')->name('posts.store');
Route::get('/posts/{showPost}/edit' , 'PostController@edit')->name('posts.edit');
Route::put('/posts/{showPost}' , 'PostController@update')->name('posts.update');
Route::delete('/posts/{showPost}' , 'PostController@destroy')->name('posts.destroy');
Route::get('/posts/{showPost}' , 'PostController@show')->name('posts.show');
