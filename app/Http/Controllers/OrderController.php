<?php

namespace App\Http\Controllers;

use App\Helpers\AppHelper;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Auth;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $url = config('url.API_URL').'/api/order';
        if (AppHelper::checkLogin()) {
            $order = Order::where('user_id', Auth::user()->id)->get();
            if (!empty($order)) {
                $orderDetail = Order::with(['orderDetail.product'])->get();//dd($orderDetail);
                return view('Order.index', ['orderDetail' => $orderDetail]);
            }else{
                return view('Order.index', ['orderDetail' => $order]);
            }
        }else{
            return redirect('/');
        }

        /*$curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $url,
            CURLOPT_POST => 1,
            CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
            CURLOPT_POSTFIELDS =>http_build_query(array(
                'user_id' => Auth::user()->id
            ))
        ));
        $resp = curl_exec($curl);

        //dump($resp);

        curl_close($curl);

        $obj = json_decode($resp);

        if (Auth::user()) {
            if ($obj->{'status'} == '1') {
                $orderDetail = $obj->{'data'};
                $orderDetail = json_decode(json_encode($orderDetail), true);
                //$orderDetail = array($orderDetail);
                //dd($orderDetail);
                return view('Order.index', ['orderDetail' => $orderDetail]);
            } else {
                return view('Order.index', ['orderDetail' => $order]);
            }
        }else{
            return redirect('/home-page');
        }*/

    }
}
