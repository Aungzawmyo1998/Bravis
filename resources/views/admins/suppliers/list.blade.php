@extends('layouts.admin')

@section('title','supplier')

@section('content')

<section id="sup-list">
    <div class="main-conainer">
        <div class="header">
            <h1>Supplier</h1>
            <div class="search-icon">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <a href="{{ route('add.supplier')}}" class="add-button button">
                <i class="fa-solid fa-plus"></i>
                Add Supplier
            </a>
        </div>
        <div class="search-form">
            <form action="" class="form-container">
                <div class="search-item">
                    <input type="text" name="item" id="" placeholder="Search by name/email/phone-no">
                    <select name="role" id="">
                        <option value="1">Admin</option>
                        <option value="2">Manager</option>
                        <option value="3">Supplier</option>
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
                        <th>Supplier</th>
                        <th>Brand</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($suppliers as $supplier )
                        <tr>
                            <td>{{$supplier->name}}</td>
                            <td>{{$supplier->brandname}}</td>
                            <td class="action">
                                <form action="{{ url('supplier/'.$supplier->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ url('supplier/'.$supplier->id.'/edit')}}" class="btn"><i class="fa-regular fa-pen-to-square"></i></a>
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