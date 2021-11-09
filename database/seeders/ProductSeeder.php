<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'san pham 1',
                'description' => "san pham 1",
                'unit_price' => 3,
                'promotion_price'  => 3,
                'unit'  => 'vnd',
                'views'    => 0,
                'type_id'   =>  1,
                'best_seller' =>  0,
                'latest'    =>  0,
                'top_rated' =>  0,
                'sample_home'   => 0,
                'suppliers_id'  =>  0,
            ],
            [
                'name' => 'san pham 2',
                'description' => "san pham 2",
                'unit_price' => 4,
                'promotion_price'  => 4,
                'unit'  => 'vnd',
                'views'    => 0,
                'type_id'   =>  1,
                'best_seller' =>  0,
                'latest'    =>  0,
                'top_rated' =>  0,
                'sample_home'   => 0,
                'suppliers_id'  =>  0,
            ],
            [
                'name' => 'san pham 3',
                'description' => "san pham 3",
                'unit_price' => 5,
                'promotion_price'  => 5,
                'unit'  => 'vnd',
                'views'    => 0,
                'type_id'   =>  1,
                'best_seller' =>  0,
                'best_seller' =>  0,
                'latest'    =>  0,
                'top_rated' =>  0,
                'sample_home'   => 0,
                'suppliers_id'  =>  0,
            ]
        ];
        // Delete and Reset Table
        DB::table('products')->delete();
        DB::statement("ALTER TABLE `products` AUTO_INCREMENT = 1");
        // Insert into table
        DB::table('products')->insert($products);
    }
}
