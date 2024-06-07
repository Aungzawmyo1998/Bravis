@extends('layouts.admin')

@section('title','update product')

@section('content')

<section id="update-product " class="global-register">
    <div class="main-container">
        <div class="header">
            <h1>Update Product</h1>
            <p>Edit your product necessary information here</p>
        </div>
        <div class="update-container add-container">
            <h2>Basic Information</h2>
            <form class="form-container" action="{{ url('product/'.$products[2]->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="row">
                    <label for="name">Product Title/Name</label>
                    <div class="input">
                        <input type="text" name="name" id="name" placeholder="Product Title/Name" value="{{$products[2]->name}}">
                        @error('name')
                            <p style="color: red;"> {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <label for="description">Product Description</label>
                    <div class="input">
                        <textarea name="description" id="description" cols="30" rows="5" placeholder="please type description about your product" >
                            {{$products[2]->description}}
                        </textarea>
                        @error('description')
                            <p style="color: red;"> {{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <label for="image">Product Image</label>
                    <div class="input">
                        <input type="file" name="image" id="image">
                        @error('image')
                            <p style="color: red;"> {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <label for="brand">Brand Name</label>
                    <div class="input">
                        <select name="brand" id="brand">
                            @foreach ($products[1] as $brand )
                                <option value="{{$brand->id}}"  @if($brand->id == $products[2]->supplier_id) selected @endif >{{ $brand->brandname}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="row">
                    <label for="category">Category</label>
                    <div class="input">
                        <select name="category" id="category">
                            @foreach ($products[0] as $category )
                                <option value="{{ $category->id}}" @if ($category->id == $products[2]->category_id ) selected @endif>{{ $category->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>

                <div class="row">
                    <label for="gender">Gender</label>
                    <div class="input">
                        <select name="gender" id="gender">
                            <option value="Male" @if ($products[2]->gender == "Male")
                                selected
                            @endif>Male</option>
                            <option value="Female" @if ($products[2]->gender == "Male") selected @endif>Female</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <label for="price">Product Price</label>
                    <div class="input">
                        <div class="price-container">
                            <span>MMK</span>
                            <input type="text" name="price" id="price" value="{{ $products[2]->price}}">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <label for="">Size</label>
                    <div class="input">
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
                </div>
                <div class="row">
                    <div class="button-container">
                        <button class="button">Cancel</button>
                        <button class="button" type="submit" >Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
