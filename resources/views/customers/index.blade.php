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
 {{--
                     @if (session()->get('cart') != null)
                    <label style="visibility: hidden;" value="{{ $j=0;  }}"></label>
                    <label style="visibility: hidden;" value="{{ $i=0;  }}"></label>

--}}
                    @if (session()->get('cart') != null)


                         @foreach (session('cart') as $id => $details )

                                <div class="add-item product cart-item"   >
                                    <div class="img-container">
                                        <img  src="{{ asset('img/products/register/'.$details["image"])}}" alt="">
                                    </div>

                                    <div class="data-container">
                                        <h2>{{$details["name"]}}</h2>

                                        <div class="price-container">
                                            <input type="text" name="price" value="{{ $details["price"] * $details["qty"]}}" class="price" id=""><span>MMK</span>
                                        </div>
                                            <div class="button">

                                                <div class="qty-btn product_data">
                                                    {{-- <input type="hidden" name="id" value="{{ $details["id"]  }}" > --}}
                                                    <button type="button"    class="increase-btn updateQty" value="{{ $details['id']}}" >+</button>
                                                    <input type="text"  min="1" name="qty" id="number-input" value="{{ $details["qty"]}}" class="qty-value quantity">
                                                    <button type="button"   class="decrease-btn updateQty" value="{{ $details['id']}}" >-</button>
                                                </div>


                                                 {{--

                                                 <div class="incdec">
                                                    <input type="hidden" name="id" value="{{$details["id"]}}"/>
                                                    <button type="button"  onclick="decrementValue()"  class="dc" id="{{'decrease'.$j}}" value="{{$j}}">-</button>
                                                    <input type="text"  class="qtyval" name="quantity" value="{{$details["qty"]}}" maxlength="3" max="100" size="2" id="a"  />
                                                    <button type="button" onclick="incrementValue()"   class="ic" id="{{'increase'.$j}}" value="{{$j}}" >+</button>

                                                </div>
                                                --}}



                                            <a href="" class="remove-btn">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                    @endif
                </div>

                <div class="btn-container">
                    <a href="#"  class="check-btn">Check Out</a>
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
                <span class="icon" id="open-cart"><i class="fa-solid fa-cart-plus"></i></span>

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

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/custom.js"></script> --}}

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}


    <script src="{{asset('script/customer/index.js')}}" ></script>
    <script src="{{ asset('script/customer/home/slide.js')}}"></script>
    <script src="{{ asset('script/customer/addToCart.js')}}"> </script>



{{--
    <script>
        $(document).ready(function () {
            $.ajaxSetup(
            {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }
            );

            $(document).on('click', '.ic', function(){
                var ids = $(this).attr('id');
                var id = $('#'+ids).val();
                // console.log(id);

                $.ajax({


                    type: 'POST',
                    url: "{{ route('addToCartInc')}}",
                    data: {index: id},
                    success: function(data) {
                        alert(JSON.stringify(data));
                        var total = 0;
                        $.each(data,function(key,value) {
                            total = +total + + value["price"];
                        } );
                        window.location.reload();
                    }
                });
            });

        });
        function incrementValue() {
            var value = parseInt(document.getElementById("a").value,10);
            value = isNaN(value) ? 0 : value;
            if (value < 100) {
                value ++;
                document.getElementById('a').value = value;
            }
        }

        function decrementValue() {
            var value = parseInt(document.getElementById("a").value,10);
            value = isNaN(value) ? 0 : value;
            if (value >1) {
                value --;
                document.getElementById('a').value = value;
            }
        }


    </script>
    --}}

    {{-- For Order QTY
     <script>

        const productsContainer = document.getElementById("products");
        productsContainer.addEventListener("click", function(event) {

            if (event.target.classList.contains("decrease") || event.target.classList.contains("increase")) {
                const productElement = event.target.closest(".product");
                const quantityInput = productElement.querySelector(".quantity");
                const priceInput = productElement.querySelector(".price");

                let currentValue = parseInt(quantityInput.value);
                let currentPrice = parseInt(priceInput.value);
                // var cartData = @json(session('cart'));



                    if (event.target.classList.contains("decrease"))
                    {
                        if (currentValue > 1)
                        {
                            quantityInput.value = currentValue - 1;

                            totalQty = parseInt(quantityInput.value);


                        }

                    }
                    else if (event.target.classList.contains("increase"))
                    {
                        quantityInput.value = currentValue + 1;


                        // console.log(currentValue + 1);
                        // priceInput.value = currentPrice * (currentValue + 1);
                    }
            }
        } );

        // function qty(value) {

        //     return value;
        // }

    </script>  --}}
    {{-- livewire script --}}


</body>
</html>
