@extends('layouts.admin')

@section('title','add staff')

@section('content')

<div class="global-register">
    <section id="add-staff">
        <div class="main-container">
            <div class="header">
                <h1>Add Staff</h1>
                <p>Add your staff necessary information here</p>
            </div>
            <div class="add-container">
                <div class="form-container">
                    <form action="{{ route('staff.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Staff Name" >
                        </div>
                        <div class="row">
                            <label for="email" >Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="email" >
                        </div>
                        <div class="row">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="password" >
                        </div>
                        <div class="row">
                            <label for="phone" >Phone Number</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Example.09...">
                        </div>
                        <div class="row">
                            <label for="address">Adddress</label>
                            <textarea name="address" id="" class="form-control" cols="30" rows="5" placeholder="Address"></textarea>
                        </div>
                        <div class="row">
                            <label for="position" >Staff Position</label>
                            <select name="position" id="position" class="form-select">
                                <option value="1">Admin</option>
                                <option value="2">Manager</option>
                                <option value="3">Supervisor</option>
                                <option value="4">Staff</option>
                            </select>
                        </div>
                        <div class="row">
                            <label for="image"  >Profile Photo</label>
                            <input type="file" class="form-control" name="image" id="">
                        </div>
                        <div class="row">
                            <div class="button-container">
                                <button class="button" type="button">Cancel</button>
                                <button class="button" type="submit">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

