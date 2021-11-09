<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function detailProduct($id){
        /*$status = 1;
        $product = Product::with(['images'])->find($id);
        if (!empty($product)) {

            $list_comment = Review::with(['user'])->where('product_id', $product['id'])->get();
        }
        // return view('Products/detail', ['product' => $product,'comment' => $list_comment]);

        $images = $this->loadImageForProduct($id);
        $avartar = '';
        foreach ($images as $k => $v)
            if ($v->type_image === 1)
                $avartar = $v->image;

        dd($product);
        dd($list_comment);*/

        $url = config('url.API_URL').'/api/products/'.$id;
        $status = Http::get($url)->json('status');
        if($status == -1)
        {
            return \Redirect::route('homepage')
                ->with([
                    'flashLevel' => 'warning',
                    'flashMes'   => 'Product is not exist'
                ]);
        }
        else {
            $product = Http::get($url)->json('key1');
            $list_comment = Http::get($url)->json('key2');
            $images = Http::get($url)->json('key3');
            $avartar = Http::get($url)->json('key4');
        }

        //$images = AppHelper::instance()->formatData($images);
        return view('Products/detail', ['product' => $product,'comment' => $list_comment, 'images' => $images,
                                                'avartar' => $avartar, ]);
    }

    public function loadImageForProduct($id = null)
    {

        $images = DB::table('images')
            ->select(['image', 'type_image'])
            ->where([
                ['product_id', '=', $id],
                ['images.del_flag', '=', 0],
            ])
            ->get();

        return $images;
    }

    public function getProductByType($id = null)
    {
        $url = config('url.API_URL').'/api/products/shop/'.$id;
        $products = Http::get($url)->json('products');
        $products_best_seller = Http::get($url)->json('best_seller');
        $products_latest = Http::get($url)->json('latest');

        //$products_best_seller = AppHelper::instance()->formatData($products_best_seller);
//dd($products_best_seller);
        return view('Products.shop', compact('products', 'products_best_seller', 'products_latest'));
    }

    public function getProductBrand() {
        $url = config('url.API_URL').'/api/products/brand/shop/';
        $products = Http::get($url)->json('data');
        $products = AppHelper::instance()->formatData($products);

        return view('Products.brand', compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request->input("search");
        $products = DB::table('products')
            ->join('images', 'products.id', '=', 'images.product_id')
            ->join('type_products', 'type_products.id', '=', 'products.type_id')
            ->select('images.*', 'products.*')
            ->where([
                ['products.del_flag', '=', 0],
                ['images.del_flag', '=', 0],
                ['type_products.del_flag', '=', 0],
                ['images.type_image', '=', 1],
                ['products.name', 'LIKE', "%{$search}%"],
            ])
            ->orWhere([
                ['products.del_flag', '=', 0],
                ['images.del_flag', '=', 0],
                ['type_products.del_flag', '=', 0],
                ['images.type_image', '=', 1],
                ['type_products.name', 'LIKE', "%{$search}%"],])
            ->get();
        return view('Products.search', compact('products', 'search'));
    }
}
