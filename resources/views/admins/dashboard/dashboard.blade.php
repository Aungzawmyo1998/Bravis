@extends('layouts.admin')

@section('title','dashboard')

@section('content')

    <section id="dashboard">
        <div class="main-container">
            <div class="row-one">
                <div class="item">
                    <h4>Total Earning</h4>
                    <span class="count">K 100000</span>
                </div>
                <div class="item">
                    <h4>Total Expenses</h4>
                    <span class="count">K 100000</span>
                </div>
                <div class="item">
                    <h4>Client</h4>
                    <span class="count">5000</span>
                </div>
                <div class="item">
                    <h4>Page Visitor</h4>
                    <span class="count">2000000</span>
                </div>
            </div>
            <div class="row-two">
                <div class="item">
                    <div class="icon"></div>
                    <div class="inner-item">
                        <h4>Total Order</h4>
                        <span class="count">500</span>
                    </div>
                </div>
                <div class="item">
                    <div class="icon"></div>
                    <div class="inner-item">
                        <h4>Order Pending</h4>
                        <span class="count">500</span>
                    </div>
                </div>
                <div class="item">
                    <div class="icon"></div>
                    <div class="inner-item">
                        <h4>Order Processing</h4>
                        <span class="count">500</span>
                    </div>
                </div>
                <div class="item">
                    <div class="icon"></div>
                    <div class="inner-item">
                        <h4>Order Delivered</h4>
                        <span class="count">500</span>
                    </div>
                </div>
            </div>
            <div class="row-three">
                <div class="item top-sale">
                    <div class="header-container">
                        <div class="header-text">
                            <h3>Top selling product</h3>
                        </div>
                        <div class="switch-container">
                            <div class="switch-item">Men </div>
                            <div class="switch-item">Women </div>
                        </div>
                    </div>
                    <div class="inner-item">
                        
                    </div>
                </div>
                <div class="item sale-static">
                    <div class="header-container">
                        <div class="header-text">
                            <h3>Sale Statics</h3>
                        </div>
                    </div>
                    <div class="inner-item">

                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
