<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Partners;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Show posts in homepgae
        $posts = Post::paginate(3);
        $partner = Partners::paginate(5); 
       
       
        return view('home.index')->with('posts', $posts)->with('partner', $partner);
    }
}
