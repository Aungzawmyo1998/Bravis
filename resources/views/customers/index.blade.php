<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- font awesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- css link --}}
    <link rel="stylesheet" href="{{asset('css/customers/home/header.css')}}" type="text/css" >
    {{-- footer --}}
    <link rel="stylesheet" href="{{ asset('css/customers/home/footer.css')}}">
    <link rel="stylesheet" href="{{ asset('css/customers/home/home.css')}}">

    {{-- products --}}
    <link rel="stylesheet" href="{{ asset('css/customers/product/allproduct.css')}}">

    <title>@yield('title')</title>
</head>
<body>
    <header>
        <div class="disc-container">
            <p>
                Flash Sales : Sign in and Get Extra  25%  off on Selected Items
            </p>
            <div class="signin-container">
                <ul class="link">
                    <li>
                        <a href="">FAQ</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="">Orders and Returns</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="{{ route('customer.login')}}">Sign in</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="nav-container">
            <div class="logo">Bravis</div>
            <div class="nav-data">
                <ul class="nav-link">
                    <li class="won-parent">
                        Women
                        <ul class="sub-nav won-sub" >
                            <li><a href="">Women's Tees </a></li>
                            <li><a href="">Women's T-Shirts </a></li>
                            <li><a href="">Women's Hoodies & Sweet Shirts </a></li>
                            <li><a href="">Women's Pen & Shorts</a></li>
                        </ul>
                     </li>

                    <li class="man-parent">
                        Men
                        <ul class="sub-nav man-sub" >
                            <li><a href="">Men's Tees </a></li>
                            <li><a href="">Men's T-Shirts </a></li>
                            <li><a href="">Men's Hoodies & Sweet Shirts </a></li>
                            <li><a href="">Men's Pen & Shorts</a></li>
                        </ul>
                    </li>

                    <li><a href="">Contact</a> </li>
                    <li><a href="">About Us</a></li>
                </ul>
            </div>
            <div class="icon-container">
                <span class="icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                <span class="icon"><i class="fa-solid fa-cart-plus"></i></span>
            </div>

            <button class="hambuger">
                <div class="bar"></div>
            </button>

        </div>
    </header>
    <div class="content">
        @yield("content")
    </div>
    <footer id="index-footer">
        <div class="footer-container">
            <div class="item-container">
                <h2>Product</h2>
                <div class="data">
                    <ul>
                        <li><a href="">Clothing</a> </li>
                        <li><a href="">Shoes</a> </li>
                        <li><a href="">Accessories</a></li>
                    </ul>
                </div>
            </div>
            <div class="item-container">
                <h2>Customer Support</h2>
                <div class="data">
                    <ul>
                        <li><a href="">FAQ </a></li>
                        <li><a href="">Shipping </a></li>
                        <li><a href="">Track Order </a></li>
                        <li><a href="">Return & Exchange</a></li>
                        <li><a href="">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="item-container">
                <h2>Company</h2>
                <div class="data">
                    <ul>
                        <li><a href="">About Us </a></li>
                        <li><a href="">Privacy Policy </a></li>
                        <li><a href="">Teams & Condition </a></li>
                    </ul>
                </div>
            </div>
            <div class="item-container">
                <h2>Get Your Latest Update !</h2>
                <div class="data">
                    <p>Subscribe to our latest news to get about the special discout</p>
                    <form action="" method="POST" class="subscribe">
                        @csrf
                        <input type="email" name="email" id="" placeholder="Enter Your Email">
                        <button type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('script/customer/index.js')}}" ></script>
    <script src="{{ asset('script/customer/home/slide.js')}}"></script>
</body>
</html>
