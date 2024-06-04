@extends('layouts.admin')

@section('title','supplier')

@section('content')

    <section id="cus-list">

        <div class="main-container">
            <div class="header">
                <h1>Customer</h1>
            </div>

            <div class="search-form">
                <form action="" class="form-container">
                    <div class="search-item">
                        <input type="text" name="" id="" placeholder="Search">
                    </div>
                    <div class="search-button">
                        <button class="button">Search</button>
                        <button class="button">Reset</button>
                    </div>
                </form>
            </div>

            <div class="list">
                <table>
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
                        <tr>
                            <td>11</td>
                            <td>Aung </td>
                            <td>sss.gemail.com </td>
                            <td>403939399 </td>
                            <td>active</td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Aung </td>
                            <td>sss.gemail.com </td>
                            <td>403939399 </td>
                            <td>active</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </section>

@endsection
