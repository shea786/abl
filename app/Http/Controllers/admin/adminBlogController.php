<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Blog;
use App\Category;
use App\BlogCategory;

class adminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::withAnyStatus()->get();
        return view('admin.blogs.index')->withBlogs($blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get list of Categories
        $categories = Category::all();
        //display create view
        return view('admin.blogs.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $this->validate($request, [
            'title' => 'required|max:255',
            'slug' => 'required|unique:blogs|max:255',
            'categories' => 'required',
            'content' => 'required'
        ]);
        //store data into database
        $blog = new Blog;
        $blog->user_id = Auth::user()->id;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->content = $request->content;
        //$blog->markApproved();
        $blog->save();
        foreach($request->categories as $category){
            $blogCategory = new BlogCategory;
            $blogCategory->blog_id = $blog->id;
            $blogCategory->category_id = $category;
            $blogCategory->save();
        }
        //flash notifications
        flash("The Blog $blog->slug has successfully been created")->success();
        //notification to creator
        
        //notification to administrators for review
        
        //redirect page
        return redirect()->route('admin.blogs.index');
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
        //
     
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
        //
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
    
    public function markApprove($id){
        $blog = Blog::withAnyStatus()->find($id);
        $blog->markApproved();
        $blog->save();
        
        //flash notification
        flash("The Blog $blog->slug has been approved")->success();
        //redirect
        return redirect()->route('admin.blogs.index');
    }
    
    public function markRejected($id){
        $blog = Blog::withAnyStatus()->find($id);
        $blog->markRejected();
        $blog->save();
        
        //flash notification
        flash("the Blog $blog->slug has been rejected")->error();
        //redirect
        return redirect()->route('admin.blogs.index');
    }
}
