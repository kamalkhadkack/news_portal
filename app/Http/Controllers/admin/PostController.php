<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::orderBy('id','desc')->get();
        return view('admin.post.index', data: compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
         return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            "title" =>"required",
            "image" =>"required",
            "description" =>"required",
            "categories" =>"required",
        ]);


        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->meta_words = $request->meta_words;
        $post->meta_description = $request->meta_description;

        if($request->hasFile('image')){
            $file = $request->File('image');
            $fileName = time(). "." . $file->getClientOriginalExtension();
            $file->move('images', $fileName);
            $post->image = 'images/'. $fileName;

        }

        $post->save();

        $post->categories()->attach($request->categories);

        toast('record saved successfully', 'success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = post::find($id);
        $categories = Category::all();
        return view('admin.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "title" =>"required",
            "description" =>"required",
            "categories" =>"required",
        ]);


        $post = post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->meta_words = $request->meta_words;
        $post->meta_description = $request->meta_description;
        $post->status = $request->status;

        if($request->hasFile('image')){
            $file = $request->File('image');
            $fileName = time(). "." . $file->getClientOriginalExtension();
            $file->move('images', $fileName);
            $post->image = 'images/'. $fileName;

        }

        $post->update();

        $post->categories()->sync($request->categories);

        toast('record updated successfully', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $post->delete();
        toast('record delete successfully','delete');
        return redirect()->back();

    }
}
