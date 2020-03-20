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

Route::get('/test', 'TestController@test')->name('test');
Route::get('/chats', 'ChatController@index')->name('chat');
Route::any('/upload', 'File\FileController@img')->name('img');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::any('/logout', 'Auth\LoginController@logout')->name('logout');
