@extends('layouts.admin')

@section('title','update product')

@section('content')

<section id="update-product">
    <div class="main-container">
        <div class="heder">
            <h1>Add Supplier</h1>
            <p>Edit your product necessary information here</p>
        </div>
        <div class="update-container">
            <h2>Basic Information</h2>
            <form action="{{ url('product/'.$products[2]->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <label for="name">Product Title/Name</label>
                    <input type="text" name="name" id="name" placeholder="Product Title/Name" value="{{$products[2]->name}}">
                </div>
                <div class="row">
                    <label for="description">Product Description</label>
                    <textarea name="description" id="description" cols="30" rows="5" placeholder="please type description about your product" >
                        {{$products[2]->description}}
                    </textarea>
                </div>

                <div class="row">
                    <label for="image">Product Image</label>
                    <input type="file" name="image" id="image">
                </div>
                <div class="row">
                    <label for="brand">Brand Name</label>
                    <select name="brand" id="brand">
                        @foreach ($products[1] as $brand )
                            <option value="{{$brand->id}}"  @if($brand->id == $products[2]->supplier_id) selected @endif >{{ $brand->brandname}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <label for="category">Category</label>
                    <select name="category" id="category">
                        @foreach ($products[0] as $category )
                            <option value="{{ $category->id}}" @if ($category->id == $products[2]->category_id ) selected @endif>{{ $category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <option value="Male" @if ($products[2]->gender == "Male")
                            selected
                        @endif>Male</option>
                        <option value="Female" @if ($products[2]->gender == "Male") selected @endif>Female</option>
                    </select>
                </div>

                <div class="row">
                    <label for="price">Product Price</label>
                    <div class="price-container">
                        <span>MMK</span>
                        <input type="text" name="price" id="price" value="{{ $products[2]->price}}">
                    </div>
                </div>

                <div class="row">
                    <label for="">Size</label>
                    <div class="size-container">
                        <div class="size-item">
                            <label for="small">S</label>
                            <input type="text" name="small" id="small" value="{{ $products[2]->small_qty}}" >
                        </div>
                        <div class="size-item">
                            <label for="medium">M</label>
                            <input type="text" name="medium" id="medium" value="{{ $products[2]->medium_qty}}">
                        </div>
                        <div class="size-item">
                            <label for="large">L</label>
                            <input type="text" name="large" id="large" value="{{ $products[2]->large_qty}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button class="button">Cancel</button>
                    <button class="button" type="submit" >Update</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
