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

/*
|--------------------------------------------------------------------------
| 在route上填入要帶的參數（同傳統get方式， ex: www.xxx.com?var1=1&var2=2
|--------------------------------------------------------------------------
可以直接當作傳遞參數的接口使用
參數依據順序填入（認順序不認名稱）
參數後面打上"?"表示該參數可接收可不接收（但是這樣要在controller設定預設值）
若使用不合法的輸入方式，例如在兩個變數都必須填入的時候只填入一個，則會導向404(預設)
*/
Route::get('route帶入參數/{var1}/{var2}', 'HelloWorldController@inputVar1Var2');
Route::get('route帶入參數_var2不一定要填入/{var1}/{var2?}', 'HelloWorldController@inputVar1Var2_Var2Free');

/*
|--------------------------------------------------------------------------
| 在route帶入參數可以用正規表示法去過濾輸入的格式
|--------------------------------------------------------------------------
若使用不合法的輸入方式，則會導向404(預設)
也可以在App\Providers\RouteServiceProvider設定什麼變數的統一通過規則（ex:第四個route）
*/
Route::get('只能填入數字/{number}', 'HelloWorldController@inputOnlyInt')->where('number', '[0-9]+');
Route::get('只能填入大小寫英文字母/{char}', 'HelloWorldController@inputOnlyChar')->where('char', '[a-zA-Z]+');
Route::get('多個變數多個限制/{number}/{char}', 'HelloWorldController@inputIntAndChar')
    ->where(['number' => '[0-9]+', 'char' => '[a-zA-Z]+']);
Route::get('輸入ID只能是數字/{id}', 'HelloWorldController@inputId_OnlyInt');

/*
|--------------------------------------------------------------------------
| 可以對route另外取名字
|--------------------------------------------------------------------------
controller內有取了名字之後的對應用法
*/
Route::get('可以幫route取名字/{var?}', 'HelloWorldController@nameRoute')->name('named_route');
Route::get('看一下取名字的route', 'HelloWorldController@checkOutNamedRoute');
Route::get('對取過名字的route傳遞參數', 'HelloWorldController@passVarToNamedRoute');
Route::get('重新導向到名為named_route的route', 'HelloWorldController@redirectToNamedRoute');

/*
|--------------------------------------------------------------------------
| 可以在request中取得當前route及其命名的資訊並加以驗證
|--------------------------------------------------------------------------
*/
Route::get('確認是某為當前route命名', 'HelloWorldController@checkRouteName')->name('check_name');
