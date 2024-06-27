@extends('layouts.admin')

@section('title','order')

@section('content')

<div id="order">
    <div class="main-container">
        <h1 class="header">Order</h1>

        <div class="search-container">

            <form action="" method="" class="search-form">
                <div class="search-data">
                    <div class="start-date">
                        <label class="label" for="startDate">Order Start Date </label>
                        <input type="text" name="startDate" id="startDate" class="search-input" placeholder="dd/mm/yyyy">
                    </div>
                    <div class="end-date">
                        <label class="label" for="endDate">Order End Date </label>
                        <input type="text" name="endDate" id="endDate" class="search-input" placeholder="dd/mm/yyyy">
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
                        <td> <span>{{ $order->customers->firstname}}</span> <span>{{ $order->customers->lastname}}</span> </td>

                        <td> {{ $order->totalprice}} </td>
                        <td> {{$order->created_at}} </td>
                        <td> {{ $order->paymentmethod}}</td>
                        <td class="detail-container" >
                            <button class="detail-btn"><i class="fa-solid fa-circle-info"></i></button> <span>Pending</span>

                            <div class="order-details">
                                <table class="detail-table">
                                    <tr class="header-row">
                                        {{-- <th>Order ID</th> --}}
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Small Qty</th>
                                        <th>Median Qty</th>
                                        <th>Large Qty</th>
                                    </tr>


                                    @foreach ($orderProducts[$order->id] as $orderProduct )


                                        <tr class="data-row">
                                            {{-- <td> {{$orderProduct->order_id}} </td> --}}
                                            <td> {{$orderProduct->pname}} </td>
                                            <td> <img width="100px" src="{{asset('img/products/register/'.$orderProduct->pimage)}}" alt=""> </td>
                                            <td> {{ $orderProduct->small_qty }} </td>
                                            <td> {{ $orderProduct->median_qty}} </td>
                                            <td> {{ $orderProduct->large_qty}}</td>
                                        </tr>

                                    @endforeach
                            `</table>
                            </div>
                        </td>
                        <td><a href="" class="action" >edit</a></td>
                    </tr>
                    @endforeach


                </tbody>



            </table>

        </div>
        <div class="pagi-container">
            {{ $orders->links('pagination::bootstrap-5')}}
        </div>
    </div>
</div>

@endsection
