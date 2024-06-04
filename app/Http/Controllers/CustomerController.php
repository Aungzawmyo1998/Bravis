<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Customer;


class CustomerController extends Controller
{
    //

    public function customer ()
    {
        return view('admins.customer.list');
    }
    public function register ()
    {
        return view('customers.register');
    }

    public function registerProcess (Request $request)
    {
        $uuid = Str::uuid()->toString();
        $image = $uuid.'.'.$request->image->extension();

        $customer = new Customer();
        $customer -> firstname = $request -> fname;
        $customer -> lastname = $request -> lname;
        $customer -> email = $request -> email;
        $customer -> address = $request -> address;
        $customer -> DOB = $request -> dob;
        $customer -> joining_date = Carbon::now();
        $customer -> phonenumber = $request -> phno;
        $customer -> State_region = $request -> state;
        $customer -> zipcode = $request -> zipcode;
        $customer -> password = bcrypt($request->password);
        $customer -> image = $image;
        $customer -> uuid = $uuid;
        $customer -> status = 'active';

        $customer->save();
        $request->image->move(public_path('img/customers/registers'),$image);

        return redirect()->route('customer.register');

    }
}
