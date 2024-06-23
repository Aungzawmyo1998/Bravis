@extends('customers.index')

@section('title','about')


@section('content')

    <div id="about-us">

        <div class="main-container">
            <div class="header" style="background-image: url({{ asset('img/customers/AboutUs/about-header-bg.jpg')}})">
                <h1>About Us</h1>
            </div>
            <div class="first-data">
                <h2>Our Story </h2>
                <div class="data">
                    Bravis has launched in Myanmar since 2016.And Bravis was established with a new retail format that responds to the demand of a sector of young professionals who are interested in a highly aware of new trends.
                </div>
                <div class="img-container">
                    <img src="{{ asset('img/customers/AboutUs/about-1.png')}}" alt="">
                </div>
            </div>
            <div class="sec-data">
                <h2>Our Vision</h2>
                <div class="data">
                    To create a lead authentic brand, generating fashion nurturing confidence for Myanmar people.we envision transforming online shopping for fashion into a personalized, innovative, and sustainable experience. Our goal is to inspire and connect individuals through a curated collection that celebrates diverse styles.
                </div>
                <div class="img-container">
                    <img src="{{ asset('img/customers/AboutUs/about-2.png')}}" alt="">
                </div>
            </div>
            <div class="third-data">
                <h2>Our Mission</h2>
                <div class="data">
                    Our mission is to empower individuals to express their unique style with confidence through high-quality, trendsetting fashion. We are committed to curating a diverse and sustainable collection that caters to the dynamic tastes of our customers.
                </div>
                <div class="img-container">
                    <img src="{{ asset('img/customers/AboutUs/about-3.png')}}" alt="">
                </div>
            </div>
            <div class="fourth-data">
                <h2>Our Development Team</h2>
                <div class="data">
                    Our Development Team is dedicated to advancing the intersection of fashion and technology. Our mission is to innovate and elevate the online shopping experience, leveraging cutting-edge technologies to ensure a seamless, secure, and visually captivating platform. We are committed to staying ahead of industry trends, embracing creativity, and fostering a collaborative environment where our team members thrive and contribute to the continuous evolution of Bravis.
                </div>
            </div>
        </div>
    </div>
@endsection
