<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CompanyResource;
use App\Http\Resources\PostResource;
use App\Models\Advertise;
use App\Models\Category;
use App\Models\Company;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\str;

class ApiController extends Controller
{
    public function categories()
    {
        $categories = Category::orderBy('position', 'asc')->get();
        return CategoryResource::collection($categories);
    }
    public function trending_posts()
    {
        $trending_posts = Post::orderBy('views', 'desc')->where('status', 'approved')->take(8)->get();
        return PostResource::collection($trending_posts);
    }
    public function latest_posts()
    {
        $latest_posts = Post::orderBy('id', 'desc')->where('status', 'approved')->limit(3)->get();
        return PostResource::collection($latest_posts);
    }
    public function recentNews()
    {
        $recentNews = Post::orderBy('id', 'desc')->where('status', 'approved')->limit(12)->get();
        return PostResource::collection($recentNews);
    }
    public function advertises()
    {
        $advertises = Advertise::where('expire_date', '>=', date('Y-m-d',))->get();
        return PostResource::collection($advertises);
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return new CategoryResource($category);
    }
    public function company()
    {
        $company = Company::first();
        return new CompanyResource($company);
    }
    public function create_category(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nepali_title' => 'required',
            'english_title' => 'required',

        ]);

         if ($validator->fails()) {
           return response()->json([
               "status" => false,
               "message" => $validator->errors()
           ]);
        }
        $totalcategory = Category::count();

        $category = new Category();
        $category->nepali_title = $request->nepali_title;
        $category->eng_title = $request->eng_title;
        $category->slug = str::slug($request->eng_title);
        $category->position = $totalcategory + 1;

        $category->save();

        return response()->json([
            "status" => true,
            "message" => "Category created successfully"
        ]);
    }
}
