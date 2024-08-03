<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}"  >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/admins/login.css')}}" type="text/css">
    <title>Document</title>
</head>
<body>

    <div class="body_container">

        <div class="form">
            <h2 >Bravis</h2>
            <h4 >ADMIN PANEL</h4>
            <p >Control panel login</p>
            <form action="{{ route('admin.login.process')}}" method="POST">
                @csrf

                @error('detail')
                    <p class="error" > {{ $message}}</p>
                @enderror
                <div class="input_container">

                    <span class="">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M480-440q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0-80q26 0 43-17t17-43q0-26-17-43t-43-17q-26 0-43 17t-17 43q0 26 17 43t43 17Zm0 440q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Zm0-400Zm0-315-240 90v189q0 54 15 105t41 96q42-21 88-33t96-12q50 0 96 12t88 33q26-45 41-96t15-105v-189l-240-90Zm0 515q-36 0-70 8t-65 22q29 30 63 52t72 34q38-12 72-34t63-52q-31-14-65-22t-70-8Z"/></svg>
                        <input type="email" name="email" id="email" placeholder="admin" value="">

                    </span>
                    @error('email')
                        <p class="error" > {{ $message}}</p>
                    @enderror

                </div>

                <div class="input_container ">

                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-400q-33 0-56.5-23.5T200-480q0-33 23.5-56.5T280-560q33 0 56.5 23.5T360-480q0 33-23.5 56.5T280-400Zm0 160q-100 0-170-70T40-480q0-100 70-170t170-70q67 0 121.5 33t86.5 87h352l120 120-180 180-80-60-80 60-85-60h-47q-32 54-86.5 87T280-240Zm0-80q56 0 98.5-34t56.5-86h125l58 41 82-61 71 55 75-75-40-40H435q-14-52-56.5-86T280-640q-66 0-113 47t-47 113q0 66 47 113t113 47Z"/></svg>
                        <input type="password" name="password" id="password"  placeholder="password" >
                        <span class="eye">

                            <span id="visible"><i class="fa-regular fa-eye"></i></span>
                            <span id="hidden"><i class="fa-regular fa-eye-slash"></i></span>
                        </span>

                    </span>
                    @error('password')
                        <p class="error">{{$message}}</p>
                    @enderror


                </div>

                <button type="submit" class="login-btn" >Login</button>
            </form>
        </div>
    </div>







<!-- script -->
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
