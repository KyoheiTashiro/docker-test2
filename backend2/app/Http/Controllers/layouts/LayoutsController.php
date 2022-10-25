<?php

namespace App\Http\Controllers\layouts;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LayoutsController extends Controller
{
    public function layout()
    {
        return view('welcome');
    }
}

//不使用
