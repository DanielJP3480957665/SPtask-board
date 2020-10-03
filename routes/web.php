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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
//ユーザー認証
Route::group(['middleware' => ['auth']],function(){
    Route::resource('tasks','TasksController',['only' => ['index','show']]);
});


Route::get('/', 'TasksController@index');
Route::resource('tasks','TasksController');
Route::get('/home','HomeController@index');

Auth::routes();


