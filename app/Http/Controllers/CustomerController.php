<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //

    public function customer ()
    {
        $customers = Customer::orderBy('id','desc')->paginate(9);
        // dd($customers);
        return view('admins.customer.list',compact('customers'));
    }

    public function search (Request $request)
    {
        $search = $request->search;


        // dd($search);
        if (empty($search)) {
            $customers = Customer::orderBy('id','desc')->paginate(9);

            return view('admins.customer.list',compact('customers'));

        }

        if (!empty($search)) {
            $customers = Customer::withName($search)
                        ->orWhereAny(['email','phonenumber','address'],'LIKE',"%$search%")
                        ->paginate(9);
            return view('admins.customer.list',compact('customers'));

        }

    }
    public function register ()
    {
        return view('customers.register.register');
    }

    public function registerProcess (Request $request)
    {
        $error_message = [
            'fname.required'=>'first name is required',
            'lname.required'=>'last name is requird',
            'dob.required' => 'date of birth is required',
            'email.required' => 'email is required',
            'email.unique' => 'This email address is already registered.',
            'password.required'=>'password is required',
            'phoneno.required'=>'phone number is required',
            'image.required'=>'image is required',
            'address.required'=>'address is required',
            'stat.required'=>'state is required',
            'zipcode,required'=>'zip code is required',
        ];

        $request->validate([
            'fname'=>'required|max:255|string',
            'lname'=>'required|max:255|string',
            'dob' => 'required|date',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:8',
            'phoneno' => 'required',
            'image' => 'required',
            'address' => 'required',
            'state'=>'required',
            'zipcode'=>'required',
        ],$error_message);

        $uuid = Str::uuid()->toString();
        $image = $uuid.'.'.$request->image->extension();

        $customer = new Customer();
        $customer -> firstname = $request -> fname;
        $customer -> lastname = $request -> lname;
        $customer -> email = $request -> email;
        $customer -> address = $request -> address;
        $customer -> DOB = $request -> dob;
        $customer -> joining_date = Carbon::now();
        $customer -> phonenumber = $request -> phoneno;
        $customer -> State_region = $request -> state;
        $customer -> zipcode = $request -> zipcode;
        $customer -> password = bcrypt($request->password);
        $customer -> image = $image;
        $customer -> uuid = $uuid;
        $customer -> status = 'active';

        $customer->save();
        $request->image->move(public_path('img/customers/registers'),$image);

        return redirect()->route('customer.login');

    }

    public function destroy ($id)
    {
        Customer::find($id)->delete();
        return redirect()->route('customer.list');
    }

    public function logout (Request $request)
    {

     Auth::logout();
     session()->flush();

     return redirect()->route('home');

    }

}
