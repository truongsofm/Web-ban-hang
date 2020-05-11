<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\ProductType;
use App\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header',function($view){
            $product_type = ProductType::all();
            $view->with('product_type',$product_type);
        });
        view()->composer('header',function($view){
            if(Session('cart')){
                $oldcart = Session::get('cart');
                $cart = new Cart($oldcart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
        view()->composer('page.DetailBill',function($view){
            if(Session('cart')){
                $oldcart = Session::get('cart');
                $cart = new Cart($oldcart);
                $view->with(['cart'=>Session::get('cart'),'product_cart'=>$cart->items,'totalPrice'=>$cart->totalPrice,'totalQty'=>$cart->totalQty]);
            }
        });
    }

}
