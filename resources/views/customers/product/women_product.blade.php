@extends('customers.index')

@section('title','wonmen product')


@section('content')

    <div id="product">
        <div class="main-container women">
            <div class="header" style="background-image: url({{ asset('img/customers/home/men_shirt_bg.jpg')}})">
                <h1>Wonmen</h1>
            </div>
            <div class="product-container">
                <div class="search-container">
                    {{-- update from to div --}}
                    <div action="{{route('women.search')}}" class="search-form" method="GET">
                        <div class="search-bar" >
                            <input type="text" id="searchValue" name="search" class="input" placeholder="Search.....">
                            <button type="button" class="search-btn"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                        <div class="search-price">
                            <label for="">Sort By : </label>
                            <select class="select" name="" id="sorting">
                                <option value="lth">Price, low to height</option>
                                <option value="htl">Price, height to low</option>
                                {{-- <option value="">Top Sale</option> --}}
                            </select>
                        </div>
                    </div>
                </div>

                <div class="item-container" id="womenProduct">
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
