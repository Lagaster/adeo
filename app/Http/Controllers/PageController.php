<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('client_side.index');
    }
    public function projects(){
        return view('client_side.index');
    }
}
