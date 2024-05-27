<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap link --}}

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- admin link --}}
    <link rel="stylesheet" href="{{ asset('css/admins/admin.css')}}">

    {{-- product liink --}}
    <link rel="stylesheet" href="{{ asset('css/admins/product.css')}}">

    {{-- add staff links --}}
    <link rel="stylesheet" href="{{ asset('css/admins/staff/add.css')}}">

    {{-- font awesome link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <title>@yield('title')</title>
</head>
<body>
    <div class="main_container">
        <div class="nav_container">
            <div class="logo">
                Bravis
            </div>
            <div class="nav_data">
                <ul class="nav_link">
                    <li><span><i class="fa-solid fa-house-user"></i></span><a href="{{ url('/admins/dashboard')}}">Dashboard</a></li>
                    <li><span><i class="fa-solid fa-briefcase"></i></span><a href="{{ url('/admins/product')}}">Product</a></li>
                    <li><span><i class="fa-regular fa-user"></i></span><a href="{{ url('/admins/customer')}}">Customer </a></li>
                    <li><span><i class="fa-solid fa-cart-shopping"></i></span><a href="{{ url('/admins/order')}}">Order </a></li>
                    <li><span><i class="fa-solid fa-user-tie"></i></span><a href="{{ route('admin.staff.list')}}">Staff </a></li>
                </ul>
            </div>
        </div>
        <div>
            <div class="noti_container">
                <div class="noti_item">
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



    {{-- bootstrap script --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
</body>
</html>
