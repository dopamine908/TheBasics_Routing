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
| definition: Illuminate\Routing\Router
|--------------------------------------------------------------------------
*/


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

/*
|--------------------------------------------------------------------------
| 轉址
|--------------------------------------------------------------------------
Route::redirect預設為302
而301對ＳＥＯ比叫有正向幫助
*/
Route::redirect('here', 'there', 301);
Route::get('here',  function () {
    echo "本來在這裡！";
});
Route::get('there', function () {
    echo "被轉址到這裡拉！";
});

/*
|--------------------------------------------------------------------------
| 直接導向view
|--------------------------------------------------------------------------
大概是靜態網頁會使用的
看起來好像很簡潔
*/
Route::view('直接去view', 'welcome');
Route::view('直接去view還帶變數', 'welcome', ['var' => '這是帶過來的變數']);

