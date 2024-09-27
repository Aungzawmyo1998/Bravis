<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //

    public function orderList ()
    {
        // $orders = DB::table('orders')
        //             ->join('customers','customers.id','=','orders.customer_id')
        //             ->select('orders.*','customers.firstname as fname','customers.lastname as lname')
        //             ->paginate(6);

        $orders = DB::table('orders')
                    ->join('customer_orders','customer_orders.id','=','orders.co_id')
                    ->select('orders.*','customer_orders.fname as fname','customer_orders.lname as lname','customer_orders.phone','customer_orders.address','customer_orders.zip_code','customer_orders.state')
                    ->paginate(6);


                    // dd($orders);



        $orderProducts = DB::table('order_products')
                        ->join('products','products.id','=','order_products.product_id')
                        ->join('orders','orders.id','=','order_products.order_id')
                        ->select('order_products.*','products.id as pid','products.image as pimage','products.name as pname')
                        ->get()
                        ->groupBy('order_id');

                        // dd($orderProducts);


        return view('admins.order.list',compact('orders','orderProducts'));
    }

    public function orderEdit (Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->orderState;
        $order->update();

        return redirect()->route('order.list');
    }

    // SEARCH //

    public function search(Request $request)
    {

        $orderProducts = DB::table('order_products')
                        ->join('products','products.id','=','order_products.product_id')
                        ->join('orders','orders.id','=','order_products.order_id')
                        ->select('order_products.*','products.id as pid','products.image as pimage','products.name as pname')
                        ->get()
                        ->groupBy('order_id');

        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $searchValue = $request->searchValue;

        // dd($searchValue);

        $name = $searchValue;
        $fname = $searchValue;
        $lname = $searchValue;

        if(strpos($searchValue, ' ') !== false)
        {

            [$fname, $lname] = explode(" ", $searchValue);

        }
        else
        {

            $name = $searchValue;

        }



        if($startDate != null && $searchValue != null && $endDate != null) // 111 -
        {

            // dd("not null");
            $orders = DB::table('orders')
                    ->join('customer_orders','customer_orders.id','=','orders.co_id')
                    ->whereDate('orders.created_at',$startDate)
                    ->whereDate('orders.updated_at',$endDate)
                    ->orWhere('customer_orders.fname','LIKE',"%$fname%")
                    ->orWhere('customer_orders.lname','LIKE',"%$lname%")
                    ->orWhereAny(['customer_orders.fname','customer_orders.lname','customer_orders.address','customer_orders.state'],'LIKE',"%$name%")

                    ->select('orders.*','customer_orders.fname as fname','customer_orders.lname as lname','customer_orders.phone','customer_orders.address','customer_orders.zip_code','customer_orders.state')

                    ->paginate(6)->appends($request->except('page'));


            return view('admins.order.list',compact('orders','orderProducts'));
        }
        elseif ($startDate != null && $searchValue != null && $endDate == null) // 110 -
        {
            $orders = DB::table('orders')
            ->join('customer_orders','customer_orders.id','=','orders.co_id')
            ->whereDate('orders.created_at',$startDate)
            ->orWhere('customer_orders.fname','LIKE',"%$fname%")
            ->orWhere('customer_orders.lname','LIKE',"%$lname%")
            ->orWhereAny(['customer_orders.fname','customer_orders.lname','customer_orders.address','customer_orders.state'],'LIKE',"%$name%")
            ->select('orders.*','customer_orders.fname as fname','customer_orders.lname as lname','customer_orders.phone','customer_orders.address','customer_orders.zip_code','customer_orders.state')

            ->paginate(6)->appends($request->except('page'));
        }
        elseif($startDate == null && $searchValue != null && $endDate != null) // 011 -
        {
            $orders = DB::table('orders')
            ->join('customer_orders','customer_orders.id','=','orders.co_id')
            // ->whereDate('orders.created_at',$startDate)
            ->whereDate('orders.updated_at',$endDate)
            // ->orWhere('orders.id',$name)
            ->orWhere('customer_orders.fname','LIKE',"%$fname%")
            ->orWhere('customer_orders.lname','LIKE',"%$lname%")
            ->orWhereAny(['customer_orders.fname','customer_orders.lname','customer_orders.address','customer_orders.state'],'LIKE',"%$name%")

            // ->orWhereAny(['customers.firstname','customers.lastname'],'LIKE',"%$name%")
            // ->orWhereAny(,'LIKE',"%$name%")

            ->select('orders.*','customer_orders.fname as fname','customer_orders.lname as lname','customer_orders.phone','customer_orders.address','customer_orders.zip_code','customer_orders.state')

            ->paginate(6)->appends($request->except('page'));


            return view('admins.order.list',compact('orders','orderProducts'));

        }
        elseif($startDate == null && $searchValue != null && $endDate == null) // 010 -
        {

            // dd($name);
            $orders = DB::table('orders')
            ->join('customer_orders','customer_orders.id','=','orders.co_id')

            ->orWhere('customer_orders.fname','LIKE',"%$fname%")
            ->orWhere('customer_orders.lname','LIKE',"%$lname%")
            ->orWhereAny(['customer_orders.fname','customer_orders.lname','customer_orders.address','customer_orders.state'],'LIKE',"%$name%")
            ->select('orders.*','customer_orders.fname as fname','customer_orders.lname as lname','customer_orders.phone','customer_orders.address','customer_orders.zip_code','customer_orders.state')
            ->paginate(1)->appends($request->except('page'));


            return view('admins.order.list',compact('orders','orderProducts'));

        }
        //
        elseif($startDate != null && $searchValue == null && $endDate != null) // 101 -
        {
            $orders = DB::table('orders')
            ->join('customer_orders','customer_orders.id','=','orders.co_id')
            ->whereDate('orders.created_at',$startDate)
            ->whereDate('orders.updated_at',$endDate)

            ->select('orders.*','customer_orders.fname as fname','customer_orders.lname as lname','customer_orders.phone','customer_orders.address','customer_orders.zip_code','customer_orders.state')

            ->paginate(6)->appends($request->except('page'));


            return view('admins.order.list',compact('orders','orderProducts'));
        }
        elseif($startDate == null && $searchValue == null && $endDate != null) // 001 -
        {
            $orders = DB::table('orders')
            ->join('customer_orders','customer_orders.id','=','orders.co_id')
            ->whereDate('orders.updated_at',$endDate)

            ->select('orders.*','customer_orders.fname as fname','customer_orders.lname as lname','customer_orders.phone','customer_orders.address','customer_orders.zip_code','customer_orders.state')

            ->paginate(6)->appends($request->except('page'));


            return view('admins.order.list',compact('orders','orderProducts'));
        }
        elseif($startDate != null && $searchValue == null && $endDate == null) // 100 -
        {
            $orders = DB::table('orders')
            ->join('customer_orders','customer_orders.id','=','orders.co_id')
            ->whereDate('orders.created_at',$startDate)
            ->select('orders.*','customer_orders.fname as fname','customer_orders.lname as lname','customer_orders.phone','customer_orders.address','customer_orders.zip_code','customer_orders.state')

            ->paginate(6)->appends($request->except('page'));


            return view('admins.order.list',compact('orders','orderProducts'));
        }
        // elseif()
        elseif ($startDate == null && $searchValue == null && $endDate == null) // 000 -
        {
            // $orders =
            $orders = DB::table('orders')
                    ->join('customer_orders','customer_orders.id','=','orders.co_id')
                    ->select('orders.*','customer_orders.fname as fname','customer_orders.lname as lname','customer_orders.phone','customer_orders.address','customer_orders.zip_code','customer_orders.state')
                    ->paginate(6)->appends($request->except('page'));

            // return view('admins.order.list',compact('orders','orderProducts'));
            return redirect()->route('order.list');
        }
    }

}


