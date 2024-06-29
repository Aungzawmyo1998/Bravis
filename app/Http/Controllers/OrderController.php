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
        // $orders = Order::with('customers')
        //                 ->paginate(9);
        $orders = DB::table('orders')
                    ->join('customers','customers.id','=','orders.customer_id')
                    ->select('orders.*','customers.firstname as fname','customers.lastname as lname')
                    ->paginate(9);
        // dd($orders);

        $orderProducts = DB::table('order_products')
                        ->join('products','products.id','=','order_products.product_id')
                        ->join('orders','orders.id','=','order_products.order_id')
                        ->select('order_products.*','products.image as pimage','products.name as pname')
                        ->get()
                        ->groupBy('order_id');

        // $orderProducts =

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
                        ->select('order_products.*','products.image as pimage','products.name as pname')
                        ->get()
                        ->groupBy('order_id');

        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $searchValue = $request->searchValue;
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
            // dd($name);
        }




        if($startDate != null && $searchValue != null && $endDate != null) // 111 -
        {

            // dd("not null");
            $orders = DB::table('orders')
                    ->join('customers','customers.id','=','orders.customer_id')
                    ->whereDate('orders.created_at',$startDate)
                    ->whereDate('orders.updated_at',$endDate)
                    // ->orWhere('orders.id',$name)
                    ->orWhere('customers.firstname','LIKE',"%$fname%")
                    ->orWhere('customers.lastname','LIKE',"%$lname%")
                    ->orWhereAny(['customers.firstname','customers.lastname'],'LIKE',"%$name%")
                    // ->orWhere('customers.firstname','LIKE',"%$name%")
                    // ->orWhere('customers.lastname','LIKE',"%$name%")
                    ->select('orders.*','customers.firstname as fname','customers.lastname as lname')

                    ->paginate(9);


            return view('admins.order.list',compact('orders','orderProducts'));
        }
        elseif ($startDate != null && $searchValue != null && $endDate == null) // 110 -
        {
            $orders = DB::table('orders')
            ->join('customers','customers.id','=','orders.customer_id')
            ->whereDate('orders.created_at',$startDate)
            // ->whereDate('orders.updated_at',$endDate)
            // ->orWhere('orders.id',$name)
            ->orWhere('customers.firstname','LIKE',"%$fname%")
            ->orWhere('customers.lastname','LIKE',"%$lname%")
            ->orWhereAny(['customers.firstname','customers.lastname'],'LIKE',"%$name%")
            ->select('orders.*','customers.firstname as fname','customers.lastname as lname')

            ->paginate(9);
        }
        elseif($startDate == null && $searchValue != null && $endDate != null) // 011 -
        {
            $orders = DB::table('orders')
            ->join('customers','customers.id','=','orders.customer_id')
            // ->whereDate('orders.created_at',$startDate)
            ->whereDate('orders.updated_at',$endDate)
            // ->orWhere('orders.id',$name)
            ->orWhere('customers.firstname','LIKE',"%$fname%")
            ->orWhere('customers.lastname','LIKE',"%$lname%")
            ->orWhereAny(['customers.firstname','customers.lastname'],'LIKE',"%$name%")

            ->select('orders.*','customers.firstname as fname','customers.lastname as lname')

            ->paginate(9);


            return view('admins.order.list',compact('orders','orderProducts'));

        }
        elseif($startDate == null && $searchValue != null && $endDate == null) // 010 -
        {

            // dd($name);
            $orders = DB::table('orders')
            ->join('customers','customers.id','=','orders.customer_id')
            // ->whereDate('orders.created_at',$startDate)
            // ->whereDate('orders.updated_at',$endDate)
            // ->orWhere('orders.id',$name)
            ->orWhere('customers.firstname','LIKE',"%$fname%")
            ->orWhere('customers.lastname','LIKE',"%$lname%")
            ->orWhereAny(['customers.firstname','customers.lastname'],'LIKE',"%$name%")
            // ->orWhere('customers.firstname','LIKE',"%$name%")
            // ->orWhere('customers.lastname','LIKE',"%$name%")
            ->select('orders.*','customers.firstname as fname','customers.lastname as lname')

            ->paginate(9);


            return view('admins.order.list',compact('orders','orderProducts'));

        }
        //
        elseif($startDate != null && $searchValue == null && $endDate != null) // 101 -
        {
            $orders = DB::table('orders')
            ->join('customers','customers.id','=','orders.customer_id')
            ->whereDate('orders.created_at',$startDate)
            ->whereDate('orders.updated_at',$endDate)
            // ->orWhere('orders.id','=',"$searchValue")
            // ->orWhere('customers.firstname','LIKE',"%$firstname%")
            // ->orWhere('customers.lastname','LIKE',"%$lastname%")
            ->select('orders.*','customers.firstname as fname','customers.lastname as lname')

            ->paginate(9);


            return view('admins.order.list',compact('orders','orderProducts'));
        }
        elseif($startDate == null && $searchValue == null && $endDate != null) // 001 -
        {
            $orders = DB::table('orders')
            ->join('customers','customers.id','=','orders.customer_id')
            // ->whereDate('orders.created_at',$startDate)
            ->whereDate('orders.updated_at',$endDate)
            // ->orWhere('orders.id','=',"$searchValue")
            // ->orWhere('customers.firstname','LIKE',"%$firstname%")
            // ->orWhere('customers.lastname','LIKE',"%$lastname%")
            ->select('orders.*','customers.firstname as fname','customers.lastname as lname')

            ->paginate(9);


            return view('admins.order.list',compact('orders','orderProducts'));
        }
        elseif($startDate != null && $searchValue == null && $endDate == null) // 100 -
        {
            $orders = DB::table('orders')
            ->join('customers','customers.id','=','orders.customer_id')
            ->whereDate('orders.created_at',$startDate)
            // ->whereDate('orders.updated_at',$endDate)
            // ->orWhere('orders.id','=',"$searchValue")
            // ->orWhere('customers.firstname','LIKE',"%$firstname%")
            // ->orWhere('customers.lastname','LIKE',"%$lastname%")
            ->select('orders.*','customers.firstname as fname','customers.lastname as lname')

            ->paginate(9);


            return view('admins.order.list',compact('orders','orderProducts'));
        }
        // elseif()
        elseif ($startDate == null && $searchValue == null && $endDate == null) // 000 -
        {
            // $orders =
            $orders = DB::table('orders')
                    ->join('customers','customers.id','=','orders.customer_id')
                    ->select('orders.*','customers.firstname as fname','customers.lastname as lname')
                    ->paginate(9);

            return view('admins.order.list',compact('orders','orderProducts'));
        }
    }

}


