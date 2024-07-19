@extends('customers.index')

@section('title','all product')


@section('content')

    <div id="product">
        <div class="main-container allProduct">
            <div class="header" style="background-image: url({{ asset('img/customers/home/Title_image.png')}})">
                <h1>All Product</h1>
            </div>
            <div class="product-container">
                <div class="search-container">
                    <div action="" class="search-form">
                        <div class="search-bar" >
                            <input type="text" id="searchValue" name="searchValue" class="input" placeholder="Search.....">
                            <button class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="search-price">
                            <label for="">Sort By : </label>
                            <select class="select" name="" id="sorting">
                                <option value="lth">Price, low to height</option>
                                <option value="htl">Price, height to low</option>
                                <option value="">Top Sale</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="item-container" id="allProduct">
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
