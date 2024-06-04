@extends('layouts.admin')

@section('title','category')

@section('content')

<section id="cat-list">
    <div class="main-container">
        <div class="header">
            <h1>Category</h1>
            <div class="search-icon">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <a href="{{ route('add.category')}}" class="add-button button">
                <i class="fa-solid fa-plus"></i>
                Add Category
            </a>
        </div>
        <div class="search-form">
            <form class="form-container" action="">
                <div class="search-item">
                    <input type="text" name="type" id="" placeholder="Search by name / email /phone no">
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
            <table>
                <thead>
                    <tr class="table-header">
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category )
                        <tr>
                            <td>{{$category->name}}</td>
                            <td class="action">
                                <form action="{{ url('category/'.$category->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ url('category/'.$category->id.'/edit')}}" class="btn"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <button class="action-btn del-btn" type="submit" onclick="return confirm('Are you sure want to delete')">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
