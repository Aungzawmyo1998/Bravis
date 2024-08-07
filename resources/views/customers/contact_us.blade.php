@extends('customers.index')

@section('title','contact')


@section('content')

    <div id="contact-us">
        <div class="main-container">
            <div class="office-data">
                <h1>You Can Contact Us Directly At:</h1>
                <div class="data-row">
                    <p>Email : bravisazm@gmail.com</p>
                    <p>Contact No: (+95)9234535987</p>
                </div>
                <div class="data-row">
                    <p>Or you can write us via contact form.<br> We answer as quick as possible.</p>

                    <div class="social-icon">
                        <img src="{{asset('icon/home/instagram-icon.png')}}" alt="">
                        <img src="{{asset('icon/home/faceboook-icon.png')}}" alt="">
                        <img src="{{asset('icon/home/whatsApp-icon.png')}}" alt="">
                    </div>

                </div>
            </div>
            <div class="customer-data">

                <form class="customer-form" action="" >

                    <div class="header">
                        <h1>Contact Us</h1>
                    </div>
                    <div class="input-row">
                        <input id="cname" class="input-data" type="text" placeholder="Enter Your Name">
                        <div class="error">
                            The name cann't black
                        </div>
                    </div>
                    <div class="input-row">
                        <input id="cemail" class="input-data" type="email" placeholder="Enter Valid Email Address">
                        <div class="error">
                            The name cann't black
                        </div>
                    </div>
                    <div class="input-row">
                        <textarea class="address" name="" id="cmessage" cols="30" rows="10" placeholder="Enter Your Message"></textarea>
                        <div class="error">
                            The name cann't black
                        </div>
                    </div>

                    <button class="sub-btn" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection
