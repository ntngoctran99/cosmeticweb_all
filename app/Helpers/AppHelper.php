<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Auth;
use \stdClass;

class AppHelper
{
    public function bladeHelper($someValue)
    {
        return "increment $someValue";
    }

    public function startQueryLog()
    {
        \DB::enableQueryLog();
    }

    public function showQueries()
    {
        dd(\DB::getQueryLog());
    }

    public static function instance()
    {
        return new AppHelper();
    }

    public function formatData($array)
    {
        $object = (object)array_map(function($item) { return is_array($item) ? (object)$item :  $item;  }, $array);

        return $object;
    }

    public static function checkLogin()
    {
        if(Auth::user())
            return true;
        else
            return false;
    }

}
