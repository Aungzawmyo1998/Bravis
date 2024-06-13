@extends('customers.index')

@section('title','detail')


@section('content')

    <div id="detail-product">
        <div class="main-container">
            <div class="select-product">
                <div class="img-container">
                    <img src="{{ asset('img/products/register/'.$products->image) }}" alt="">
                </div>
                <div class="data">
                    <h1 style="font-weight: 500;">{{$products->name}}</h1>
                    <p>{{$products->price}} MMK</p>
                    <form action="" class="cart-form">
                        <div class="size-container">
                            <label for="">Size</label>
                            <div class="size-item">
                                <input type="checkbox">
                                <input type="checkbox">
                                <input type="checkbox">
                            </div>
                        </div>
                        <div class="description">
                            <p>{{$products->description}}</p>
                        </div>
                        <div class="btn-container">
                            <button type="submit" class="cart-btn">Add to cart</button>
                            <div class="deli-container">
                                <img src="{{ asset('icon/home/delivery-service.png') }}" alt="">
                                <p>Free Delivery on orders over 5Lakhs</p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="also-like">
                <h1>You may also like</h1>
                <div class="card-container">

                    @foreach($men as $man )
                        <div class="card">
                            <div class="img-container">
                                <img src="{{ asset('img/products/register/'.$man->image) }}" alt="">
                            </div>
                            <div class="data">
                                <p>{{ $man->name }}</p>
                                <p>{{ $man->price}} MMK</p>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>


@endsection
