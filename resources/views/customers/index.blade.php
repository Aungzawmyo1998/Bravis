<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- font awesome cdn --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- css link --}}
    <link rel="stylesheet" href="{{asset('css/Customers/index.css')}}" type="text/css" >
    <title>Document</title>
</head>
<body>
    <header>
        <div class="disc_bar">
            <p>
                Flash Sales : Sign in and Get Extra  25%  off on Selected Items
            </p>
            <div class="signin_container">
                <ul>
                    <li>
                        <a href="">FAQ</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="">Orders and Returns</a>
                    </li>
                    <li>|</li>
                    <li>
                        <a href="">Sign in</a>
                    </li>
                </ul>
            </div>
        </div>
        <nav class="nav_container">
            <div class="logo">Bravis</div>
            <div class="nav_data">
                <button class="close-menu-btn"></button>
                <ul class="nav_links">
                    <li>
                        <a href="">Women</a>
                        <ul class="sub_nav" >
                            <li><a href="">Women's Tees </a></li>
                            <li><a href="">Women's T-Shirts </a></li>
                            <li><a href="">Women's Hoodies & Sweet Shirts </a></li>
                            <li><a href="">Women's Pen & Shorts</a></li>
                        </ul>
                     </li>
                    <li>
                        <a href="">Men</a>
                        <ul class="sub_nav" >
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
            <div class="icon">
                <li><i class="fa-solid fa-magnifying-glass"></i></li>
                <li><i class="fa-solid fa-cart-plus"></i></li>
            </div>
            <div class="hamburger">
                <button type="button" class="open-menu-btn">
                    <span class="line line-1"></span>
                    <span class="line line-1"></span>
                    <span class="line line-1"></span>
                </button>

            </div>

        </nav>
    </header>


<script src="{{asset('css/Customers/script/index_script.js')}}" >


</script>
</body>
</html>
