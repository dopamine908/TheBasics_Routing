<?php

namespace App\Http\Controllers\Demo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HaveNameSpaceController extends Controller
{
    /**
     * Hello World!!
     */
    public function HelloWorld() {
        dump('Hello World!!');
    }
}
