<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function category()
    {
        $categories = Category::get();
        return view('admins.category.list',compact('categories'));
    }

    public function addCategory()
    {
        return view('admins.category.add');
    }

    public function categoryStore (Request $request)
    {

        $request->validate(
        [
            'name'=>'required|string|max:255|'
        ],
        [
            'name.required'=>'The name must be required'
        ]);

        $uuid = Str::uuid()->toString();

        $category = new Category();
        $category->name = $request->name;
        $category->admin_id = auth('admin')->user()->id;
        $category->uuid = $uuid;
        $category->status = "active";

        $category->save();
        return redirect()->route('category.list');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admins.category.update', compact('category'));
    }

    public function update (Request $request,$id)
    {
        $category = Category::find($id);
        $category->name = $request->name;

        $category->update();
        return redirect()->route('category.list');
    }

    public function destroy (Request $request,$id)
    {
        Category::find($id)->delete();
        return redirect()->back();
    }
}
