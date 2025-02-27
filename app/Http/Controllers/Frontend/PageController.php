<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Category;
use App\Models\Company;
use App\Models\Post;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    public function __construct()
    {
        $company = Company::first();
        $categories = Category::orderBy('position', 'asc')->get();
        $seo = Seo::first();
        View::share([
            'company' => $company,
            'categories' => $categories,
            'seo' => $seo,

        ]);
    }

    public function home()
    {
        $recentNews = Post::orderBy('id', 'desc')->where('status', 'approved')->limit(12)->get();
        $advertises = Advertise::where('expire_date', '>=', date('Y-m-d',))->get();

        $latest_posts = Post::orderBy('id', 'desc')->where('status', 'approved')->limit(3)->get();
        $trending_posts = Post::orderBy('views', 'desc')->where('status', 'approved')->take(8)->get();
        return view('frontend.home', compact('trending_posts', 'latest_posts','recentNews'));
    }

    public function category($slug)
    {
        $cateogry = Category::find($slug);
        $category = Category::where('slug', $slug)->first();
        $posts = $category->posts()->paginate(10);
        $advertises = Advertise::where('expire_date', '>=', date('Y-m-d',))->get();
        return view('frontend.category', compact('posts', 'advertises','category'));
    }
    public function news($id)
    {
        $news = Post::find($id);
        $news->increment('views');
        $advertises = Advertise::where('expire_date', '>=', date('Y-m-d',))->get();
        $categories = Category::all();
        $related_posts = Post::whereHas('categories', function ($query) use ($news) {
            $query->whereIn('categories.id', $news->categories->pluck('id'));
        })
            ->where('id', '!=', $news->id)
            ->orderBy('id', 'desc')
            ->take(8)
            ->get();
           return view('frontend.news', compact('news', 'advertises', 'related_posts'));
    }
}
