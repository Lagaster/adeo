<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users_count = User::count();
        $users = User::latest()->get();
        $programs = Program::query()->select('id', 'title', 'image','created_at')->get();
        $programs_count = Program::count();
        $blogs_count = Blog::count();
        $blogs = Blog::query()->select('id', 'title','subtitle','slug', 'image','created_at')->take(7)->get();
        
        return view('home',compact('users_count','users','programs','programs_count','blogs_count','blogs'));
    }
}
