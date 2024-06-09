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
                            <div class="input">
                                <input  type="text" name="name" class="" id="name" placeholder="Staff Name"  >
                                @error('name')
                                    <p style="color: red;">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="row">
                            <label for="email" >Email</label>
                            <div class="input">
                                <input type="email" name="email" class="" id="email" placeholder="email" >
                                @error('email')
                                    <p style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="password">Password</label>
                            <div class="input">
                                <input type="password" name="password" class="" id="password" placeholder="password" >
                                @error('password')
                                    <p style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="phone" >Phone Number</label>
                            <div class="input">
                                <input type="text" name="phone" class="" id="phone" placeholder="Example.09..." >
                                @error('phone')
                                    <p style="color: red;">{{ $message }}</span>

                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <label for="address">Adddress</label>
                            <div class="input">
                                <textarea name="address" id="" class="" cols="30" rows="5" placeholder="Address" ></textarea>
                                @error('address')
                                    <p style="color: red;">{{ $message }}</span>
                                @enderror

                            </div>
                        </div>
                        <div class="row">
                            <label for="position" >Staff Position</label>
                            <div class="input">
                                <select name="position" id="position" class="">
                                    <option value="1">Admin</option>
                                    <option value="2">Manager</option>
                                    <option value="3">Supervisor</option>
                                    <option value="4">Staff</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="image"  >Profile Photo</label>
                            <div class="input">
                                <input type="file" class="" name="image" id="" >
                                @error('image')
                                    <p style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
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

