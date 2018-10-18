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

Route::get('/', 'NewsController@index');

//Route::group(['prefix'=>'news' ] , function(){
//
//    Route::get('','NewsController@index');
//});

Route::resource('news','NewsController',['middleware'=>'usersession']);

Route::post('news/{news}/comment','CommentController@store')->name('news.comment');
Route::get('news/{news}/comment/{comment}/edit','CommentController@edit')->name('comments.edit');
Route::put('news/{news}/comment/{comment}','CommentController@update')->name('comments.update');
Route::delete('news/{news}/comment/{comment}','CommentController@destroy')->name('comments.destroy');




Route::resource('users','UserController',['except' =>

    'create',
    'store'

]);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



