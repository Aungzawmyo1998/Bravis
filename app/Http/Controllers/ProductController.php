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
        $products = Product::get();

        // $count =

        return view('admins.products.list',compact('products'));
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
        $uuid = Str::uuid()->toString();
        $image = $uuid.'.'.$request->image->extension();

        $product = new Product();
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
