@extends('layouts.admin')

@section('title','supplier update')

@section('content')

<div class="global-register">

    <section id="update-supplier">
        <div class="main-container">
            <div class="header">
                <h1>Update Supplier</h1>
                <p>Update your supplier necessary information here</p>
            </div>
            <div class="add-container">
                <form class="form-container" action="{{ url('supplier/'.$supplier->id)}}" method="POST">
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
