@extends('layouts.admin')

@section('title','add supplier')

@section('content')
<div class="global-register">
    <section id="add-supplier">
        <div class="main-container">
            <div class="header">
                <h1>Add Supplier</h1>
                <p>Add your supplier necessary information here</p>
            </div>
            <div class="add-container">
                <form action="{{ route('store.supplier') }}" method="post">
                    @csrf
                    <div class="row">
                        <label for="name">Supplier Name</label>
                        <div class="input">
                            <input type="text" name="name" id="name"  placeholder="Supplier Name">

                        </div>
                    </div>
                    <div class="row">
                        <label for="brand">Brand</label>
                        <div class="input">
                        <input type="text" name="brand" id="brand"  placeholder="Brand">

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