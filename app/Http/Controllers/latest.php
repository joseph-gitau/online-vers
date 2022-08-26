<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\view;

class latest extends Controller
{
    public function index()
    {
        return view('latest', ['name' => 'latest']);
    }
}
