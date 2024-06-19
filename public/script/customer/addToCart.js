const openCartBtn = document.getElementById("open-cart");
const closeCartBtn = document.getElementById("close-cart");
const showCart = document.querySelector(".add-to-cart");

openCartBtn.addEventListener("click", ()=>{

    // console.log("click");
    showCart.classList.add("active");
});

closeCartBtn.addEventListener('click', ()=> {
    showCart.classList.remove('active');
});


// FOR CART UPDATE

$(document).ready(function (){

    $.ajaxSetup(
        {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }
        );

    $('.increase-btn').click (function (e){
        e.preventDefault();


        var qty = $(this).closest('.product_data').find('.qty-value').val();

        var value = parseInt(qty);
        value ++;

        $(this).closest('.product_data').find('.qty-value').val(value);


    });

    $('.decrease-btn').click(function (e) {
        e.preventDefault();
        var qty = $(this).closest('.product_data').find('.qty-value').val();
        // alert(qty);
        var value = parseInt(qty);

        if (value > 1) {
            value --;
            // $('.qty-value').val(value);
            $(this).closest('.product_data').find('.qty-value').val(value);
        }


    });

    // price


    // increase qty in session

    $(document).on('click','.updateQty', function () {


        var qty = $(this).closest('.product_data').find('.qty-value').val();
        var value = parseInt(qty);
        var productID  = $(this).val();

        var unitPrice = $(this).closest('.product_data').find('.price').val();
        // alert(unitPrice);
        totalPrice = parseInt(unitPrice)*qty;
        $(this).closest('.product_data').find('.total-price').val(totalPrice);


        $.ajax({
            type: 'POST',
            url: '/cart/update',


            data: {

                "id": productID,
                "qty": value,

            },

        });

    });
});

// for show cart

/*

$(document).ready(function()  {

    // $('.add-to-cart').click(function (){
    //     var product = $(this).closest('.product');
    //         var productId = product.data('id');
    //         var productName = product.data('name');
    //         var productPrice = product.data('price');
    //         var productImg = product.data('image');
    //         // var productQty = product.data('qty');

    //         $.ajax({
    //             url: '/add-to-cart',
    //             method: 'POST',
    //             data: {
    //                 id: productId,
    //                 name: productName,
    //                 price: productPrice,
    //                 _token: '{{ csrf_token() }}' // Ensure to include CSRF token
    //             },

    //         });
    // });

    $('.increase-quantity').click(function () {
        var productId = $(this).closest('.cart-item').data('id');

        $.ajax({
            url: '{route("update.cart")}',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                product_id: productId,
                action: 'increase'
            },
            // success: function(response) {
            //     alert(response.message);
            //     console.log(response.cart);
            //     // Update the cart UI
            // },
            // error: function(xhr, status, error) {
            //     console.error(xhr.responseText);
            // }
        });
    } );
});

*/
