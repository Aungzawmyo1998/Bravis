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
        // dd($request->size);
        $product = Product::find($id);

        // dd($id);

        $cart = session()->get('cart',[]);
        $size = $request->size;
        $cartkey = $id.'_'.$size;

        if(isset($cart[$cartkey]))
        {
            $cart[$cartkey]["qty"]++;

        }
        else
        {
            $cart[$cartkey]= [
                "id" => $id,
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "size" => $request->size,
                "qty" => 1,
                // "totalPrice" => $cart["qty"] * $cart["price"],

            ];
        }

        session()->put('cart',$cart);

        session()->get('count');
        foreach( $cart as $value)
        {
            $total[] = $value['qty'];
        }
        $total = array_sum($total);

        session()->put('count', $total);

        return redirect()->back()->with('key',$product);

    }

    public function updateCart (Request $request) {

        // dd($request->all());



        $cart = session()->get('cart');
        $qty = $request->qty;
        $id = $request->id;
        $size = $request->size;

        $cartkey = $id.'_'.$size;

        $product = Product::find($id);


        if(isset($cart[$cartkey]))
        {

            $cart[$cartkey]["qty"] = $qty;

        }
        session()->put('cart',$cart);



        session()->get('count');
        foreach( $cart as $value)
        {
            $total[] = $value['qty'];
        }
        $total = array_sum($total);


        session()->put('count', $total);


    }

    public function deleteProduct(Request $request)
    {

        $id = $request->id;
        $size = $request->size;
        $cartkey = $id.'_'.$size;
        $cart = session()->get('cart');

        if(isset($cart[$cartkey]))
        {
            unset($cart[$cartkey]);
            session()->put('cart',$cart);
        }

        session()->get('count');
        foreach( $cart as $value)
        {
            $total[] = $value['qty'];
        }
        $total = array_sum($total);

        session()->put('count', $total);

    }




}
