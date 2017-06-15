<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Category;
use Auth;

class adminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //list all categories in a table.
        $categories = Category::get();
        
        //display pag
        return view('admin.categories.index')->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //display page
        return view('admin.categories.create');
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Vaidation
        //This is how you validate certain fields,
        //The first item in the aray is the name of the form
        //second parameter  in the array is the validation that you want to carry out
        $this->validate($request, [
            'title' => 'required|unique:categories|max:255',
        ]);
        
        //store data into database
        $category = new Category;
        $category->user_id = Auth::user()->id;
        $category->title = $request->title;
        $category->status = 1;
        $category->save();
        
        //flash notifications
        flash("Category $category->title is created")->success();
        
        //redirect page
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id',"=",$id)->first();
        return view('admin.categories.edit')->withCategory($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|unique:categories|max:255',
        ]);
        
        //store data into database
        $category = Category::find($id);
        $category->title = $request->title;
        $category->save();
        
        //flash notification
        flash("Category $category->title has been updated")->success();
        
        //redirect to page
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
