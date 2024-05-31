@extends('layouts.admin')

@section('title','supplier update')

@section('content')


<section id="update-supplier">
    <div class="main-container">
        <div class="heder">
            <h1>Update Supplier</h1>
            <p>Update your supplier necessary information here</p>
        </div>
        <div class="update-supplier">
            <form action="{{ url('supplier/'.$supplier->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <label for="name">Supplier Name</label>
                    <input type="text" name="name" id="name"  placeholder="Supplier Name" value="{{ $supplier->name }}">
                </div>
                <div class="row">
                    <label for="brand">Brand</label>
                    <input type="text" name="brand" id="brand"  placeholder="Brand" value="{{ $supplier->brandname }}">
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
