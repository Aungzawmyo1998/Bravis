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
                    <a href="{{ route('customer.allproduct')}}" class="shop-btn"> Shop Now <span>&rarr;</span></a>
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
            <div id="slide">
                <div class="slide-container">
                    <h1>New Arrivals</h1>
                    <button id="previus" class="slide-btn"><i class="fa-solid fa-circle-chevron-left "></i></button>
                    <div class="card-container">
                        @foreach ($products as $product )


                            <a href="{{ url('customer/product/'.$product->id.'/detail') }}" class="card">
                                <div class="img">
                                    <img src="{{asset('img/products/register/'.$product->image)}}" alt="">
                                </div>
                                <div class="data">
                                    <p>{{ $product->name}}</p>
                                    <p>{{ $product->price}} MMK</p>
                                </div>
                            </a>

                        @endforeach

                    </div>
                    <button id="next" class="slide-btn"><i class="fa-solid fa-circle-chevron-right "></i></button>
                    <div class="scroll-bar">
                        <div class="scroll-track">
                            <div class="scroll-thumb"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- category container --}}
            <div id="category">
                <div class="category-container">
                    <h1>Ready To Wear Perfection</h1>

                    <div class="item-container">
                        <a href="{{route('customer.men.product')}}" class="item1" style="background-image: url({{ asset( 'img/customers/home/men_bg.jpg')}})">

                            <h2>Men Fashion</h2>
                        </a>
                        <a href="{{route('customer.women.product')}}" class="item2" style="background-image: url({{ asset('img/customers/home/wonmen_bg.jpg')}})">
                            <h2>Woomen Fashion</h2>
                        </a>
                        <a href="{{route('customer.accessories.product')}}" class="item3" style="background-image: url({{ asset('img/customers/home/accesssorie_bg.jpg')}})">
                            <h2>Accessories</h2>
                        </a>
                        <a href="{{route('customer.sport.product')}}" class="item4" style="background-image: url({{ asset('img/customers/home/sport_bg.jpg')}})">
                            <h2>Sport Wear</h2>
                        </a>
                    </div>
                </div>
            </div>

            <div id="follow-us">
                <div class="follow-container">
                    <h5>Follow us</h5>
                    <h1>@bravisyyo</h1>

                    <div class="img-container">
                        <div class="img"><img src="{{ asset('img/customers/home/follow1.png')}}" alt=""></div>
                        <div class="img"><img src="{{ asset('img/customers/home/follow2.png')}}" alt=""></div>
                        <div class="img"><img src="{{ asset('img/customers/home/follw3.jpg')}}" alt=""></div>
                    </div>

                    <a href="" class="follow-btn">Follow Us</a>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
