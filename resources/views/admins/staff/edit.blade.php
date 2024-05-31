@extends('layouts.admin')

@section('title','update staff')

@section('content')

<section id="update-staff">
    <div class="main-container">
        <div class="header-container">
            <h1>Update Staff</h1>
            <p>Update your staff necessary information here</p>
        </div>
        <div class="form-container">
            <form action="{{ url('staff/'.$staff->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row-container mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Staff Name" value="{{ $staff->name }}" >
                </div>
                <div class="row-container mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="email" value="{{ $staff->email}}" >
                </div>
                <div class="row-container mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="password" value="{{ $staff->password}}" >
                </div>
                <div class="row-container mb-4">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Example.09..." value="{{ $staff->phone}}">
                </div>
                <div class="row-container mb-4">
                    <label for="address" class="form-label">Adddress</label>
                    <textarea name="address" id="" class="form-control" cols="30" rows="5" placeholder="Address" value="">{{ $staff->address}}</textarea>
                </div>
                <div class="row-container mb-4">
                    <label for="position" class="form-label">Staff Position</label>
                    <select name="position" id="position" class="form-select">
                        <option value="1" @if ($staff->role_id == 1) selected @endif>Admin</option>
                        <option value="2" @if ($staff->role_id == 2) selected @endif>Manager</option>
                        <option value="3" @if ($staff->role_id == 3) selected @endif>Supervisor</option>
                        <option value="4" @if ($staff->role_id == 4) selected @endif>Staff</option>
                    </select>
                </div>
                <div class="row-container mb-4">
                    <label for="image" class="form-label" >Profile Photo</label>
                    <input type="file" class="form-control" name="image" id="">
                </div>
                <div class="row-container mb-4">
                    <button class="btn btn-primary" type="button">Cancel</button>
                    <button class="btn btn-primary" type="submit">Update</button>

                </div>
            </form>
        </div>
    </div>
</section>

@endsection
