@extends('layouts.admin')

@section('title','category update')

@section('content')


<section id="update-category">
    <div class="main-container">
        <div class="heder">
            <h1>Update Category</h1>
            <p>Update your category necessary information here</p>
        </div>
        <div class="add-container">
            <form action="{{ url('category/'.$category->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" id="name" class="Category Name" placeholder="Men T-shirt" value="{{ $category->name}}">
                </div>

                <div class="row">
                    <button class="button">Cancel</button>
                    <button type="submit" class="button">Update</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
