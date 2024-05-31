@extends('layouts.admin')

@section('title','product')

@section('content')

<section id="product-main">

    <div class="main-container">
        <div class="product-header">
            <h1>Products</h1>
            <a href="{{ route('add.product')}}" class="button"><i class="fa-solid fa-plus"></i>Add Product</a>
        </div>
        <div class="search-container">
            <div class="search-form">
                <form action="">
                    <div class="search-item">
                        <input type="text" name="product" id="" class="form-control" >
                        <select name="" id="" class="form-select" >
                            <option value="1">Catagory 1</option>
                            <option value="2">Catagory 2</option>
                        </select>
                        <input type="text" name="proce" id="" class="form-control" >
                    </div>
                    <div class="search-button">
                        <button type="submit" class="btn btn-primary" >Filter</button>
                        <a href="" class="btn btn-secondary">Resect</a>
                    </div>
                </form>
            </div>
            <div class="product-list">
                <table>
                    <thead >
                        <tr>
                            <th>Product</th>
                            <th>Supplier</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Size</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product )
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->suppliers->name}}</td>
                                <td>{{$product->categories->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>
                                    <span>{{$product->small_qty}}</span>
                                    <span>{{$product->medium_qty}}</span>
                                    <span>{{$product->large_qty}}</span>
                                </td>
                                <td>
                                    <form action="{{ url('product/'.$product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <a href="{{ url('product/'.$product->id.'/edit')}}" class="btn"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <button type="submit" onclick="return confirm('Are you sure want to delete')">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

</section>

@endsection
