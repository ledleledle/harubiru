<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Posts;
use App\Categories;
use App\Tags;

class BlogController extends Controller
{
    public function index()
    {
    	$articles =  Posts::latest()->paginate(3);
        $widgets =  Posts::latest()->take(5)->get();
    	$categories = Categories::get();
    	$tags = Tags::get();
        return view('front.blog.articles', compact('articles', 'widgets', 'categories', 'tags'));
    }
    public function show($slug)
    {
    	$articles =  Posts::latest()->paginate(3);
        $widgets =  Posts::latest()->take(5)->get();
    	$contents = Posts::where('slug', $slug)->get();
    	$categories = Categories::get();
    	$tags = Tags::get();
        return view('front.blog.article-details', compact('contents', 'widgets', 'articles', 'categories', 'tags'));
    }
}
