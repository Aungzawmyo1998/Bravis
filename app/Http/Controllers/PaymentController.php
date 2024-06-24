<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Hamcrest\Type\IsInteger;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Stripe;

class PaymentController extends Controller
{
    //
    public function checkOut(): View
    {
        $previousUrl = url()->previous();
        session()->put('url',$previousUrl);

        $cart = session()->get('cart');

        if($cart != null) {
            foreach ($cart as $id => $value)
            {
                $unitTotalPrice[] = $value['price'] * $value['qty'];
                $unitTotalItem[] = $value['qty'];

            }

            $totalPrice = array_sum($unitTotalPrice);
            $totalItem = array_sum($unitTotalItem);

        }
        else
        {
            return redirect()->back();
        }



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

    public function payment(Request $request): RedirectResponse
    {
        if(auth('customer')->user() != null )
        {
            // dd("register");
            
        }
        else
        {

            $request->validate([
                'phno' => 'required',
                'fname' => 'required|string|max: 255',
                'lname' => 'required|string|max: 255',
                'address' => 'required',
                'state' => 'required',
                'zipcode' => 'required',
            ]);

            dd($request->all());


            $customer = new Customer();

            $customer->firstname = $request->fname;
            $customer->lastname = $request->lname;
            $customer->email = "_";
            $customer->address = $request->address;
            $customer->DOB = "_";
            $customer->joining_date = Carbon::now();
            $customer->phonenumber = $request->phno;
            $customer->State_region = $request->state;
            $customer->zipcode = $request->zipcode;
            $customer->password = "_";
            $customer->image = "_";
            $customer->uuid = "_";
            $customer->status = "_";

            $customer->save();
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));


        Stripe\Charge::create([
            "amount" => 10 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);
        return back()
                ->with('success', 'Payment successful!');
    }
}
