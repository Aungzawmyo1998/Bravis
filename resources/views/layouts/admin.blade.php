<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--  --}}
    {{-- bootstrap link --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    {{-- gooogle font links --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    {{-- font awesome link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- admin link --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/admins/admin.css')}}"> --}}

    {{-- global linnk --}}
    <link rel="stylesheet" href="{{asset('css/global/global.css')}}">
    <link rel="stylesheet" href="{{ asset('css/global/register.css')}}">
    <link rel="stylesheet" href="{{ asset('css/global/list.css')}}">
    {{-- product liink --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/admins/product.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('css/admins/products/list.css')}}">

    {{-- staff list link css --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/admins/staff/main_staff.css')}}"> --}}
    <link rel="stylesheet" href="{{ asset('css/admins/staff/list.css')}}">
    {{-- add staff links css --}}
    {{-- update staff css --}}
    {{-- staff links and   --}}
    <link rel="stylesheet" href="{{ asset('css/admins/staff/staff_list.css')}}">

    {{-- categories link --}}
    <link rel="stylesheet" href="{{ asset('css/admins/categories/list.css')}}">

    {{-- supplier links --}}
    <link rel="stylesheet" href="{{ asset('css/admins/suppliers/list.css')}}">

    {{-- customer link --}}
    <link rel="stylesheet" href="{{ asset('css/admins/customer/list.css')}}">

    {{-- dashboard --}}
    <link rel="stylesheet" href="{{ asset('css/admins/dashboard/dashboard.css')}}">

    {{-- order css --}}
    <link rel="stylesheet" href="{{asset('css/admins/order/list.css')}}">


    {{-- Chart script --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}




    <title>@yield('title')</title>
</head>
<body>
    <section id="global">
        <div class="global-container">
            <div class="nav-container">
                <div class="logo">
                    <span class="main-logo">Bravis</span>
                    <span class="sec-logo">B</span>
                </div>
                <div class="nav_data off-screen-menu">
                    <ul class="nav_link">
                        <li><a href="{{ url('/admin/dashboard')}}"><span><i class="fa-solid fa-house-user"></i></span><span   class="link-data1">Dashboard</span></a></li>
                        <li><a href="{{ url('/product/list')}}"><span><i class="fa-solid fa-briefcase"></i></span><span class="link-data2">Product</span></a></li>
                        <li><a href="{{ url('/customer/list')}}"><span><i class="fa-regular fa-user"></i></span><span class="link-data3">Customer</span> </a></li>
                        <li><a href="{{ url('/order/list')}}"><span><i class="fa-solid fa-cart-shopping"></i></span><span class="link-data4">Order</span> </a></li>
                        <li><a href="{{ url('/staff/list/show')}}"><span><i class="fa-solid fa-user-tie"></i></span><span class="link-data5">Staff</span> </a></li>
                        <li><a href="{{ url('/category/list')}}"><span><i class="fa-solid fa-list"></i></span><span class="link-data6">Category</span> </a></li>
                        <li><a href="{{ url('/supplier/list')}}"><span><i class="fa-solid fa-person"></i></span><span class="link-data7">Supplier</span> </a></li>

                    </ul>
                </div>

            </div>
            <div class="display-pannel">
                <div class="noti-container">
                    <div class="noti-item">
                        <div id="ham-menu">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                        <span class="bell">
                            <i class="fa-regular fa-bell"></i>
                        </span>
                        <span class="message">
                            <i class="fa-regular fa-comment"></i>
                        </span>
                    </div>
                    <div class="profile">
                        <span>
                            {{ auth('admin')->user()->name}}
                        </span>

                        <div class="profile-image">

                                <img src="{{ asset('img/staff/register/'.auth('admin')->user()->image)}}" alt="">
                        </div>
                        <div class="logout-container">
                            <li><i class="fa-solid fa-gear"></i><a style="text-decoration: none;" href="{{ url('staff/'.auth('admin')->user()->id.'/edit') }}">Edit Profile</a></li>
                            <li><i class="fa-solid fa-right-from-bracket"></i><a style="text-decoration: none;" href="{{ route('staff.logout')}}">Log Out</a></li>
                        </div>
                    </div>
                </div>
                <div class="master">
                    @yield('content')
                </div>
                </div>
            </div>
        </div>
    </section>

    {{-- JQuery Library --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


        <script src="{{ asset('script/ham_menu.js')}}"></script>

        {{-- order detailsjs link --}}
        <script src="{{asset('script/admin/order_details.js')}}"></script>

        {{-- chart script --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

        @yield('script')
        {{-- top sale --}}
        <script src="{{ asset('script/admin/top_sale.js')}}"></script>

        {{-- logout script --}}
        <script>
            const profile = document.querySelector(".profile-image");
            const logoutContainer = document.querySelector(".logout-container");


            profile.addEventListener('click', ()=>{
                logoutContainer.classList.toggle("active");
            });


        </script>

</body>
</html>
