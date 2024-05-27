<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}" >
    {{-- bootStrap link --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- CSS link --}}
    <link rel="stylesheet" href="{{ asset('css/customers/register.css') }}">
    <title>Customer Register </title>
</head>
<body>
    <div class="body-container ">
        <h2>Create Account</h2>

        <form action="{{route('customer.register.process')}}" method="post" class="form-container" enctype="multipart/form-data" >
            @csrf
            <div class="mb-3">
                <label for="fullname" class="form-label" >Full Name </label>
                <div class="row g-3 fullname">
                    <div class="col">
                        <input type="text" name="fname" id="" class="form-control" placeholder="First name">
                    </div>

                    <div class="col">
                        <input type="text" name="lname" id="" class="form-control" placeholder="Last name" >
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Birthday</label>
                <input type="date" name="dob" id="" class="form-control" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" >Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label for="phno" class="form-label">Phone no</label>
                <input type="text" name="phno" id="phno" class="form-control">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Location</label>
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="address" placeholder="Address" id="address" style="height: 100px"></textarea>
                    <label for="address">Address</label>
                </div>
                <div class="row g-3">
                    <div class="col">
                        <input type="text" name="state" id="state" class="form-control" placeholder="State/ Region" >
                    </div>
                    <div class="col">
                        <input type="text" id="zip" name="zipcode" class="form-control" placeholder="Zip Code (Eg.111)" >
                    </div>
                </div>
            </div>
            <div class="mb-5">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="d-grid  col-4 mx-auto">
                <button class="btn btn-primary btn-lg" type="submit" style=" " >Sign Up</button>
            </div>
        </div>

        </form>

    </div>






    {{-- bootstrap script --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
