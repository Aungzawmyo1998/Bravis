<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    // SUCH FUNCTION

    public function womenSearch (Request $request)
    {

        $search = $request->searchValue;

        $products = DB::table('products')
                    ->join('suppliers','products.supplier_id','=','suppliers.id')
                    ->select('products.*')
                    ->where('products.gender','=','Female')
                    ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                    ->get();
        // dd($products);
        return json_encode($products);
    }

    // MEN SEARCH
    public function menSearch(Request $request)
    {
        // dd($request->all());
        $sort = $request->sort;
        $search = $request->searchValue;


        if($sort == "htl")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->select('products.*')
                        ->where('products.gender','=','Male')
                        ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                        ->orderBy('products.price','desc')
                        ->get();

            return view('customers.product.men_product', compact('products'));
        }
        elseif($sort == "lth")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->select('products.*')
                        ->where('products.gender','=','Male')
                        ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                        ->orderBy('products.price')
                        ->get();

        return view('customers.product.men_product', compact('products'));

        }
        else
        {
            $products = DB::table('products')
                        ->where('gender','=','Male')
                        ->get();

            return view('customers.product.men_product', compact('products'));
        }



    }

    //  ACCESSORIES SEARCH
    public function accessoriesSearch(Request $request)
    {
        // dd($request->all());
        $sort = $request->sort;
        $search = $request->searchValue;


        if($sort == "htl")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->join('categories','categories.id','=','products.category_id')
                        ->select('products.*')
                        ->where('categories.name','LIKE','%accessories%')
                        ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                        ->orderBy('products.price','desc')
                        ->get();

            return view('customers.product.accessories_product', compact('products'));
        }
        elseif($sort == "lth")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->join('categories','categories.id','=','products.category_id')
                        ->select('products.*')
                        ->where('categories.name','LIKE','%accessories%')
                        ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                        ->orderBy('products.price')
                        ->get();

            return view('customers.product.accessories_product', compact('products'));

        }
        else
        {
            $products = DB::table('products')
                        ->join('categories','categories.id','=','products.category_id')
                        ->where('categories.name','LIKE','%accessories%')
                        ->get();

            return view('customers.product.accessories_product', compact('products'));
        }
    }

    // SPORT SEARCH
    public function sportSearch(Request $request)
    {
        // dd($request->all());
        $sort = $request->sort;
        $search = $request->searchValue;


        if($sort == "htl")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->join('categories','categories.id','=','products.category_id')
                        ->select('products.*')
                        ->where('categories.name','LIKE','%sport%')
                        ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                        ->orderBy('products.price','desc')
                        ->get();

            return view('customers.product.sport', compact('products'));
        }
        elseif($sort == "lth")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->join('categories','categories.id','=','products.category_id')
                        ->select('products.*')
                        ->where('categories.name','LIKE','%sport%')
                        ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                        ->orderBy('products.price')
                        ->get();

            return view('customers.product.sport', compact('products'));

        }
        else
        {
            $products = DB::table('products')
                        ->join('categories','categories.id','=','products.category_id')
                        ->where('categories.name','LIKE','%accessories%')
                        ->get();

            return view('customers.product.sport', compact('products'));
        }



    }



}
