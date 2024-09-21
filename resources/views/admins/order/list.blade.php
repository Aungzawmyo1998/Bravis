@extends('layouts.admin')

@section('title','order')

@section('content')

<div id="order">
    <div class="main-container">
        <h1 class="header">Order</h1>
        <div class="search-icon">
            <i class="fa-solid fa-magnifying-glass"></i>

        </div>

        <div class="search-form">

            <form action="{{ route('order.search') }}" method="get" class="form-container">
                <div class="search-data">
                    <div class="start-date">
                        <label class="label" for="startDate">Order Start Date </label>
                        <input type="text" name="startDate" id="startDate" class="search-input" placeholder="yyyy-mm-dd">
                    </div>
                    <div class="end-date">
                        <label class="label" for="endDate">Order End Date </label>
                        <input type="text" name="endDate" id="endDate" class="search-input" placeholder="yyyy-mm-dd">
                    </div>
                    <input type="text" name="searchValue" class="search-input" id="" placeholder="search">
                </div>
                <button type="submit" class="search-btn">Search</button>
            </form>
        </div>

        <div class="order-list">
            <table class="list-table">
                <thead>
                    <tr class="header-row">
                        <th>Order Id </th>
                        <th>Customer </th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>State/Region</th>
                        <th>Zip Code</th>

                        <th>Price </th>
                        <th>Date </th>
                        <th>Payment Info </th>
                        <th>Status </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($orders as $order )
                    <tr class="data-row">
                        <td>{{ $order->id}}</td>
                        <td> <span>{{ $order->fname/*customers->firstname */}}</span> <span>{{ $order->lname/*customers->lastname*/}}</span> </td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->state }}</td>
                        <td>{{ $order->zip_code }}</td>
                        <td> {{ $order->totalprice}} </td>
                        <td> {{$order->created_at}} </td>
                        <td> {{ $order->paymentmethod}}</td>
                        <td class="detail-container" >
                            <button class="detail-btn"><i class="fa-solid fa-circle-info"></i></button>
                            <span class="status">
                                @if ($order->status == "pending")
                                    <p style="background-color: #F3D950";>Pending</p>
                                @elseif ($order->status == "processing")
                                    <p style="background-color: #63C7FF";>Processing</p>
                                @elseif ($order->status == "delivered")
                                    <p style="background-color: #6DD4B1";>Delivered</p>
                                @endif
                            </span>

                            <div class="order-details">
                                <div class="button-container">
                                    <button id="detailCloseBtn" class="detail-close-btn"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                                <table class="detail-table">
                                    <tr class="header-row">
                                        {{-- <th>Order ID</th> --}}
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Small Qty</th>
                                        <th>Median Qty</th>
                                        <th>Large Qty</th>
                                    </tr>


                                    @foreach ($orderProducts[$order->id] as $orderProduct )


                                        <tr class="data-row">
                                            {{-- <td> {{$orderProduct->order_id}} </td> --}}
                                            <td> {{ $orderProduct->pid }} </td>
                                            <td> {{$orderProduct->pname}} </td>
                                            <td> <img  src="{{asset('img/products/register/'.$orderProduct->pimage)}}" alt=""> </td>
                                            <td> {{ $orderProduct->small_qty }} </td>
                                            <td> {{ $orderProduct->median_qty}} </td>
                                            <td> {{ $orderProduct->large_qty}}</td>
                                        </tr>

                                    @endforeach
                            `</table>
                            </div>
                        </td>
                        <td id="order-edit">
                            @if ( auth('admin')->user()->role->name !== "Staff" )
                                <button class="edit-btn" >Edit</button>
                            @else
                                Not Allow
                            @endif
                            <div>
                                <div class="edit-container">
                                    <button id="orderEditClose" class="close-btn"><i class="fa-solid fa-xmark"></i></button>
                                    <div class="main-container">
                                        <div class="header">
                                            <h3>Update Status</h3>
                                        </div>
                                        <div class="info" >
                                            <p><b>Pending</b> - Customer ordered items and haven't checked by the admins</p>
                                            <p><b>Processing</b> - Order has been checked and start delivering</p>
                                            <p><b>Delivered</b> - Order had been reached to customer</p>
                                        </div>
                                    </div>
                                    <form action="{{ url('/order/edit/'.$order->id)}}" method="get" class="change-form">
                                        @csrf
                                        <div class="select-item">
                                            <label for=""><b>Change:</b></label>
                                            <select name="orderState" id="" class="item">
                                                <option value="pending">Pending</option>
                                                <option value="processing">Processing</option>
                                                <option value="delivered">Delivered</option>
                                            </select>
                                        </div>
                                        <div class="btn-container" style="">
                                            <button type="submit" class="change-btn">Change</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>



            </table>

        </div>
        <div class="pag-container">
            {{ $orders->links('pagination::bootstrap-5')}}
        </div>
    </div>
</div>

@endsection
