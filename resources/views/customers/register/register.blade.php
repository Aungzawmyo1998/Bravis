<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>customer register</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="{{ asset('css/customers/register.css')}}">
</head>
<body>
    <section id="cus-reg">
        <div class="main-container">
            <div class="header">
                <h1>Create account</h1>
            </div>
            <div class="form-container">
                <form action="{{ route('store.customer') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <label for="fname">Full Name</label>
                        <div class="input">
                            <input class="input-item" type="text" name="fname" id="fname" placeholder="first name">
                            <input class="input-item" type="text" name="lname" id="lname" placeholder="last name">
                        </div>
                        @error('fname')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                        @error('lname')
                            <p style="color: red;">{{$message}}</p>
                        @enderror

                    </div>

                    <div class="row">
                        <label for="dob">Birthday</label>
                        <div class="input">
                            <input class="input-item" type="date" name="dob" id="dob">
                        </div>
                        @error('dob')
                            <p style="color: red;">{{$message}}</p>
                        @enderror

                    </div>
                    <div class="row">
                        <label for="email">Email</label>
                        <div class="input">
                            <input class="input-item" class="input-item" type="email" name="email" id="email" placeholder="@gmail.com">
                        </div>
                        @error('email')
                            <p style="color: red;">{{$message}}</p>
                        @enderror

                    </div>

                    <div class="row">
                        <label for="password">Password</label>
                        <div class="input" style="position: relative;">
                            <input class="input-item" type="password" name="password" id="password" >

                            <span class="eye">

                                <span id="visible"><i class="fa-regular fa-eye"></i></span>
                                <span id="hidden"><i class="fa-regular fa-eye-slash"></i></span>
                            </span>
                        </div>
                        @error('password')
                            <p style="color: red;">{{$message}}</p>
                        @enderror

                    </div>
                    <div class="row">
                        <label for="phoneno">Phone Number</label>
                        <div class="input">
                            <input class="input-item" type="text" name="phoneno" id="phoneno" placeholder="09000000000">
                        </div>
                        @error('phoneno')
                            <p style="color: red;">{{$message}}</p>
                        @enderror

                    </div>
                    <div class="row">
                        <label for="image">Image</label>
                        <div class="input">
                            <input class="input-item" type="file" name="image" id="image">
                        </div>
                        @error('image')
                            <p style="color: red;">{{$message}}</p>
                        @enderror

                    </div>
                    <div class="row">
                        <label for="address">Location</label>
                        <div class="address-input">
                            <textarea class="input-item" type="address" name="address" id="address" placeholder="address">

                            </textarea>
                        </div>
                        @error('address')
                            <p style="color: red;">{{$message}}</p>
                        @enderror
                            <div class="state">
                                <input class="input-item" type="text" name="state" id="state" placeholder="State/Region">
                                <input class="input-item" type="text" name="zipcode" id="zip" placeholder="Zip Code(Eg. 1111)">
                            </div>
                            @error('state')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                            @error('zipcode')
                                <p style="color: red;">{{$message}}</p>
                            @enderror

                    </div>

                    <div class="row">
                        <button class="button" type="submit">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

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
