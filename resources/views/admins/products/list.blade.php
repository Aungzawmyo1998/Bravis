@extends('layouts.admin')

@section('title','product')

@section('content')

<section id="product">

    <div class="main-container">
        <div class="header">
            <h1>Products</h1>
            <div class="search-icon">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <a href="{{ route('add.product')}}" style="text-decoration: none" class="add-button button"><i class="fa-solid fa-plus"></i>Add Product</a>
        </div>
        {{-- <div class="search-container"> --}}
            <div class="search-form">
                <form action="{{ url('/product/search')}}" class="form-container" method="get">
                    @csrf

                    <div class="search-item">
                        <input type="text" name="product"  placeholder="search prosucts" >
                        <select name="category" id="" class="select-item" >
                            <option value="default" selected>Catagory</option>
                            @foreach ($categories as $category )
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="price" id="" class="" placeholder="price" >
                    </div>
                    <div class="search-button">
                        <button type="submit" class="button " >Filter</button>
                        <a href="{{ route('product.list')}}" style="text-decoration: none" class="button res-btn">Resect</a>
                    </div>
                </form>
            </div>
            <div class="product-list">
                <table class="list-table">
                    <thead >
                        <tr class="header-row">
                            <th>Product</th>
                            <th>Supplier</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{--  --}}
                        @foreach ($products as $product )
                            <tr class="data-row">
                                <td>{{$product->name}}</td>
                                <td>{{$product->suppliers->name}}</td>
                                <td>{{$product->categories->name}}</td>
                                <td>{{$product->price}}</td>
                                <td class="size">
                                    <span>S - {{$product->small_qty}}</span>
                                    <span>M - {{$product->medium_qty}}</span>
                                    <span>L - {{$product->large_qty}}</span>
                                </td>
                                <td class="action">
                                    <form action="{{ url('product/'.$product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        @if ( (auth('admin')->user()->role->name === "Admin" ) || (auth('admin')->user()->role->name === "Manager" ))
                                            <a href="{{ url('product/'.$product->id.'/edit')}}" class="action-btn"><i class="fa-regular fa-pen-to-square"></i></a>
                                            <button type="submit" class="action-btn del-btn" onclick="return confirm('Are you sure want to delete')">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </button>
                                        @endif

                                        @if ( auth('admin')->user()->role->name === "Supervisor" )
                                            <a href="{{ url('product/'.$product->id.'/edit')}}" class="action-btn"><i class="fa-regular fa-pen-to-square"></i></a>
                                        @endif

                                        @if ( auth('admin')->user()->role->name === "Staff" )
                                            Not Allow
                                        @endif
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pagi-container">
                {{ $products->links('pagination::bootstrap-5')}}
            </div>
        {{-- </div> --}}

    </div>

</section>

@endsection
