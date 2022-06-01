<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Auth;

class Postcontroller extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdminOrEditor()){
            $posts = Post::paginate(5);
        }else{
            $posts = Auth::user()->posts()->paginate(5);
        }
        
        return view('admin.blog.index', ['model' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create')->with(['model' => new Post()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        Auth::user()->posts()->save(new Post 
        ($request->only(['title', 'slug', 'excerpt', 'body', 'published_at'])
        ));

        return redirect()->route('blog.index')
        ->with('status', 'The post has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $blog)
    {
        return view('admin.blog.edit')->with('model', $blog);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Post $blog)
    {
        if(auth::user()->cannot('update', $blog)){
            return redirect()->route('blog.index')
            ->with('status', 'you do not have permission to edit that post.');       
         }


         $blog->fill($request->only(['title', 'slug',
         'published_at', 'excerpt', 'body']))->save();

         return redirect()->route('blog.index')
         ->with('status', 'The post was updated.');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $blog)
    {
        if(auth::user()->cannot('delete', $blog)){
            return redirect()->route('blog.index')
            ->with('status', 'you do not have permission to delete that post.');       
         }

         $blog->delete();

         return redirect()->route('blog.index')
         ->with('status', 'The post was deleted.'); 

    }
}
