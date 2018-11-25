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
}
