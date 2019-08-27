<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    //
    public function index($id = 1)
    {
        echo $id;
        return view('view/index');
    }
}
