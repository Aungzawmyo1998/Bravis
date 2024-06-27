<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SupplierController extends Controller
{
    //
    public function supplier()
    {
        $suppliers = Supplier::orderBy('id','desc')->paginate(9);

        $brands = Supplier::select('brandname')
                ->groupBy('brandname')
                ->get();
        return view('admins.suppliers.list',compact('suppliers','brands'));
    }

    public function addSupplier()
    {
        return view('admins.suppliers.add');
    }

    public function supplierStore(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255|string',
            'brand'=>'required',

        ]);

        $uuid = Str::uuid()->toString();

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->brandname = $request->brand;
        $supplier->uuid = $uuid;
        $supplier->status = 'active';
        $supplier->save();

        return redirect()->route('supplier.list');

    }

    public function destroy($id)
    {
        Supplier::find($id)->delete();
        return redirect()->back();
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);

        return view('admins.suppliers.update',compact('supplier'));
    }

    public function update( Request $request,$id)
    {
        $request->validate([
            'name'=>'required|max:255|string',
            'brand'=>'required',

        ]);

        $supplier = Supplier::find($id);

        $supplier->name = $request->name;
        $supplier->brandname = $request->brand;

        $supplier->update();

        return redirect()->route('supplier.list');
    }

    public function search (Request $request)
    {
        $brands = Supplier::select('brandname')
                ->groupBy('brandname')
                ->paginate(9);

        $search = $request->search;
        $brand = $request->brand;

        if(empty($search) && $brand == "default") {
            $suppliers = Supplier::orderBy('id','desc')->paginate(9);
            return view('admins.suppliers.list',compact('suppliers','brands'));
        }

        if(!empty($search) && $brand != "default") {

            $suppliers = Supplier::where('name','LIKE',"%$search%")
                        ->where('brandname','LIKE',"$brand")
                        ->paginate(9);

            return view('admins.suppliers.list',compact('suppliers','brands'));
        }

        if(empty($search) && $brand != "default") {

            $suppliers = Supplier::where('brandname','LIKE',"$brand")
                        ->paginate(9);

            return view('admins.suppliers.list',compact('suppliers','brands'));
        }
        if(!empty($search) && $brand == "default") {

            $suppliers = Supplier::where('name','LIKE',"%$search%")
                        ->paginate(9);

            return view('admins.suppliers.list',compact('suppliers','brands'));
        }


    }
}
