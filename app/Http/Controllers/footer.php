<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class footer extends Controller
{
    public function index()
    {
        $test = "testing!!";
        return view('livewire.partials.footer', ['users' => $test]);
    }
}
