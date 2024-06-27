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
        $products = Product::orderBy('id','desc')->paginate(8);
        $categories = Category::get();

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
            $products = Product::orderBy('id','desc')->get();
            // dd("1");
            return view('admins.products.list',compact('products','categories'));
        }


        elseif($request->has('product') && $request->category != 'default' && $request->price == null) {
            $products = Product::where('name','LIKE',"%$product%")
                                ->where('category_id','=',"$category")
                                ->orderBy('id','desc')
                                ->get();

                                // dd("2");

            return view('admins.products.list',compact('products','categories'));
        }
        elseif ($request->has('product') && $request->category == 'default' && $request->price == null) {

            $products = Product::where('name','LIKE',"%$product%")
                        ->orderBy('id','desc')
                        ->get();

                        // dd("3");


            return view('admins.products.list',compact('products','categories'));
        }
        elseif ($request->product == null && $request->category == 'default' && $request->has('price')) {

            // dd($price);
            $products = Product::where('price','=',"$price")
                        ->orderBy('price')
                        ->get();

                        // dd("5");

            return view('admins.products.list',compact('products','categories'));
        }
        elseif ($request->has('product') && $request->category == 'default' && $request->has('price')) {

            // dd($product);
            $products = Product::where('price','<=',"$price")
                        ->where('name','LIKE',"%$product%")
                        ->orderBy('price','desc')
                        ->get();

                        // dd("4");


            return view('admins.products.list',compact('products','categories'));

        }
        elseif ($request->product == null && $request->category != 'default' && $request->has('price')) {
            $products = Product::where('price','=<',"$price")
                        ->where('category_id','=',"$category")
                        ->orderBy('price','desc')
                        ->get();

                        // dd("6");

            return view('admins.products.list',compact('products','categories'));

        }
        elseif ($request->has('product') && $request->category != 'default' && $request->has('price')) {
            $products = Product::where('price','=<',"$price")
                        ->where('name','LIKE',"%$product%")
                        ->orderBy('price','desc')
                        ->get();


                        // dd("7");

            return view('admins.products.list',compact('products','categories'));

        }


    }

    public function addProduct ()
    {

        $categories = Category::select('id','name')->get();
        $brands = Supplier::select('id','brandname')->get();

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
            'image' => 'required',
            'price' => 'required|integer',
            'small' => 'required|integer',
            'medium' => 'required|integer',
            'large' => 'required|integer',

        ]);
        $uuid = Str::uuid()->toString();
        $image = $uuid.'.'.$request->image->extension();

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

        return redirect()->route('product.list');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();

        return redirect()->back();
    }




}
