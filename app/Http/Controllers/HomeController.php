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

}
