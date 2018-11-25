<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloWorldController extends Controller
{
    /**
     * echo Hello World from controller
     */
    public function HelloWorld() {
        echo "Hello World from Controller";
    }

    /**
     * route參數接收(按照輸入的順序)
     *
     * @param $input1 接收var1
     * @param $input2 接收var2
     */
    public function inputVar1Var2($input1, $input2) {
        dump($input1);
        dump($input2);
    }

    /**
     * route參數接收(var2後面加上?)
     * 必須要給var2(input2)設定一個預設值
     * @param $input1 接收var1
     * @param null $input2 接收var2
     */
    public function inputVar1Var2_Var2Free($input1, $input2 = null) {
        dump($input1);
        if(!is_null($input2)) {
            dump($input2);
        }else {
            dump('var2可以不填入');
        }

    }

    /**
     * route接收的變數只能是int
     * @param $int
     */
    public function inputOnlyInt($int) {
        dump($int);
    }

    /**
     * route接收的變數只能是大小寫英文字母
     * @param $char
     */
    public function inputOnlyChar($char) {
        dump($char);
    }

    /**
     * route接收的變數第一個只能是int
     * route接收的變數第二個只能是大小寫英文字母
     * @param $int
     * @param $char
     */
    public function inputIntAndChar($int, $char) {
        dump($int);
        dump($char);
    }

    /**
     * 透過App\Providers\RouteServiceProvider設定id的統一通過規則只能是int
     * @param $id
     */
    public function inputId_OnlyInt($id) {
        dump($id);
    }

    /**
     * 取過名字的route
     * @param null $input
     */
    public function nameRoute($input = null) {
        dump('這是一個取過名字的route');
        if(!is_null($input)) {
            dump('傳遞進來的變數為:'.$input);
        }
    }

    /**
     * 取過名字的route可以用route()呼叫完整uri
     */
    public function checkOutNamedRoute() {
        dump(route('named_route'));
    }

    /**
     * 取過名字的route帶入變數的方式
     */
    public function passVarToNamedRoute() {
        $var = '這是一個變數值';
        dump(route('named_route', [ 'var' => $var]));
    }

    /**
     * 重新導向取過名字的route的用法
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToNamedRoute() {
        return redirect()->route('named_route');
    }

    /**
     * 查看當前route & 確認當前route是否為某個名字
     * @param Request $request
     */
    public function checkRouteName(Request $request) {
        dump($request->route()); // \Illuminate\Routing\Route
        dump($request->route()->named('check_name'));
        dump($request->route()->named('false_name'));
    }

}
