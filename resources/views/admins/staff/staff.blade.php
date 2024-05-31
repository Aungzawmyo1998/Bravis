@extends('layouts.admin')

@section('title','staff')

@section('content')

<section id="staff-main" >
    <div class="main-container">
        <h2>All Staff</h2>
        <div class="add-btn">
            <a href="{{route('admin.add.staff.show')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Add Staff</a>
        </div>
        <div class="search-container">
            <form class="search-form" action="" method="get">

                <div class="search-item">
                    <input type="text" name="search" class="form-control" id="" placeholder="Search by name / email /phone no" >
                    <select name="search" id="" class="form-select">
                        <option value="1">Admin</option>
                        <option value="2">Manager</option>
                        <option value="3">Supervisor</option>
                        <option value="4">Staff</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="staff-list">
            <table class="table table-striped">
                <thead >
                    <tr>
                        <th>Name </th>
                        <th>Email </th>
                        <th>Phone-no </th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach ($staffs as $staff )
                        <tr>
                            <td>{{$staff->name}}</td>
                            <td>{{$staff->email}}</td>
                            <td>{{$staff->phone}}</td>
                            <td>{{$staff->role->name}}</td>
                            <td>
                                {{-- @dd(auth('admin')->user()->role) --}}
                                @if((auth('admin')->id() == $staff->id && auth('admin')->user()->role->name == 'Admin') || auth('admin')->user()->role->name !== 'Staff')
                                <form action="{{ url('staff/'.$staff->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ url('staff/'.$staff->id.'/edit') }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <button type="submit" onclick="return confirm('Are You Sure Want to Delete')" ><i class="fa-regular fa-trash-can"></i></button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection
