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
            <a href="{{route('admin.add.staff.show')}}" style="text-decoration: none;" class="cat-add-button button"><i class="fa-solid fa-plus"></i>Add Staff</a>

        </div>
        <div class="search-form">
            <form class="form-container" action="{{ route('staff.search')}}" method="post">
                @csrf

                <div class="search-item">
                    <input type="text" name="search" id="" placeholder="Search by name / email /phone no"  >
                    <select name="role" id="" class="">
                        <option value="default">Role</option>
                        @foreach ($roles as $role )
                            <option value="{{ $role->id}}">{{ $role->name}}</option>
                        @endforeach
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
                                {{-- @if((auth('admin')->id() === $staff->id && auth('admin')->user()->role->name == 'Admin') || auth('admin')->user()->role->name !== 'Staff') --}}
                                <form action="{{ url('staff/'.$staff->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    @if ( auth('admin')->user()->role->name === "Admin" || auth('admin')->user()->role->name === "Manager")
                                        <a href="{{ url('staff/'.$staff->id.'/edit') }}" class="action-btn"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <button type="submit" class="action-btn del-btn" onclick="return confirm('Are You Sure Want to Delete')" ><i class="fa-regular fa-trash-can"></i></button>
                                    @elseif (auth('admin')->user()->id === $staff->id && ( auth('admin')->user()->role->name === "Staff" || auth('admin')->user()->role->name === "Supervisor"))
                                        <a href="{{ url('staff/'.$staff->id.'/edit') }}" class="action-btn"><i class="fa-regular fa-pen-to-square"></i></a>
                                    @else
                                        Not Allow
                                    @endif


                                {{-- @endif --}}


                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pag-container">
            {{$staffs->links('pagination::bootstrap-5')}}
        </div>
    </div>

</section>

@endsection
