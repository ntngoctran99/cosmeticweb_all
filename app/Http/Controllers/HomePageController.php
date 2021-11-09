<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomePageController extends Controller
{

    //public $url = 'http://localhost:8000/api/home';
    public function listProducts()
    {
        $url = config('url.API_URL').'/api/home';

        $typeProducts = Http::get($url)->json('key1');
        $productSamples = Http::get($url)->json('key2');
        $latestProducts = Http::get($url)->json('key3');
        $topRatedProducts = Http::get($url)->json('key4');
        $blogs = Http::get($url)->json('key5.data');

        $typeProducts = AppHelper::instance()->formatData($typeProducts);
        $productSamples = AppHelper::instance()->formatData($productSamples);
        $blogs = AppHelper::instance()->formatData($blogs);

        return view('Products.homepage', compact('typeProducts', 'productSamples', 'latestProducts', 'topRatedProducts', 'blogs'));
    }

    public function getTypeProducts()
    {
        $typeProducts = DB::table('type_products')
            ->where([
                ['type_products.del_flag', '=', 0],
            ])
            ->get();
        //dd($typeProducts);
        return view('Common.Header',['typeProducts' => $typeProducts]);
    }

//    private function blogsHome() {
//        $blogs = Blog::latest()->paginate(3);
//        return  $blogs;
//    }


}
