@extends('layouts.admin')

@section('title','staff')

@section('content')

<section id="staff-list" >
    <div class="main-container">
        <div class="header">
            <h1>All Staff</h1>
            <div class="search-icon">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <a href="{{route('admin.add.staff.show')}}" class="cat-add-button button"><i class="fa-solid fa-plus"></i>Add Staff</a>

        </div>
        <div class="search-form">
            <form class="form-container" action="" method="get">

                <div class="search-item">
                    <input type="text" name="search" id="" placeholder="Search by name / email /phone no" >
                    <select name="search" id="" class="form-select">
                        <option value="1">Admin</option>
                        <option value="2">Manager</option>
                        <option value="3">Supervisor</option>
                        <option value="4">Staff</option>
                    </select>
                </div>
                <div class="search-button">
                    <button type="submit" class="button " >Search</button>
                </div>
            </form>
        </div>
        <div class="list">
            <table class="">
                <thead >
                    <tr class="table-header">
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
                            <td class="action">
                                {{-- @dd(auth('admin')->user()->role) --}}
                                {{-- @if((auth('admin')->id() == $staff->id && auth('admin')->user()->role->name == 'Admin') || auth('admin')->user()->role->name !== 'Staff') --}}
                                    <form action="{{ url('staff/'.$staff->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ url('staff/'.$staff->id.'/edit') }}" class="action-btn"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <button type="submit" class="action-btn del-btn" onclick="return confirm('Are You Sure Want to Delete')" ><i class="fa-regular fa-trash-can"></i></button>
                                    </form>
                                {{-- @endif --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection
