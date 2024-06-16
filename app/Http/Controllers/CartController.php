<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CartController extends Controller
{
    //


    public function addCart (Request $request,$id)
    {

        $product = Product::find($id);



        $cart = session()->get('cart');

        if(isset($cart[$id]))
        {
            $cart[$id]["qty"]++;
        }
        else
        {
            $cart[$id]= [
                "id" => $id,
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "size" => $request->size,
                "qty" => 1,

            ];
        }

       session()->put('cart',$cart);


    // echo $cart[$id]["qty"];

        return redirect()->back();
    }
}
