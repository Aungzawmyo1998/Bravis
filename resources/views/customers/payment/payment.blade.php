<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- payment css --}}
    <link rel="stylesheet" href="{{ asset('css/customers/payment/payment.css')}}">
    {{-- jquery  --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>
<body>

    <div id="payment">
        <div class="main-container">
            <div class="header">
                <h1>Check Out</h1>
            </div>

            {{-- @session('success')
                        <div class="alert alert-success" role="alert">
                            {{ $value }}
                        </div>
                    @endsession --}}

            <div class="data-container">

                <form action="{{ route('payment') }}" id='checkout-form' method='post'>
                    @csrf

                    <div class="payment">
                        <div class="container contact">
                            <div class="header contact-header">
                                <h2>Contact</h2>
                                <span>Have an account?<a href="{{ route('customer.login')}}"> Login</a></span>
                            </div>
                            @auth
                                <div class="input-row">
                                    <input type="email" name="email" placeholder="Email*" value="{{ auth('customer')->user() != null ? $customer->email : null }}">
                                </div>
                            @endauth

                            <div class="input-row">
                                <input type="text" name="phno" placeholder="Phone Number" value="{{ auth('customer')->user() != null ? $customer->phonenumber : null }}">
                                @error('phno')
                                    <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="container delivery">
                            <div class="header">
                                <h2>Delivery</h2>
                            </div>
                            {{-- <div class="input-row">
                                <select name="state" id=""></select>
                            </div> --}}
                            <div class="input-row sec-input-row">
                                <div class="sec-child-input" >
                                    <input type="text" name="fname" placeholder="First Name" value="{{ auth('customer')->user() != null ? $customer->firstname : null }}">
                                    @error('fname')
                                        <p style="color: red;">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="sec-child-input" >
                                    <input type="text" name="lname" placeholder="Last Name" value="{{ auth('customer')->user() != null ? $customer->lastname : null }}">
                                    @error('lname')
                                        <p style="color: red;">{{$message}}</p>
                                    @enderror
                                </div>
                                {{-- <input type="text" name="fname" placeholder="First Name" value="{{ auth('customer')->user() != null ? $customer->firstname : null }}">
                                <input type="text" name="lname" placeholder="Last Name" value="{{ auth('customer')->user() != null ? $customer->lastname : null }}"> --}}
                            </div>
                            <div class="input-row">
                                <textarea name="address" class="address" id="" cols="30" rows="10" placeholder="Address">{{ auth('customer')->user() != null ? $customer->address : null }}</textarea>
                                @error('address')
                                        <p style="color: red;">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="input-row sec-input-row">
                                <div class="sec-child-input">
                                    <input type="text" name="state" placeholder="State/Region (eg. Yangon)" value="{{ auth('customer')->user() != null ? $customer->State_region : null }}">
                                    @error('state')
                                        <p style="color: red;">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="sec-child-input">
                                    <input type="text" name="zipcode" placeholder="Zip Code (Eg. 1111)" value="{{ auth('customer')->user() != null ? $customer->zipcode : null }}">
                                    @error('zipcode')
                                        <p style="color: red;">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="container shipping">
                            <div class="header">
                                <h2>Shippong Fees</h2>
                            </div>
                            <div class="data">
                                <input type="radio" class="s-fee" checked name="delfee" id="ygn" value="2500">
                                <input type="radio" class="s-fee" name="delfee" id="other-region" value="3500">

                                <label class="select-fee ygn" id="ygnBtn" for="ygn">Yangon 2500MMK</label>
                                <label class="select-fee other-region" id="otherBtn" for="other-region">Other Region 3500MMK</label>
                            </div>

                        </div>
                    </div>
                    <input type='hidden' name='stripeToken' id='stripe-token-id'>
                    <div id="card-element" class="card-data"></div>
                    <button type="button" id="pay-btn" class="pay-btn" onclick="createToken()"> Pay Now</button>
                </form>
                <div class="order">
                    <div class="your-order">

                        <table class="order-tb">
                            <thead>
                                <tr>
                                    <th><h2>Your Order</h2></th>
                                    <th><h2><a href="{{ route('customer.allproduct')}}">Edit</a></h2></th>
                                </tr>
                            </thead>
                            <tbody>
                               <tr>
                                    <td> {{ $totalQty }} Item</td>
                                    <td><span id="total">{{ $totalPrice }}</span> MMk</td>
                                </tr>
                               <tr>
                                    <td>Delivery Fees</td>
                                    <td><span id="delfee">2500</span> MMK</td>
                               </tr>
                               <tr>
                                    <td>Discount (available for registered user)</td>
                                    <td> MMK</td>
                               </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <td><span id="totalPrice">{{ $totalPrice+2500 }}</span> MMK</td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                    <hr >
                    <div class="item-detail">
                        <div class="header">
                            <h2>item Details</h2>
                        </div>

                        <div class="item-container">
                            @if( session()->get('cart') != null )
                                @foreach ( session()->get('cart') as $id => $data )
                                    <div class="item">
                                        <div class="img">
                                            <img src="{{ asset('img/products/register/'.$data['image'])}}" alt="">
                                        </div>
                                        <div class="data">
                                            <h4>{{ $data['name']}}</h4>
                                            <p>Price: {{ $data['price']*$data['qty']}} MMK</p>
                                            <p>Size: {{ $data['size']}}</p>
                                            <p>Quantity: {{ $data['qty']>1 ? $data['qty']." items" : $data['qty']." item"}} </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    {{-- stripe lib --}}
    <script src="https://js.stripe.com/v3/"></script>

    <script>

        var ygnFee = document.getElementById('ygn');
        var otherFee = document.getElementById('other-region');
        const delFee = document.getElementById('delfee');
        const totalPrice = document.getElementById('totalPrice');
        const productTotalPrice = document.getElementById('total').innerHTML;

        ygnFee.addEventListener("change", ()=>{
            delFee.innerHTML = ygnFee.value;

            totalPrice.innerHTML = parseInt(productTotalPrice) + parseInt(ygnFee.value);
        });
        otherFee.addEventListener("change", ()=>{
            delFee.innerHTML = otherFee.value;
            totalPrice.innerHTML = parseInt(productTotalPrice) + parseInt(otherFee.value);

        });

        // PAYMENT
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        function createToken() {
        document.getElementById("pay-btn").disabled = true;
        stripe.createToken(cardElement).then(function(result) {

            if(typeof result.error != 'undefined') {
                document.getElementById("pay-btn").disabled = false;
                alert(result.error.message);
            }

            /* creating token success */
            if(typeof result.token != 'undefined') {
                document.getElementById("stripe-token-id").value = result.token.id;
                document.getElementById('checkout-form').submit();
            }
        });
    }



    </script>

</body>
</html>
