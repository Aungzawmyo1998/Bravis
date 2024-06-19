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

        // $price = $cart[$id]["qty"] * $product->price;

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




        return redirect()->back();
    }

    public function updateCart (Request $request) {

        // dd($request->all());


        $cart = session()->get('cart');
        $qty = $request->qty;
        $id = $request->id;

        $product = Product::find($id);


        if(isset($cart[$id]))
        {

            $cart[$id]["qty"] = $qty;

        }
        session()->put('cart',$cart);

    }

    public function deleteProduct(Request $request)
    {
        $id = $request->id;
        $cart = session()->get('cart');

        if(isset($cart[$id]))
        {
            unset($cart[$id]);
            session()->put('cart',$cart);
        }
    }


    // public function updateCart (Request $request )
    // {
    //     dd($request->productID);

    //     $productId = $request->input('product_id');
    //     $action = $request->input('action');

    //     $cart = session()->get('cart', []);

    //     if (isset($cart[$productId])) {
    //         if ($action == 'increase') {
    //             $cart[$productId]["qty"] += 1;
    //         } elseif ($action == 'decrease' && $cart[$productId]["qty"] > 1) {
    //             $cart[$productId]["qty"] -= 1;
    //         }
    //     }

    //     session()->put('cart', $cart);
    // }

    /*

    public function addToCartInc(Request $request)
    {
        // dd($request->all());
        $index = $request->index;
        $incrementNum = session()->get('cart');
        foreach($incrementNum as $key => &$value) {
            if($key == $index) {
                $value['qty'] += 1;
                $value['price'] = $value['price'] * $value["qty"];
                session()->put('cart',$incrementNum);
            }
        }

        $session = session()->get('cart');
        return $session;
    }

    */


}
