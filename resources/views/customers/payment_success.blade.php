@extends('customers.index')

@section('title','payment success')
@section('content')

    <div id="payment-success">
        <div class="container">
            <img class="green-mark" src="{{asset('icon/home/green-mark.png')}}" alt="">
            <div class="header">Thank You</div>
            <p>Your order was completely successfully</p>
            <div class="deli">
                <img class="deli-img" src="{{asset('icon/home/delivery-service.png')}}" alt="">
                <p>Your Product will be arrived within one week </p>
            </div>
            <a class="btn" href="{{ route('customer.allproduct')}}">Continue To Shopping</a>
        </div>
    </div>

@endsection
