<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    public function index() {
        //$blogs = Blog::latest()->paginate(20);
        $url = config('url.API_URL').'/api/blog';
        $blogs = Http::get($url)->json('data.data');
        $blogs = AppHelper::instance()->formatData($blogs);

        return view('blog.index', ['blogs' => $blogs]);
    }

    public function detail($id) {
        $url = config('url.API_URL').'/api/blog/blog-detail/'.$id;
//        $blog = Blog::find($id);
//        $blogs = Blog::latest()->take(3)->get();

        $blog = Http::get($url)->json('blog');
        $blogs = Http::get($url)->json('blogs');

        $blog = AppHelper::instance()->formatData($blog);
        $blogs = AppHelper::instance()->formatData($blogs);

        return view('blog.detail', ['blog' => $blog, 'blogs' => $blogs]);
    }
}
