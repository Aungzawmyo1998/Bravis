@extends('layouts.admin')

@section('title','add product')

@section('content')
<div class="global-register">
    <section id="add-product">
        <div class="main-container">
            <div class="header">
                <h1>Add Supplier</h1>
                <p>Add your product necessary information here</p>
            </div>
            <div class="add-container">
                <h2>Basic Information</h2>
                <form class="form-container" action="{{ route('store.product')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <label for="name">Product Title/Name</label>
                        <div class="input">
                            <input type="text" name="name" id="name" placeholder="Product Title/Name">

                        </div>
                    </div>
                    <div class="row">
                        <label for="description">Product Description</label>
                        <div class="input">
                            <textarea name="description" id="description" cols="30" rows="5" placeholder="please type description about your product" >

                            </textarea>
                        </div>
                    </div>

                    <div class="row">
                        <label for="image">Product Image</label>
                        <div class="input">
                            <input type="file" name="image" id="image">

                        </div>
                    </div>
                    <div class="row">
                        <label for="brand">Brand Name</label>
                        <div class="input">
                            <select name="brand" id="brand">
                                @foreach ($products[1] as $brand )
                                    <option value="{{$brand->id}}">{{ $brand->brandname}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="row">
                        <label for="category">Category</label>
                        <div class="input">
                            <select name="category" id="category">
                                @foreach ($products[0] as $category )
                                    <option value="{{ $category->id}}">{{ $category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="gender">Gender</label>
                        <div class="input">
                            <select name="gender" id="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="price">Product Price</label>
                        <div class="input">
                            <div class="price-container">
                                <span>MMK</span>
                                <input type="text" name="price" id="price">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label for="">Size</label>
                        <div class="input">
                            <div class="size-container">
                                <div class="size-item">
                                    <label for="small">S</label>
                                    <input type="text" name="small" id="small">
                                </div>
                                <div class="size-item">
                                    <label for="medium">M</label>
                                    <input type="text" name="medium" id="medium">
                                </div>
                                <div class="size-item">
                                    <label for="large">L</label>
                                    <input type="text" name="large" id="large">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="button-container">
                            <button class="button">Cancel</button>
                            <button class="button" type="submit" >Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection
