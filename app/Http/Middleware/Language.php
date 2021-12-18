<?php

namespace App\Http\Middleware;

use App\Client;
use App\perSellOrder;
use App\perSellOrderItems;
use App\Product;
use App\Tax;
use Closure;

use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Request;

use Illuminate\Foundation\Application;

use Illuminate\Http\Request;

use Illuminate\Routing\Redirector;

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Session;



class Language

{

    /**

     * Handle an incoming request.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \Closure  $next

     * @return mixed

     */

    public function handle($request, Closure $next)

    {
        // dd(Session::get('applocale'));
        if (Session::has('applocale') and array_key_exists(Session::get('applocale'), Config::get('languages'))) {
            App::setLocale(Session::get('applocale'));
        } else { // This is optional as Laravel will automatically set the fallback language if there is none specified
            App::setLocale(Config::get('app.locale'));
        }
        return $next($request);
    }
}
