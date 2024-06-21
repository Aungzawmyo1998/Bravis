<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->limit(10)->get();
        return view('customers.home.home',compact('products'));
    }

    public function allProduct ( )
    {   $products = Product::orderBY('id','desc')->get();

        return view('customers.product.all_product',compact('products'));
    }
    public function menProduct ()
    {
        $products = Product::where('gender','=','Male')
                            ->orderBy('id','desc')
                            ->get();

        return view('customers.product.men_product', compact('products'));
    }
    public function womenProduct ()
    {
        $products = Product::where('gender','=','Female')
                            ->orderBy('id','desc')
                            ->get();

        return view('customers.product.women_product', compact('products'));
    }
    //

    // ACCESSORIES PRODUCT
    public function accessoriesProduct()
    {
        $products = Product::join('categories','categories.id','=','products.category_id')
                    ->select('products.*')
                    ->where('categories.name','LIKE','%accessories%')
                    ->orderBy('products.id','desc')
                    ->get();

        return view('customers.product.accessories_product', compact('products'));
    }

    // SPORT
    public function sportProduct()
    {
        $products = Product::join('categories','categories.id','=','products.category_id')
                    ->select('products.*')
                    ->where('categories.name','LIKE','%sport%')
                    ->orderBy('products.id','desc')
                    ->get();

        return view('customers.product.sport', compact('products'));
    }

    // product detal //

    public function productDetail ($id)
    {
        $products = Product::find($id);


        if($products->gender == "Male") {

            $items = Product::select('*')
                            ->where('gender','=','Male')
                            ->where('category_id','=',"$products->category_id")
                            ->limit(4)
                            ->orderBy('id','desc')
                            ->get();


            return view('customers.product.detail',compact('products','items'));
        }

        if($products->gender == "Female") {

            $items = Product::select('*')
                            ->where('gender','=','Female')
                            ->where('category_id','=',"$products->category_id")
                            ->limit(4)
                            ->orderBy('id','desc')
                            ->get();


            return view('customers.product.detail',compact('products','items'));
        }


    }


}
