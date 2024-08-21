<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    //
    public function product ()
    {
        $products = Product::where('status','active')->orderBy('id','desc')->paginate(8);
        $categories = Category::select('name')
                    ->where('status','active')
                    ->groupBy('name')
                    ->get();

        // $count =

        return view('admins.products.list',compact('products', 'categories'));

    }
    public function search (Request $request)
    {
        $product = $request->product;
        $category = $request->category;
        $categories = Category::get();
        $price = intval($request->price) ;

        // dd($price);

        if($request->product == null && $request->category == 'default' && $request->price == null) {
            $products = Product::orderBy('id','desc')->where('status','active')->paginate(8);

            // return view('admins.products.list',compact('products','categories'));
            return redirect()->route('product.list');
        }


        elseif($request->has('product') && $request->category != 'default' && $request->price == null) {
            $products = Product::where('name','LIKE',"%$product%")
                                ->where('category_id','=',"$category")
                                ->where('status','active')
                                ->orderBy('id','desc')
                                ->paginate(8);

                                // dd("2");

            return view('admins.products.list',compact('products','categories'));
        }
        elseif ($request->has('product') && $request->category == 'default' && $request->price == null) {

            $products = Product::where('name','LIKE',"%$product%")
                        ->where('status','active')
                        ->orderBy('id','desc')
                        ->paginate(8);

                        // dd("3");


            return view('admins.products.list',compact('products','categories'));
        }
        elseif ($request->product == null && $request->category == 'default' && $request->has('price')) {

            // dd($price);
            $products = Product::where('price','=',"$price")
                        ->where('status','active')
                        ->orderBy('price')
                        ->paginate(8);

                        // dd("5");

            return view('admins.products.list',compact('products','categories'));
        }
        elseif ($request->has('product') && $request->category == 'default' && $request->has('price')) {

            // dd($product);
            $products = Product::where('price','<=',"$price")
                        ->where('name','LIKE',"%$product%")
                        ->where('status','active')
                        ->orderBy('price','desc')
                        ->paginate(8);

                        // dd("4");


            return view('admins.products.list',compact('products','categories'));

        }
        elseif ($request->product == null && $request->category != 'default' && $request->has('price')) {
            $products = Product::where('price','=<',"$price")
                        ->where('category_id','=',"$category")
                        ->where('status','active')
                        ->orderBy('price','desc')
                        ->paginate(8);

                        // dd("6");

            return view('admins.products.list',compact('products','categories'));

        }
        elseif ($request->has('product') && $request->category != 'default' && $request->has('price')) {
            $products = Product::where('price','=<',"$price")
                        ->where('name','LIKE',"%$product%")
                        ->where('status','active')
                        ->orderBy('price','desc')
                        ->paginate(8);


                        // dd("7");

            return view('admins.products.list',compact('products','categories'));

        }


    }

    public function addProduct ()
    {

        $categories = Category::select('id','name')->where('status','active')->get();
        $brands = Supplier::select('id','brandname')->where('status','active')->get();

        $products = [$categories,$brands];

        return view('admins.products.add',compact('products'));
    }

    public function storeProduct(Request $request )
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required',
            'price' => 'required|integer',
            'small' => 'required|integer',
            'medium' => 'required|integer',
            'large' => 'required|integer',

        ]);

        $uuid = Str::uuid()->toString();
        $image = $uuid.'.'.$request->image->extension();

        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->admin_id = auth('admin')->user()->id;
        $product->supplier_id = $request->brand;
        $product->price = intval($request->price);
        $product->small_qty = $request->small;
        $product->medium_qty = $request->medium;
        $product->large_qty = $request->large;
        $product->gender = $request->gender;
        $product->description = $request->description;
        $product->image = $image;
        $product->uuid = $uuid;
        $product->status = 'active';

        $product->save();

        $request->image->move(public_path('img/products/register'),$image);

        return redirect()->route('product.list');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::select('id','name')->get();
        $brands = Supplier::select('id','brandname')->get();

        $products = [$categories,$brands,$product];

        return view('admins.products.update',compact('products'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            // 'image' => 'required',
            'price' => 'required|integer',
            'small' => 'required|integer',
            'medium' => 'required|integer',
            'large' => 'required|integer',

        ]);
        $uuid = Str::uuid()->toString();


        if ($request->image === null )
        {
            $p = Product::find($id);
            $image = $p["image"];

            // dd($image);
        }
        else
        {
            $image = $uuid.'.'.$request->image->extension();
        }

        // dd($image);

        $product = Product::find($id);

        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->admin_id = auth('admin')->user()->id;
        $product->supplier_id = $request->brand;
        $product->price = intval($request->price);
        $product->small_qty = intval($request->small);
        $product->medium_qty = intval($request->medium);
        $product->large_qty = intval($request->large);
        $product->gender = $request->gender;
        $product->description = $request->description;
        $product->image = $image;
        $product->uuid = $uuid;
        $product->status = 'active';

        $product->update();

        if ( $request->image !== null) {
            $request->image->move(public_path('img/products/register'),$image);
        }



        return redirect()->route('product.list');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->status = 'inactive';
        $product->update();

        return redirect()->back();
    }




}
