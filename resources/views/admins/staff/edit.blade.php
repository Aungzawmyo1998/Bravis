@extends('layouts.admin')

@section('title','update staff')

@section('content')

<section id="update-staff" class="global-register">
    <div class="main-container">
        <div class="header">
            <h1>Update Staff</h1>
            <p>Update your staff necessary information here</p>
        </div>
        <div class="add-container">
            <form class="form-container" action="{{ url('staff/'.$staff->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <label for="name" class="">Name</label>
                    <div class="input">
                        <input type="text" name="name" class="" id="name" placeholder="Staff Name" value="{{ $staff->name }}" >
                        @error('name')
                            <p style="color: red;">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="row">
                    <label for="email" class="">Email</label>
                    <div class="input">

                        <input type="email" name="email" class="" id="email" placeholder="email" value="{{ $staff->email}}" >
                        @error('email')
                            <p style="color: red;">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="row">
                    <label for="password" class="">Password</label>
                    <div class="input">
                        <input type="password" name="password" class="" id="password" placeholder="password" value="{{ $staff->password}}" >
                        @error('password')
                            <p style="color: red;">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="row">
                    <label for="phone" class="">Phone Number</label>
                    <div class="input">

                        <input type="text" name="phone" class="" id="phone" placeholder="Example.09..." value="{{ $staff->phone}}">
                        @error('phone')
                            <p style="color: red;">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="row">
                    <label for="address" class="">Adddress</label>
                    <div class="input">

                        <textarea name="address" id="" class="" cols="30" rows="3" placeholder="Address" value="">{{ $staff->address}}</textarea>
                        @error('address')
                            <p style="color: red;">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="row">
                    <label for="position" class="">Staff Position</label>
                    <div class="input">
                        <select name="position" id="position" class="">
                            <option value="1" @if ($staff->role_id == 1) selected @endif>Admin</option>
                            <option value="2" @if ($staff->role_id == 2) selected @endif>Manager</option>
                            <option value="3" @if ($staff->role_id == 3) selected @endif>Supervisor</option>
                            <option value="4" @if ($staff->role_id == 4) selected @endif>Staff</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="image" class="" >Profile Photo</label>
                    <div class="input">
                        <input type="file" class="" name="image" id="">
                        @error('image')
                            <p style="color: red;">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
                <div class="row">
                    <div class="button-container">
                        <button class="button" type="button">Cancel</button>
                        <button class="button" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection
