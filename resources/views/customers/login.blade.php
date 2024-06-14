<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

                    @if ($errors->any())
                        @foreach ($errors->error as $error )

                        <p style="color: red;">{{$error}}</p>
                        @endforeach

                    @endif

                    <div class="row">
                        <input type="text" id="email" name="email"  class="input" placeholder="Email Address" >
                        @error('email')
                            <p style="color: red;">{{ $message}}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <input type="password" id="password" name="password" class="input" placeholder="Password" >
                        @error('password')
                            <p style="color: red;">{{ $message}}</p>
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

</body>
</html>
