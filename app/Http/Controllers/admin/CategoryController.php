<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.category.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //


        $request->validate([
            "nepali_title" =>"required",
            "eng_title" =>"required",
        ]);

        $totalcategory = category::count();

        $category = new Category();
        $category->nepali_title = $request->nepali_title;
        $category->eng_title = $request->eng_title;
        $category->slug = str::slug($request->eng_title);
        $category->position = $totalcategory + 1;

        $category->save();

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
        //
        $category = Category::find($id);
        return view('admin.category.edit', data: compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            "nepali_title" =>"required",
            "eng_title" =>"required",
            "position" =>"required",

        ]);

        $category = Category::find($id);
        $category->nepali_title = $request->nepali_title;
        $category->eng_title = $request->eng_title;
        $category->slug = str::slug($request->eng_title);
        $category->position = $request->position;

        $category->update();

        toast('record updated successfully', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $category = Category::find($id);
        $tcategori = category::where('position', '>', $category->position)->get();
        foreach ($tcategori as $tcat){
            $tcat->position = $tcat->position -1;
            $tcat->update();
        }
        $category->delete();
        toast('record deleted successfully', 'success');
        return redirect()->back();

    }
}
