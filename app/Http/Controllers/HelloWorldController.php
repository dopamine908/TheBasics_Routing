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
}
