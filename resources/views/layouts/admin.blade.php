<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap link --}}

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

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
                    <span class="main-logo">Bravis</span>
                    <span class="sec-logo">B</span>
                </div>
                <div class="nav-data off-screen-menu">
                    <ul class="nav-link">
                        <li><a href="{{ url('/admins/dashboard')}}"><span><i class="fa-solid fa-house-user"></i></span><span class="link-data">Dashboard</span></a></li>
                        <li><a href="{{ url('/product/list')}}"><span><i class="fa-solid fa-briefcase"></i></span><span class="link-data">Product</span></a></li>
                        <li><a href="{{ url('/admins/customer')}}"><span><i class="fa-regular fa-user"></i></span><span class="link-data">Customer</span> </a></li>
                        <li><a href="{{ url('/admins/order')}}"><span><i class="fa-solid fa-cart-shopping"></i></span><span class="link-data">Order</span> </a></li>
                        <li><a href="{{ url('/staff/list/show')}}"><span><i class="fa-solid fa-user-tie"></i></span><span class="link-data">Staff</span> </a></li>
                        <li><a href="{{ url('/category/list')}}"><span><i class="fa-solid fa-lock"></i></span><span class="link-data">Category</span> </a></li>
                        <li><a href="{{ url('/supplier/list')}}"><span><i class="fa-solid fa-lock"></i></span><span class="link-data">Supplier</span> </a></li>

                    </ul>
                </div>
                <div class="ham-menu">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
            <div class="display-pannel">
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
                        <span>Aung Zaw Myo</span>
                        <div class="profile-image">

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


        {{-- bootstrap script --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}

    <script src="{{ asset('script/ham_menu.js')}}"></script>
</body>
</html>
