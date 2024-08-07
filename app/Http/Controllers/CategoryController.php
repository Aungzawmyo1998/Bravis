<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class CategoryController extends Controller
{
    //
    public function category()
    {   $roles = Role::get();
        $categories = Category::with('staffs')
                    ->orderBy('id','desc')
                    ->where('status','active')
                    ->paginate(9); //update category return 'staff'

        return view('admins.category.list',compact('categories','roles'));
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
            'name.required'=>'The name field required'
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
        $request->validate([
            'name'=>'required'
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        // dd(auth('admin')->user()->name);
        // $category->staffs->name = auth('admin')->user()->name;

        $category->update();
        return redirect()->route('category.list');
    }

    public function destroy (Request $request,$id)
    {
        $category = Category::find($id);
        $category->status = 'inactive';
        $category->update();
        return redirect()->back();
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $position = $request->position;

        $roles = Role::get();



        if ( empty($search) && $request->position == "default" ) {

            $categories = Category::orderBy('id','desc')
                        ->where('status','active')
                        ->paginate(9);
            // return view('admins.category.list',compact('categories','roles'));
            return redirect()->route('category.list');
        }

        if (!empty($search) && $position != "default") {
            $categories = Category::join('admins','admins.id','=','categories.admin_id')
                        ->whereAny(['categories.name','admins.name','admins.phone','admins.email'],'LIKE',"%$search%")
                        ->where('categories.status','active')
                        ->where('admins.role_id','=',"$position")
                        ->select('categories.*')
                        ->paginate(9);

            // dd($categories);
            return view('admins.category.list', compact('categories','roles'));



        }

        if( empty($search) &&  $position != "default") {
            $categories = Category::join('admins','categories.admin_id','=','admins.id')
                                    ->where('admins.role_id','=',"$position")
                                    ->where('categories.status','active')
                                    ->select('categories.*')
                                    ->paginate(9);

            return view('admins.category.list', compact('categories','roles'));

        }

        if ( !empty($search) && $request->position == "default") {

            // $categories = DB::table('categories')
            //             -> join('admins','categories.admin_id','=','admins.id')
            //             -> select('categories.*')
            //             ->whereAny(['categories.name','admins.name','admins.phone','admins.phone'],'LIKE',"%$search%")
            //             ->get();

            $categories = Category::join('admins','admins.id', '=','categories.admin_id')

                        ->whereAny(['categories.name','admins.name','admins.phone','admins.email'],'LIKE',"%$search%")
                        ->where('categories.status','active')
                        ->select('categories.*')
                        ->paginate(9);


            return view('admins.category.list', compact('categories','roles'));
        }

        if (empty($search) && $position != "default") {

        }
    }
}
