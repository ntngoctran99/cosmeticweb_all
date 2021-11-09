<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function index(Request $request)
    {
        if (AppHelper::checkLogin()) {
            $cart_detail = $request->session()->get('cart');
            if (!empty($cart_detail) && count($cart_detail) > 0) {
                $total_price = 0;
                // update product if info change when save session time long
                $cart = $this->queryUpdateCartProduct($cart_detail);

                $request->session()->put('cart', $cart);


                foreach ($cart as $key => $item) {
                    $total_price += $item['quantity'] * $item['detail']->unit_price;
                }
                // dd($cart_detail);
                return view('Cart.cartDetail', ['cart_detail' => $cart_detail, 'total_price' => $total_price]);
            } else {
                return view('Cart.cartDetail', ['cart_detail' => $cart_detail, 'total_price' => 0]);
            }
        }
        else{
            return \Redirect::route('login')
                ->with([
                    'flashLevel' => 'warning',
                    'flashMes'   => 'You must log in first.'
                ]);
        }
    }

    // update info product except the case
    public function queryUpdateCartProduct($cart)
    {
        $ids = array_keys($cart);

        // check value product have in array ids
        $products = Product::whereIn('id', $ids)->get();

        foreach ($cart as $key => $value) {

            foreach ($products as $k => $val) {
                if($val->id === $key){
                    $data = $val;
                }
            }

            if ($data) {
                $cart[$key]['detail'] = $data;
            }
        }

        return $cart;
    }

    public function checkoutBill(Request $request)
    {
        if (AppHelper::checkLogin()) {
            $cart_detail = $request->session()->get('cart');

            //dd($cart_detail);
            if (!empty($cart_detail) && count($cart_detail) > 0) {
                $total_price = 0;
                // update product if info change when save session time long
                $cart = $this->queryUpdateCartProduct($cart_detail);
                //dd($cart_detail);
                $request->session()->put('cart', $cart);

                foreach ($cart as $key => $item) {
                    $total_price += $item['quantity'] * $item['detail']->unit_price;
                }
                return view('Cart.checkout', ['cart_detail' => $cart_detail, 'total_price' => $total_price]);
            }else{
                return view('Cart.cartDetail', ['cart_detail' => $cart_detail, 'total_price' => 0]);
            }
        }
        else{
            return \Redirect::route('login')
                ->with([
                    'flashLevel' => 'warning',
                    'flashMes'   => 'You must log in first.'
                ]);
        }
    }

    public function remove(Request $request)
    {
        try {
            $id = (int)$request->id;
            $cart = $request->session()->get('cart');
            unset($cart[$id]);
            $request->session()->put('cart', $cart);
            return response()->json([
                'status'    => true,
                'message'   => 'remove success'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status'    => false,
                'message'   => $th
            ]);
        }
    }

    public function forgetSession(Request $request)
    {
        try {
            if($request->session()->get('cart')){
                $request->session()->forget('cart');
                return response()->json([
                    'status'    => true,
                    'message'   => 'Success'
                ]);
            }else{
                return response()->json([
                    'status'    => false,
                    'message'   => 'Fail'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status'    => false,
                'message'   => $th
            ]);
        }

    }

    public function add(Request $request)
    {
        try {
            if(!empty($request->all())){

                $id = (int)$request->id;
                $quantity = (int)$request->quantity;

                $product = Product::where('id', $id)->first();
                if($quantity > $product->stock)
                {
                    return response()->json([
                        'status' => -1,
                        'message' => 'Over',
                        'success'  => false
                    ]);
                }
                // get session cart
                $cart = $request->session()->get('cart');

                // check cart exits in session then save quantity
                if (isset($cart[$id])) {
                    $cart[$id]['quantity'] = $cart[$id]['quantity'] + $quantity;
                    if ($cart[$id]['quantity'] > $product->stock)
                    {
                        return response()->json([
                            'status' => -2,
                            'message' => '',
                            'success'  => false
                        ]);
                    }
                }else{
                    $cart[$id]['quantity'] = $quantity;
                    // get product with id
                    //$product = Product::where('id', $id)->first();

                    if(empty($product)){
                        return response()->json([
                            'status' => 'error',
                            'message' => 'Id not exits',
                            'success'  => false
                        ]);
                    }

                    /*if($quantity > $product){
                        return [
                            'status' => 'error',
                            'message' => 'Id not exits',
                            'success'  => false
                        ];
                    }*/

                    // save info product in a array
                    $cart[$id]['detail'] = $product;
                }
                // save session cart
                $request->session()->put('cart', $cart);
                Session::put('carts', $cart);

                return response()->json([
                    'status' => 1,
                    'success' => true,
                    'message' => "Create Cart Successful!",
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => 'Fail',
                'data'  => $th
            ]);
        }

        return response()->json([
            'status' => 1,
            'data' => $cart,
            'message' => "Create Cart Successful!",
        ]);
    }

    public function checkCart(Request $request)
    {
        $cart = $request->session()->get('cart');
        return response()->json([
            'total_items' =>  sizeof($cart)
        ]);
    }

    public function updateQuantity(Request $request){
        $id = (int)$request->id;
        $cart = $request->session()->get('cart');
        if((int)$request->qty > $cart[$id]['detail']->stock)
        {
            $ttprice = $cart[$id]['detail']->unit_price;
            return response()->json([
                'status'    => false,
                'message' => 'Inventory is not enough',
                'ttprice' => $ttprice
            ]);
        }
        $cart[$id]['quantity'] = (int)$request->qty;
        $ttprice = $cart[$id]['detail']->unit_price * $cart[$id]['quantity'];
        $request->session()->put('cart', $cart);
        return response()->json([
            'status'    => true,
            'cart' => $cart,
            'ttprice' => $ttprice
        ]);
    }
}
