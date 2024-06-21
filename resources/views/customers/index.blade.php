<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

    {{-- product detail css --}}
    <link rel="stylesheet" href="{{ asset('css/customers/product/product_detail.css')}}">

    {{-- test livewire --}}


    <title>@yield('title')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body >
    <header>
        <div id="cart-data" class="add-to-cart">
            <div class="header">
                <h2>Cart</h2>
                <i id="close-cart" class="fa-solid fa-xmark close-cart"></i>
            </div>

            <div  class="add-cart-form">
                <div class="add-item-container" id="products">

                    @if (session()->get('cart') != null)


                         @foreach (session('cart') as $id => $details )
                            <div class="product_data">

                                <div class="add-item  cart-item">
                                    <div class="img-container">
                                        <img  src="{{ asset('img/products/register/'.$details["image"])}}" alt="">
                                    </div>

                                    <div class="data-container ">
                                        <h2>{{$details["name"]}}</h2>

                                        <div class="price-container ">
                                            <input type="text" name="size" value="{{$details["size"]}}" class="size">
                                            <input type="hidden" id="unit-price" name="price" value="{{ $details["price"]}}" class="price">
                                            <input  type="text" disabled class="total-price" value="{{ $details["price"] * $details["qty"]}}"  name="" id=""><span>MMK</span>
                                        </div>
                                        <div class="button">

                                            <div class="qty-btn ">
                                                <button type="button"    class="increase-btn updateQty" value="{{ $details['id']}}" >+</button>
                                                <input type="text" disabled min="1" name="qty" id="number-input" value="{{ $details["qty"]}}" class="qty-value quantity">
                                                <button type="button"   class="decrease-btn updateQty" value="{{ $details['id']}}" >-</button>
                                            </div>

                                            <button value="{{ $details['id'] }}" class="remove-btn">Remove</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @endif
                </div>

                <div class="btn-container">
                    {{-- <a href="{{ auth('customer') == null ? url('customer/checkout') : url('customer/checkout/'.auth('customer')->user()->id) }}"  class="check-btn">Check Out</a> --}}
                    <a href="{{ route('checkout')}}" class="check-btn">Check Out</a>
                </div>
            </div>
        </div>
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
            <a href="{{ route('home')}}" class="logo">Bravis</a>
            <div class="nav-data">
                <ul class="nav-link">
                    <li class="won-parent"><a href="{{ route('customer.women.product')}}">Women</a>

                        {{-- <ul class="sub-nav won-sub" >
                            <li><a href="">Women's Tees </a></li>
                            <li><a href="">Women's T-Shirts </a></li>
                            <li><a href="">Women's Hoodies & Sweet Shirts </a></li>
                            <li><a href="">Women's Pen & Shorts</a></li>
                        </ul> --}}
                     </li>

                    <li class="man-parent"><a href="{{ route('customer.men.product')}}">Men</a>

                        {{-- <ul class="sub-nav man-sub" >
                            <li><a href="">Men's Tees </a></li>
                            <li><a href="">Men's T-Shirts </a></li>
                            <li><a href="">Men's Hoodies & Sweet Shirts </a></li>
                            <li><a href="">Men's Pen & Shorts</a></li>
                        </ul> --}}
                    </li>
                    <li><a href="">Accessories</a></li>
                    <li><a href="">Sport</a></li>
                    <li><a href="">Contact</a> </li>
                    <li><a href="">About Us</a></li>
                </ul>
            </div>
            <div class="icon-container">
                <span class="icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                <div class="cart-icon">
                    <span class="icon" id="open-cart"><i class="fa-solid fa-cart-plus"></i></span>
                    <span id="count-priduct">0</span>
                </div>
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
    <script src="{{ asset('script/customer/addToCart.js')}}"> </script>

</body>
</html>
