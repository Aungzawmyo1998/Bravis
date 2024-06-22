@extends('customers.index')

@section('title','sport product')


@section('content')

    <div id="product">
        <div class="main-container">
            <div class="header" style="background-image: url({{ asset('img/customers/home/sport-2bg.jpg')}})">
                <h1>SPORT</h1>
            </div>
            <div class="product-container">
                <div class="search-container">
                    <form action="{{route('sport.search')}}" class="search-form" method="get">
                        <div class="search-bar">
                            <input type="text" name="searchValue" class="input" placeholder="Search.....">
                            <button type="submit" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="search-price">
                            <label for="">Sort By : </label>
                            <select class="select" name="sort" id="">
                                <option value="lth">Price, low to height</option>
                                <option value="htl">Price, height to low</option>
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
