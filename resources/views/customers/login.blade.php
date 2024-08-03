<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- font awesome link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- css link --}}
    <link rel="stylesheet" href="{{ asset('css/customers/login.css')}}">
    <title>Customer Login</title>
</head>
<body>
    <div id="cus-login">
        <div class="main-container">
            <div class="form-container">
                <h1 >Welcome Back</h1>
                <form action="{{url('customer/login')}}" method="post" class="form" >
                    @csrf
                    <h3>Sign In Here</h3>

                    {{-- @if ($errors->any())
                        @foreach ($errors->all() as $error )

                        <p style="color: red;">{{$error}}</p>
                        @endforeach

                    @endif --}}
                    @error('detail')
                        <p style="color: red;">{{ $message}}</p>
                    @enderror

                    <div class="row">
                        <input type="text" id="email" name="email"  class="input" placeholder="Email Address" >
                        @error('email')
                            <p style="color: red;">{{ $message}}</p>
                        @enderror
                        {{-- @error('e')
                        <p style="color: red;">{{ $message}}</p>
                        @enderror --}}
                    </div>
                    <div class="row">
                        <div class="for-pas">
                            <input type="password" id="password" name="password" class="input" placeholder="Password" >
                            <span class="eye">

                                <span id="visible"><i class="fa-regular fa-eye"></i></span>
                                <span id="hidden"><i class="fa-regular fa-eye-slash"></i></span>
                            </span>
                        </div>

                        @error('password')
                            <p style="color: red;">{{ $message}}</p>
                        @enderror
                        {{-- @error('p')
                        <p style="color: red;">{{ $message}}</p>
                        @enderror --}}


                        @error('error')
                            <p>{{$message}}</p>
                        @enderror
                    </div>
                    <button type="submit" class="button">Login</button>

                </form>
                <div class="register">
                    <p class="">Don't have an account?  <a href="{{ route('customer.register')}}"> Sign up </a></p>
                </div>
            </div>
            <div class="img-container"><img src="{{ asset('img/customers/home/login-bg.jpg')}}" alt=""></div>
        </div>
    </div>

    <script>
        const visible = document.querySelector("#visible");
        const hidden = document.querySelector("#hidden");
        const password = document.querySelector("#password");

        visible.addEventListener("click", (e)=>{
            // e.stopPropergation();
            password.setAttribute("type","password");
            hidden.style.display = "inline";
            visible.style.display = "none";
        })

        hidden.addEventListener("click", ()=>{
            password.setAttribute("type","text");
            hidden.style.display = "none";
            visible.style.display = "inline";
        })

        if (visible.style.display === "inline" ) {
            assword.setAttribute("type","text");
        }

    </script>


</body>
</html>
