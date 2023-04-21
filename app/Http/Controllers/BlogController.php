<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use App\Http\Requests\StoreBlogRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin_side.blog.index', [
            'blogs' => Blog::latest()->lazy(100),
        ]   );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_side.blog.create',[
            'param'=>'create'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::of($request->title)->slug('-');
     
        if($request->hasFile('image')){
            $data['image'] = Storage::disk('public')->put('images/blogs', $request->file('image'));
        }
        try {
            Blog::create($data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Blog Creation Failed');
        }
       
        return redirect()->route('admin-blogs.index')->with('success', 'Blog Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($blogSlug)
    {
        $blog = Blog::where('slug', $blogSlug)->first();
        if(!$blog){
            return redirect()->back()->with('error', 'Blog Not Found');
        }
        return view('admin_side.blog.show', [
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $blogSlug)
    {
        $blog = Blog::where('slug', $blogSlug)->first();
        if(!$blog){
            return redirect()->back()->with('error', 'Blog Not Found');
        }
        return view('admin_side.blog.create', [
            'blog' => $blog,
            'param'=>'edit'
        ]);
    }
  

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, $blogSlug)
    {
        $blog = Blog::where('slug', $blogSlug)->first();
        Validator::make($request->all(), [
            'title' => 'unique:blogs,title,'.$blog->id,
        ])->validate();

        if(!$blog){
            return redirect()->back()->with('error', 'Blog Not Found');
        }
        $data = $request->validated();
        if($data['title'] != $blog->title){
            $data['slug'] = Str::of($request->title)->slug('-');
        }

        if($request->hasFile('image')){
            // Delete old image
            if($blog->image != 'default_blog.png'){
                Storage::disk('public')->delete('images/blogs/'.$blog->image);
            }

            $data['image'] = Storage::disk('public')->put('images/blogs', $request->file('image'));
        }
        try {
            $blog->update($data);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Blog Update Failed');
        }
       
        return redirect()->route('admin-blogs.index')->with('success', 'Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($blogSlug)
    {
        $blog = Blog::where('slug', $blogSlug)->first();
        if(!$blog){
            return redirect()->back()->with('error', 'Blog Not Found');
        }
        try {
             // Delete old image
             if($blog->image != 'default_blog.png'){
                Storage::disk('public')->delete('images/blogs/'.$blog->image);
            }
            $blog->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Blog Deletion Failed');
        }
       
        return redirect()->route('admin-blogs.index')->with('success', 'Blog Deleted Successfully');
    }
}
