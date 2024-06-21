<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Hamcrest\Type\IsInteger;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //
    public function checkOut()
    {
        $previousUrl = url()->previous();
        session()->put('url',$previousUrl);

        $cart = session()->get('cart');

        foreach ($cart as $key => $value)
        {

        }

        foreach ($cart as $id => $value)
        {
            $unitTotalPrice[] = $value['price'] * $value['qty'];
            $unitTotalItem[] = $value['qty'];

        }
        $totalPrice = array_sum($unitTotalPrice);
        $totalItem = array_sum($unitTotalItem);


        if( auth('customer')->user() == null)
        {
            return view('customers.payment.payment',['totalPrice'=>$totalPrice , 'totalQty'=>$totalItem]);
        }
        else
        {
            $id = auth('customer')->user()->id;
            $customer = Customer::find($id);

            return view('customers.payment.payment',compact('customer'),['totalPrice'=>$totalPrice , 'totalQty'=>$totalItem]);
        }

    }
}
