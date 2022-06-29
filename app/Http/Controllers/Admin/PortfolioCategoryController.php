<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoryp;
use Illuminate\Http\Request;

use Auth;

class PortfolioCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Categoryp::with('children')->whereNull('parent_id')->get();
        return view('admin.pcategory.index')->with(['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
            'name' => 'required|min:3|max:255|string',
            'parent_id' => 'sometimes|nullable|numeric'
        ]);
        Categoryp::create($validatedData);
        return redirect()->route('pcategory.index')     
        ->with('status', 'You have successfully created a Category!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categoryp  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryp_id)
    { 
        $category = Categoryp::find($categoryp_id);
        
        $validatedData = $this->validate($request, [
            'name'  => 'required|min:3|max:255|string'
        ]);

        $category->update($validatedData);
        //dd($validatedData);
        
        return redirect()->route('pcategory.index')     
        ->with('status', 'You have successfully updated a Category!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categoryp  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoryp $category, $categoryp_id)
    {
        $category = Categoryp::find($categoryp_id);

        if ($category->children) {
            foreach ($category->children()->with('portfolios')->get() as $child) {
                foreach ($child->portfolios as $portfolio) {
                    $portfolio->update(['categoryp_id' => NULL]);
                }
            }
            
            $category->children()->delete();
        }

        foreach ($category->portfolios as $portfolio) {
            $portfolio->update(['categoryp_id' => NULL]);
        }

        $category->delete();

        return redirect()->route('pcategory.index')     
        ->with('status', 'You have successfully deleted a Category!');
    }
}
