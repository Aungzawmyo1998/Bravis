@extends('customers.index')

@section('title','home')
@section('content')

<div id="home">
    <div class="main-container">
        <div class="header-container">
            <div class="first-container">
                <div class="image-container">
                    <img src="{{ asset('img/customers/home/home.png')}}" alt="">

                </div>
                <div class="data-container">
                    <h1>Express Your Unique Style</h1>
                    <p>Time Classic</p>
                    <a href="" class="shop-btn"> Shop Now <span>&rarr;</span></a>
                </div>
            </div>
        </div>

        {{-- display container --}}
        <div class="display-container">
            <div class="service-container">
                <div class="item-container">
                    <div class="img">
                        <img src="{{ asset('icon/home/payment-cart.png')}}" alt="">
                    </div>
                    <div class="data">
                        <h5>Flexible Payment</h5>
                        <p>Pay with multiple cards</p>
                    </div>
                </div>
                <div class="item-container">
                    <div class="img">
                        <img src="{{ asset('icon/home/delivery-service.png')}}" alt="">
                    </div>
                    <div class="data">
                        <h5>Delivery</h5>
                        <p>Free delivery over 5Lakhs</p>
                    </div>
                </div>
                <div class="item-container">
                    <div class="img">
                        <img src="{{ asset('icon/home/customer-service.png')}}" alt="">

                    </div>
                    <div class="data">
                        <h5>Customer Service</h5>
                        <p>24/7 active</p>
                    </div>
                </div>
            </div>

            {{-- slide container --}}
            <div class="slide-container">

            </div>

            {{-- category container --}}
            <div id="category">
                <div class="category-container">
                    <h1>Ready To Wear Perfection</h1>

                    <div class="item-container">
                        <div class="item1">
                            <h2>Men Fashion</h2>
                        </div>
                        <div class="item2">
                            <h2>Woomen Fashion</h2>
                        </div>
                        <div class="item3">
                            <h2>Accessories</h2>
                        </div>
                        <div class="item4">
                            <h2>Sport Wear</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
