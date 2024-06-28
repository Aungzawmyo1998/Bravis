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
        $orders = Order::with('customers')
                        ->paginate(9);

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

}


