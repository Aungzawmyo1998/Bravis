<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CartController extends Controller
{
    //


    public function addCart (Request $request)
    {
        $uuid = Str::uuid()->toString();
        $price = Product::where('id','=',"$request->product_id")
                ->select('price')
                ->get();
        $qty = 1;

        $price = $price->toArray();
        $total_price = $qty * $price[0]['price'];

        $cart = new Cart();

        $cart->product_id = $request->product_id;
        $cart->customer_id = $request->customer_id;
        $cart->quantity = $qty;
        $cart->totalprice = doubleval($total_price);
        $cart->paymentmethod = "";
        $cart->uuid = $uuid;
        $cart->status = 'active';

        $cart->save();

        return redirect()->back();
    }
}
