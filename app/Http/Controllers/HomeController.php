<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Partners;
use App\Models\Banner;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Show component in homepgae
        $posts = Post::paginate(3);
        $partner = Partners::paginate(5); 
        $banner = Banner::first(); 
        
       
        return view('home.index')
              ->with('posts', $posts)
              ->with('partner', $partner)
              ->with('banner', $banner);
    }
}
