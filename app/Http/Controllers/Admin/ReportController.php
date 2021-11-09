<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        /*$from_date = '2021-09-01 00:00:00';
        $to_date = '2021-09-11 00:00:00';
        $sql = "SELECT SUM(order_details.quantity) as total, order_details.product_id, products.name
                FROM order_details, products
                WHERE products.id=order_details.product_id AND order_details.order_id in
                    (SELECT orders.id FROM orders WHERE orders.status=2 AND (updated_at BETWEEN '".$from_date."' AND '".$to_date."'))
                    GROUP BY order_details.product_id
                    ORDER BY total DESC";*/
        //dd($sql);
        //$products = DB::select($sql);


        //dd($products);
        return view('admin.pages.reports.index');
    }

    public function filter(Request $request)
    {

        $data = $request->all();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];

        $sql = "SELECT SUM(order_details.quantity) as total, order_details.product_id, products.name
                FROM order_details, products
                WHERE products.id=order_details.product_id AND order_details.order_id in
                    (SELECT orders.id FROM orders WHERE orders.status=2 AND orders.del_flag=0 AND (updated_at BETWEEN '".$from_date."' AND '".$to_date."'))
                    GROUP BY order_details.product_id
                    ORDER BY total DESC";
        $result = DB::select($sql);

        if(empty($result)) {
            return data()->json([
                'status'    => -1,
                'message'   => 'No Data'
            ]);
        }

        foreach ($result as $key => $value)
        {
            $chart_data[] = [
              'total' => $value->total,
                'name' => $value->name
            ];
        }
        echo $data = json_encode($chart_data);
    }
}
