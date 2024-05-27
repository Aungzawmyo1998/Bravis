@extends('layouts.admin')

@section('title','staff')

@section('content')

<section id="staff-main" >
    <div class="main-container">
        <h2>All Staff</h2>
        <div class="s_staff_btn">
            <a href="" class="btn btn-primary"><i class="fa-solid fa-plus"></i>Add Staff</a>
        </div>
        <div class="search-container">
            <form action="" method="get">
                <input type="text" name="search" class="form-control" id="" placeholder="Search by name / email /phone no" >
                <select name="search" id="" class="form-select">
                    <option value="1">Admin</option>
                    <option value="2">Manager</option>
                    <option value="3">Supervisor</option>
                    <option value="4">Staff</option>
                </select>
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
                    <tr>
                        <td>John Doe</td>
                        <td>aung@gmail.com</td>
                        <td>098888</td>
                        <td>Admin</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>aung@gmail.com</td>
                        <td>098888</td>
                        <td>Admin</td>
                        <td>active</td>
                    </tr>
                    <tr>
                        <td>John Doe</td>
                        <td>aung@gmail.com</td>
                        <td>098888</td>
                        <td>Admin</td>
                        <td>active</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection
