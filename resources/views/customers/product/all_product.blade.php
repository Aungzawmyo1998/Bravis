@extends('customers.index')

@section('title','all product')


@section('content')

    <div id="product">
        <div class="main-container">
            <div class="header" style="background-image: url({{ asset('img/customers/home/Title_image.png')}})">
                <h1>All Product</h1>
            </div>
            <div class="product-container">
                <div class="search-container">
                    <form action="" class="search-form">
                        <div class="search-bar" >
                            <input type="text" name="search" class="input" placeholder="Search.....">
                            <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="search-price">
                            <label for="">Sort By : </label>
                            <select class="select" name="" id="">
                                <option value="">Price, low to height</option>
                                <option value="">Price, height to low</option>
                                <option value="">Top Sale</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="item-container">
                    @foreach ($products as $product )


                        <a href="{{ url('customer/product/'.$product->id.'/detail') }}" class="card">
                            <div class="img-container">
                                <img src="{{ asset('img/products/register/'.$product->image)}}" alt="">
                            </div>
                            <div class="data">
                                <p>{{ $product->name}}</p>
                                <p class="price" style="font-weight: 500" >{{ $product->price }} MMK</p>
                            </div>
                        </a>
                    @endforeach


            </div>
        </div>
    </div>


@endsection
