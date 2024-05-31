@extends('layouts.admin')

@section('title','category')

@section('content')

<section id="category-main">
    <div class="main-container">
        <div class="header">
            <h1>Category</h1>
            <a href="{{ route('add.category')}}" class="button">
                <i class="fa-solid fa-plus"></i>
                Add Category
            </a>
        </div>
        <div class="search-container">
            <form action="">
                <div class="search-item">
                    <input type="text" name="type" id="">
                    <input type="text" name="role" id="">
                </div>
                <button type="submit">
                    Search
                </button>
            </form>
        </div>
        <div class="category-list">
            <table>
                <thead>
                    <tr>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category )
                        <tr>
                            <td>{{$category->name}}</td>
                            <td>
                                <form action="{{ url('category/'.$category->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ url('category/'.$category->id.'/edit')}}" class="btn"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <button type="submit" onclick="return confirm('Are you sure want to delete')">
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
