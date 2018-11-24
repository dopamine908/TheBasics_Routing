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

/*
|--------------------------------------------------------------------------
| 基本用法
|--------------------------------------------------------------------------
可用的路由器方法
Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);
*/
Route::get('HelloWorld', function () {
    echo "Hello World";
});

Route::get('HelloWorld_controller', 'HelloWorldController@HelloWorld');

/*
|--------------------------------------------------------------------------
| 一個route多種接收
|--------------------------------------------------------------------------
有時候你可能需要註冊一個回應多種 HTTP 動詞的路由
你可以使用 match 方法做到
甚至可以透過 any 方法來註冊回應所有 HTTP 動詞的路由
*/
Route::match(['get', 'post'], 'get_and_post', function () {
    //
});

Route::any('all_type', function () {
    //
});