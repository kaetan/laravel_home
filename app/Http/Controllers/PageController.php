<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        return view('index');
    }

    public function tremlo()
    {
        return view('tremlo');
    }
}
