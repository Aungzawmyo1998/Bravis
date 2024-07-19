@extends('customers.index')

@section('title','detail')

{{--  --}}
@section('content')

    <div id="detail-product">
        <div class="main-container">
            <div class="select-product">
                <div class="img-container">
                    <img src="{{ asset('img/products/register/'.$products->image) }}" alt="">
                </div>
                <div class="data">
                    <h1 style="font-weight: 500;">{{ $products->name }}</h1>
                    <p>{{$products->price}} MMK</p>

                    {{-- update --}}
                    <form action="{{ url('product/'.$products->id.'/add/cart') }}" class="cart-form" method="post">
                        @csrf

                        <div class="size-container">
                            {{-- hidden container --}}
                            <input type="hidden" name="" id="productId" value="{{ $products->id}}">
                            <input type="hidden" id="smallQty" value="{{ $products->small_qty}}">
                            <input type="hidden" id="mediumQty" value="{{ $products->medium_qty}}">
                            <input type="hidden" id="largeQty" value="{{ $products->large_qty}}">


                            {{-- hidden container --}}

                            <label for="">Size</label>
                            <div class="size-item">
                                <input type="radio" checked   name="size" id="small" value="small">
                                @if ($products->small_qty > 0)
                                    <label class="label-1" for="small">S</label>
                                @endif
                                <input  type="radio"   name="size" id="median" value="median">
                                @if($products->medium_qty > 0 )
                                    <label class="label-2" for="median">M</label>
                                @endif
                                <input type="radio"  name="size" id="large" value="large">
                                @if($products->large_qty > 0 )
                                    <label class="label-3" for="large">L</label>
                                @endif
                            </div>
                        </div>
                        <div class="description">
                            <p>{{$products->description}}</p>
                        </div>
                        <div class="btn-container">
                            <button type="submit" id="addToCart" class="cart-btn">Add to cart</button>
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

                    @foreach($items as $item )
                        <a href="{{ url('customer/product/'.$item->id.'/detail') }}" class="card">
                            <div class="img-container">
                                <img src="{{ asset('img/products/register/'.$item->image) }}" alt="">
                            </div>
                            <div class="data">
                                <p>{{ $item->name }}</p>
                                <p>{{ $item->price}} MMK</p>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>


@endsection
