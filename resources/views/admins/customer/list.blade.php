@extends('layouts.admin')

@section('title','supplier')

@section('content')

    <section id="cus-list">

        <div class="main-container">
            <div class="header">
                <h1>Customer</h1>
                <div class="search-icon">
                    <i class="fa-solid fa-magnifying-glass"></i>

                </div>
            </div>

            <div class="search-form">
                <form action="{{ route('search.customer')}}" class="form-container" method="POST">
                    @csrf

                    <div class="search-item">
                        <input type="text" name="search" id="" placeholder="Search">
                    </div>
                    <div class="search-button">
                        <button type="submit" class="button">Search</button>
                        <a href=" {{ route('customer.list')}} " class="button">Reset</a>
                    </div>
                </form>
            </div>

            <div class="list">
                <table class="table-list">
                    <thead>
                        <tr class="table-header">
                            <th>ID </th>
                            <th>Customer Name </th>
                            <th>Email </th>
                            <th>Phone-no </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer )
                            <tr class="data-row">
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->firstname."\t". $customer->lastname}}</td>
                                <td>{{ $customer->email}}</td>
                                <td>{{ $customer->phonenumber }}</td>
                                <td class="action">
                                    <form action="{{ url('customer/'.$customer->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="" class="action-btn"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <button type="submit" class="action-btn del-btn" onclick="return confirm('Are You Sure Want to Delete')" ><i class="fa-regular fa-trash-can"></i></button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="pag-container">
                {{$customers->links('pagination::bootstrap-5')}}
            </div>
        </div>

    </section>

@endsection
