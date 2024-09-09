<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Stripe;
use Illuminate\Support\Str;

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
        $cart = session()->get('cart');

        // dd($request->stripeToken);

        if($cart != null) {
            foreach ($cart as $id => $value)
            {
                $unitTotalPrice[] = $value['price'] * $value['qty'];
                $unitTotalItem[] = $value['qty'];

            }

            $totalPrice = array_sum($unitTotalPrice);
            $totalItem = array_sum($unitTotalItem);

        }
        $del_fee = intval($request->delfee);

        $uuid = Str::uuid()->toString();


        if(auth('customer')->user() != null )
        {

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            Stripe\Charge::create ([
                "amount" => $totalPrice * 0.75 ,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
            ]);

            $customer_id = auth('customer')->user()->id;

            $order = new Order();

            $order->customer_id = $customer_id;
            $order->paymentmethod = "Account Transitioin";
            $order->qty = $totalItem;
            $order->totalprice = $totalPrice * 0.75;
            $order->shippingfee = $del_fee;
            $order->uuid = $uuid;
            $order->status = "pending";

            $order->save();

        }

        if(auth('customer')->user() == null )
        {



            $request->validate([
                'phno' => 'required',
                'fname' => 'required|string|max: 255',
                'lname' => 'required|string|max: 255',
                'address' => 'required',
                'state' => 'required',
                'zipcode' => 'required',
            ]);

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            Stripe\Charge::create ([
                "amount" => $totalPrice,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
            ]);

            $customer = new Customer();

            $customer->firstname = $request->fname;
            $customer->lastname = $request->lname;
            $customer->email = $uuid;
            $customer->address = $request->address;
            $customer->DOB = null;
            $customer->joining_date = Carbon::now();
            $customer->phonenumber = $request->phno;
            $customer->State_region = $request->state;
            $customer->zipcode = $request->zipcode;
            $customer->password = "_";
            $customer->image = "_";
            $customer->uuid = $uuid;
            $customer->status = "active";

            $customer->save();

            $customer = Customer::where('uuid','=',"$uuid")
                            ->select('id')
                            ->get();

            $customer_id = $customer[0]->id;
            // dd($customer_id);
            // TO STORE ONE TIME PAYMENT ORDER
            $order = new Order();
            $order->customer_id = $customer_id;
            $order->paymentmethod = "One Time Transitioin";
            $order->qty = $totalItem;
            $order->totalprice = $totalPrice;
            $order->shippingfee = $del_fee;
            $order->uuid = $uuid;
            $order->status = "pending";

            $order->save();

        }

         // STORE DATA TO PRODUCT ORDER TABLE
        $order = Order::where('uuid','=',"$uuid")
                        ->select('id')
                        ->get();

        $order_id = $order[0]->id;

        if($cart != null)
        {
            $product = session()->get('product');
            $small_qty = 0;
            $median_qty = 0;
            $large_qty = 0;

            foreach( $cart as $key => $value)
            {

                if($value['size'] == "small") {
                    $small_qty = $value['qty'];

                }
                if($value['size'] == "median") {
                    $median_qty = $value['qty'];
                }
                if($value['size'] == "large") {
                    $large_qty = $value['qty'];

                }

                $product[$value['id']] = [
                    "id" => $value['id'],
                    "name" => $value['name'],
                    "price" => $value['price'],
                    "image" => $value['image'],
                    "small_qty" => intval($small_qty),
                    "median_qty" => intval($median_qty),
                    "large_qty" => intval($large_qty),
                ];

                session()->put('product',$product);
            }

        }
        foreach ($product as $value)
        {
            $order_product = new OrderProduct();
            $order_product->product_id = $value['id'];
            $order_product->order_id = $order_id;
            $order_product->small_qty = $value['small_qty'];
            $order_product->median_qty = $value['median_qty'];
            $order_product->large_qty = $value['large_qty'];
            $order_product->price = ($value['small_qty']*$value['price']) + ($value['median_qty'] * $value['price']) + ($value['large_qty']*$value['price']);
            $order_product->uuid = $uuid;
            $order_product->status = "active";

            $order_product->save();
        }

        foreach( $product as $value)
        {
            $id = $value['id'];
            $delProduct = Product::find($id);

            $delProduct -> small_qty -= $value["small_qty"];
            $delProduct -> medium_qty -= $value["median_qty"];
            $delProduct -> large_qty -= $value["large_qty"];

            $delProduct->update();

        }



        session()->forget(['cart','product','count']);
        // session()->forget()

        return redirect()->route('payment.success')->with('success', 'Payment successful!');
    }
}
