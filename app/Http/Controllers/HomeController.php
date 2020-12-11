<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Porto;
use App\Models\Category;
use App\Models\Post;

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
        $porto = Porto::get();
        $category = Category::get();
        $post = Post::get();
        $title = 'Dashboard | Page';

        return view('home',compact('title','porto','post','category'));
    }
}
