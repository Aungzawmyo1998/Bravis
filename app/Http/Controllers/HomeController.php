<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

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
    {   $products = Product::orderBY('id','desc')
                ->where('status','active')
                ->whereAny(['small_qty','medium_qty','large_qty'],'>',0)
                ->get();

        return view('customers.product.all_product',compact('products'));
    }
    public function menProduct ()
    {
        $products = Product::where('gender','=','Male')
                            ->where('status','active')
                            ->whereAny(['small_qty','medium_qty','large_qty'],'>',0)
                            ->orderBy('id','desc')
                            ->get();

        return view('customers.product.men_product', compact('products'));
    }
    public function womenProduct ()
    {
        $products = Product::where('gender','=','Female')
                            ->where('status','active')
                            ->whereAny(['small_qty','medium_qty','large_qty'],'>',0)
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
                    ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)
                    ->where('products.status','active')
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
                    ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)
                    ->where('products.status','active')
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
                            ->whereAny(['small_qty','medium_qty','large_qty'],'>',0)

                            ->where('status','active')
                            ->limit(4)
                            ->orderBy('id','desc')
                            ->get();


            return view('customers.product.detail',compact('products','items'));
        }

        if($products->gender == "Female") {

            $items = Product::select('*')
                            ->where('gender','=','Female')
                            ->where('category_id','=',"$products->category_id")
                            ->whereAny(['small_qty','medium_qty','large_qty'],'>',0)

                            ->where('status','active')
                            ->limit(4)
                            ->orderBy('id','desc')
                            ->get();


            return view('customers.product.detail',compact('products','items'));
        }
    }

    // SUCH FUNCTION
    // WOMEN SEARCH

    public function womenSearch (Request $request)
    {

        $search = $request->searchValue;

        $products = DB::table('products')
                    ->join('suppliers','products.supplier_id','=','suppliers.id')
                    ->select('products.*')
                    ->where('products.gender','=','Female')
                    ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)

                    ->where('products.status','active')
                    ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                    ->get();
        // dd($products);
        return json_encode($products);
    }
    // WOMEN SORTING
    public function womenSorting (Request $request)
    {
        // dd($request->sortingValue);
        $sort = $request->sortingValue;
        if($sort == "htl")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->select('products.*')
                        ->where('products.gender','=','Female')
                        ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)

                        ->where('products.status','active')
                        ->orderBy('products.price','desc')
                        ->get();

            return json_encode($products);
        }
        elseif($sort == "lth")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->select('products.*')
                        ->where('products.gender','=','Female')
                        ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)
                        ->where('products.status','active')
                        ->orderBy('products.price')
                        ->get();

            return json_encode($products);
        }
    }

    // MEN SEARCH
    public function menSearch(Request $request)
    {

        // $sort = $request->sort;
        $search = $request->searchValue;

        // MEN LIVE SEARCH

        // dd($request->searchValue);

        $products = DB::table('products')
                    ->join('suppliers','products.supplier_id','=','suppliers.id')
                    ->select('products.*')
                    ->where('products.gender','=','Male')
                    ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)
                    ->where('products.status','active')
                    ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                    ->get();
        // dd($products);
        return json_encode($products);


    }
    // MEN SORTING

    public function menSorting(Request $request)
    {
        $sort = $request->sortingValue;
        if($sort == "htl")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->select('products.*')
                        ->where('products.gender','=','Male')
                        ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)
                        ->where('products.status','active')

                        // ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                        ->orderBy('products.price','desc')
                        ->get();

            return json_encode($products);
        }
        elseif($sort == "lth")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->select('products.*')
                        ->where('products.gender','=','Male')
                        ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)
                        ->where('products.status','active')

                        // ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                        ->orderBy('products.price')
                        ->get();

            return json_encode($products);
        }
    }

    //  ACCESSORIES SEARCH
    public function accessoriesSearch(Request $request)
    {
        // dd($request->all());
        // $sort = $request->sort;
        $search = $request->searchValue;
        $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->join('categories','categories.id','=','products.category_id')
                        ->select('products.*')
                        ->where('categories.name','LIKE','%accessories%')
                        ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)
                        ->where('products.status','active')

                        ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                        // ->orderBy('products.price','desc')
                        ->get();
        return json_encode($products);

    }
    // ACCESSORIES SORTING
    public function accessoriesSorting (Request $request)
    {
        $sort = $request->sortingValue;
        if($sort == "htl")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->join('categories','categories.id','=','products.category_id')
                        ->select('products.*')
                        ->where('categories.name','LIKE','%accessories%')
                        ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)
                        ->where('products.status','active')

                        // ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                        ->orderBy('products.price','desc')
                        ->get();

            return json_encode($products);
        }
        elseif($sort == "lth")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->join('categories','categories.id','=','products.category_id')
                        ->select('products.*')
                        ->where('categories.name','LIKE','%accessories%')
                        ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)
                        ->where('products.status','active')

                        // ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                        ->orderBy('products.price')
                        ->get();

            return json_encode($products);

        }


    }

    // SPORT SEARCH
    public function sportSearch(Request $request)
    {
        // dd($request->all());
        // dd($request->searchValue);
        // $sort = $request->sort;
        $search = $request->searchValue;
        $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->join('categories','categories.id','=','products.category_id')
                        ->select('products.*')
                        ->where('categories.name','LIKE','%sport%')
                        ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)
                        ->where('products.status','active')
                        ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                        ->orderBy('products.price','desc')
                        ->get();

        return json_encode($products);


    }
// SPORT SORTING
    public function sprotSorting (Request $request)
    {
        $sort = $request->sortingValue;
        if($sort == "htl")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->join('categories','categories.id','=','products.category_id')
                        ->select('products.*')
                        ->where('categories.name','LIKE','%sport%')
                        ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)
                        ->where('products.status','active')
                        ->orderBy('products.price','desc')
                        ->get();

                        return json_encode($products);
        }
        elseif($sort == "lth")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->join('categories','categories.id','=','products.category_id')
                        ->select('products.*')
                        ->where('categories.name','LIKE','%sport%')
                        ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)
                        ->where('products.status','active')

                        // ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                        ->orderBy('products.price')
                        ->get();
                        return json_encode($products);
        }
    }

    public function allProductSearch( Request $request)
    {
        $search = $request->searchValue;
        // dd($search);
        // dd($request->searchValue);
        $products = DB::table('products')
                    ->join('suppliers','products.supplier_id','=','suppliers.id')
                    ->select('products.*')
                    // ->where('products.gender','=','Female')
                    ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)
                    ->where('products.status','active')
                    ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                    ->get();
        // dd($products);
        return json_encode($products);
    }

    public function allProductSorting ( Request $request )
    {
        // dd($request->sortingValue);
        $sort = $request->sortingValue;
        // dd($sort);
        if($sort == "htl")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->select('products.*')
                        // ->where('products.gender','=','Male')
                        ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)
                        ->where('products.status','active')

                        // ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                        ->orderBy('products.price','desc')
                        ->get();

            return json_encode($products);
        }
        elseif($sort == "lth")
        {
            $products = DB::table('products')
                        ->join('suppliers','products.supplier_id','=','suppliers.id')
                        ->select('products.*')
                        // ->where('products.gender','=','Male')
                        ->whereAny(['products.small_qty','products.medium_qty','products.large_qty'],'>',0)
                        ->where('products.status','active')

                        // ->whereAny(['suppliers.brandname','products.name'],'LIKE',"%$search%")
                        ->orderBy('products.price')
                        ->get();

            return json_encode($products);
        }


    }



}
