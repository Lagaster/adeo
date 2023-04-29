<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('client_side.index');
    }
    public function projects(){
        return view('client_side.index');
    }
    public function contact(){
        return view('client_side.contact');
    }
    public function programs(){

        $programs =Program::orderBy('id','desc')->paginate(9);
        $programside =Program::orderBy('id','desc')->paginate(4);
        return view('client_side.programs',compact('programs','programside'));
    }
    public function program($id){

        $program =Program::find($id);
        $programside =Program::orderBy('id','desc')->paginate(4);
        return view('client_side.program',compact('program','programside'));
    }
    public function whoweare(){
        return view('client_side.whoweare');
    }
}

