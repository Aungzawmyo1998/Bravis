@extends('layouts.admin')

@section('title','category update')

@section('content')

<div class="global-register">
    <section id="update-category" >
        <div class="main-container">
            <div class="header">
                <h1>Update Category</h1>
                <p>Update your category necessary information here</p>
            </div>
            <div class="add-container">
                <form action="{{ url('category/'.$category->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <label for="name">Category Name</label>
                        <div class="input">
                            <input type="text" name="name" id="name" class="Category Name" placeholder="Men T-shirt" value="{{ $category->name}}">
                            @error('name')
                                <p style="color: red;"> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="button-container">
                            <button class="button">Cancel</button>
                            <button type="submit" class="button">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
