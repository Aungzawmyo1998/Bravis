@extends('layouts.admin')

@section('title','dashboard')

@section('content')

    <section id="dashboard">
        <div class="main-container">
            <div class="row-one">
                <div class="item">
                    <h4>Total Earning</h4>
                    <span class="count"> {{ $totalEarn }} Ks</span>
                </div>
                <div class="item">
                    <h4>This Month Earning</h4>
                    <span class="count">{{$thisMonthEarn}} Ks</span>
                </div>
                <div class="item">
                    <h4>This Year Earning</h4>
                    <span class="count">{{$thisYearEarning}} Ks</span>
                </div>
                <div class="item">
                    <h4>Client</h4>
                    <span  class="count">{{$clientCount}}</span>
                </div>

            </div>

            <div class="row-two">
                <div class="item item-one">
                    <div class="icon"><i class="fa-solid fa-cart-shopping"></i></div>
                    <div class="inner-item">
                        <h4>Total Order</h4>
                        <span style="font-weight: 700; font-size: 20px" class="count">{{$orderCount}}</span>
                    </div>
                </div>
                <div class="item item-two">
                    <div class="icon"><i class="fa-solid fa-circle-notch"></i></div>
                    <div class="inner-item">
                        <h4>Order Pending</h4>
                        <span style="font-weight: 700; font-size: 20px" class="count">{{$orderPending}}</span>
                    </div>
                </div>
                <div class="item item-three">
                    <div class="icon"><i class="fa-solid fa-truck-moving"></i></div>
                    <div class="inner-item">
                        <h4>Order Processing</h4>
                        <span style="font-weight: 700; font-size: 20px" class="count">{{$orderProcessing}}</span>
                    </div>
                </div>
                <div class="item item-four">
                    <div class="icon"><i class="fa-regular fa-clock"></i></div>
                    <div class="inner-item">
                        <h4>Order Delivered</h4>
                        <span style="font-weight: 700; font-size: 20px" class="count">{{$orderDeliever}}</span>
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
                            {{-- <div onclick="selectItem('menDoughnutChart','men-item')" style="background-color: #63C7FF; box-shadow: 2px 2px 5px #777777;" class="switch-item men-item" id="men-item" >Men </div> --}}
                            {{-- <div onclick="selectItem('womenDoughnutChart','women-item')" style="background-color: transparent; box-shadow: 2px 2px 5px #777777 inset;" class="switch-item women-item"   id="women-item">Women </div> --}}
                        </div>
                    </div>
                    <div class="inner-item">
                        <input type="hidden" id="menCount" value=" {{$menSellCount}} ">
                        <input type="hidden" name="" id="womenCount" value="{{$womenSellCount}} ">
                        <input type="hidden" name="" id="sportCount" value="{{$sportCount}}">
                        <input type="hidden" name="" id="accessoresCount" value="{{$accessoriesCount}}">
                        <canvas id="DoughnutChart" style="display: block;" class="sale" ></canvas>
                        {{-- <canvas id="womenDoughnutChart" style="display: none;" class="sale" ></canvas> --}}
                    </div>
                </div>
                <div class="item sale-static">
                    <div class="header-container">
                        <div class="header-text">
                            <h3>Sale Statics</h3>
                        </div>
                    </div>
                    <div class="inner-item">
                        <canvas id="monthlyChart" class="monthly-chart" ></canvas>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('script')

<script>
    // pie chart
            var ctx = document.getElementById('monthlyChart').getContext('2d');

            var monthlyChart = new Chart(ctx, {
                type: 'bar',
                data: {
                labels: {!! json_encode($lables) !!},
                datasets: {!! json_encode($datasets)!!}
            },


                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
</script>

@endsection

