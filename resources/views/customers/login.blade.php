<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Bootstrap Link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- css link --}}
    <link rel="stylesheet" href="{{ asset('css/Customers/login.css')}}">
    <title>Customer Login</title>
</head>
<body>
    <div class="login_container">
        <div class="form_side">
            <h1 >Welcome Back</h1>
            <form action="{{ route('customer.login.process')}}" method="post" class= "form_container mb-3" >
                @csrf
                <h1 class="mb-5 text-center">Sign In Here</h1>
                <input type="hidden" name="usertype" value="customer">
                <div class="mb-5">
                    <input type="text" id="email" name="email"  class="form-control" placeholder="Email Address" >
                </div>
                <div class="mb-5">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" >
                </div>
                <button type="submit" class="btn btn-primary d-grid  col-2 mx-auto">Login</button>

            </form>
            <div class="register">
                <p class="text-center">Don't have an account?  <a href="{{ route('customer.register.show')}}"> Sign up </a></p>
            </div>
        </div>
        <div class="image_side">

        </div>

    </div>



    {{-- Boot strap script link --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
