@extends('layouts.admin')

@section('title','category add')

@section('content')

<section id="add-category">
    <div class="main-container">
        <div class="heder">
            <h1>Add Category</h1>
            <p>Add your supplier necessary information here</p>
        </div>
        <div class="add-container">
            <form action="{{ route('store.category')}}" method="POST">
                @csrf
                <div class="row">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" id="name" class="Category Name" placeholder="Category Name">
                </div>

                <div class="row">
                    <button class="button">Cancel</button>
                    <button type="submit" class="button">Add</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
