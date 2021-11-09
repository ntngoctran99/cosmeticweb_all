<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $typeProducts = DB::table('type_products')
            ->where([
                ['type_products.del_flag', '=', 0],
            ])
            ->get();

        View::share('typeProducts',$typeProducts);
    }
}
