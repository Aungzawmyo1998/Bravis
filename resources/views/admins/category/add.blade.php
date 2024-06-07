@extends('layouts.admin')

@section('title','category add')

@section('content')
<div class="global-register">
    <section id="add-category">
        <div class="main-container">
            <div class="header">
                <h1>Add Category</h1>
                <p>Add your supplier necessary information here</p>
            </div>
            <div class="add-container">
                <form action="{{ route('store.category')}}" method="POST">
                    @csrf
                    <div class="row">
                        <label for="name">Category Name</label>
                        <div class="input">
                            <input type="text" name="name" id="name" class="Category Name" placeholder="Category Name">
                            @error('name')
                                <p style="color: red;"> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="button-container">
                            <button class="button">Cancel</button>
                            <button type="submit" class="button">Add</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection
