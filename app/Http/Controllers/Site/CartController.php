<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class CartController extends BaseController
{

    public function getCart()
    {
//        dd(\Cart::content());

        return view('site.pages.cart');
    }
    public function removeItem( $id){

         $cart = \Cart::content()->firstWhere('id' ,$id);


        \Cart::remove($cart->rowId);
        return $this->responseRedirectBack('deleted' ,'success',false ,false);
    }

    public function clearCart()
    {
        \Cart::destroy();
        return redirect('/');
    }
}
