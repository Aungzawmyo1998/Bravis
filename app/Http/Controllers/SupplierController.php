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
        $suppliers = Supplier::get();
        return view('admins.suppliers.list',compact('suppliers'));
    }

    public function addSupplier()
    {
        return view('admins.suppliers.add');
    }

    public function supplierStore(Request $request)
    {
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
        $supplier = Supplier::find($id);

        $supplier->name = $request->name;
        $supplier->brandname = $request->brand;

        $supplier->update();

        return redirect()->route('supplier.list');
    }
}