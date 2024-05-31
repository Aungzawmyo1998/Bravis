<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap link --}}

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

    {{-- font awesome link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- admin link --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/admins/admin.css')}}"> --}}

    {{-- global linnk --}}
    <link rel="stylesheet" href="{{asset('css/global/global.css')}}">

    {{-- product liink --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/admins/product.css')}}"> --}}

    {{-- staff list link css --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/admins/staff/main_staff.css')}}"> --}}
    {{-- add staff links css --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/admins/staff/add.css')}}"> --}}
    {{-- update staff css --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/admins/staff/edit.css')}}"> --}}


    <title>@yield('title')</title>
</head>
<body>
    <section id="global">
        <div class="global-container">
            <div class="nav-container">
                <div class="logo">
                    Bravis
                </div>
                <div class="nav-data">
                    <ul class="nav-link">
                        <li><span><i class="fa-solid fa-house-user"></i></span><a href="{{ url('/admins/dashboard')}}">Dashboard</a></li>
                        <li><span><i class="fa-solid fa-briefcase"></i></span><a href="{{ url('/product/list')}}">Product</a></li>
                        <li><span><i class="fa-regular fa-user"></i></span><a href="{{ url('/admins/customer')}}">Customer </a></li>
                        <li><span><i class="fa-solid fa-cart-shopping"></i></span><a href="{{ url('/admins/order')}}">Order </a></li>
                        <li><span><i class="fa-solid fa-user-tie"></i></span><a href="{{ url('/staff/list/show')}}">Staff </a></li>
                        <li><span><i class="fa-solid fa-lock"></i></span><a href="{{ url('/category/list')}}">Category </a></li>
                        <li><span><i class="fa-solid fa-lock"></i></span><a href="{{ url('/supplier/list')}}">Supplier </a></li>

                    </ul>
                </div>
            </div>
            <div>
                <div class="noti-container">
                    <div class="noti-item">
                        <span class="bell">
                            <i class="fa-regular fa-bell"></i>
                        </span>
                        <span class="message">
                            <i class="fa-regular fa-comment"></i>
                        </span>
                    </div>
                    <div class="profile">
                        <span></span>
                    </div>
                </div>
                <div class="master">
                    @yield('content')
                </div>
                </div>
            </div>
        </div>
    </section>


        {{-- bootstrap script --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
</body>
</html>
