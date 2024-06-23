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

    $(document).on('click','.updateQty', function (e) {
        e.preventDefault();

        var qty = $(this).closest('.product_data').find('.qty-value').val();
        var value = parseInt(qty);
        var productID  = $(this).val();

        var unitPrice = $(this).closest('.product_data').find('.price').val();
        totalPrice = parseInt(unitPrice)*qty;
        $(this).closest('.product_data').find('.total-price').val(totalPrice);

        var size = $(this).closest('.product_data').find('.size').val();

        $.ajax({
            type: 'POST',
            url: '/cart/update',


            data: {

                "id": productID,
                "qty": value,
                "size": size,

            },

        });

    });

    $(document).on('click','.remove-btn', function(){

        $(this).closest('.product_data').find('.cart-item').css('display','none');

        var productID = $(this).val();
        var size = $(this).closest('.product_data').find('.size').val();


        $.ajax({
            type: 'POST',
            url: '/cart/delete',
            data: {
                "id": productID,
                "size": size,
            }
        });

    });
    // INC VALUE
    // $(document).on('click','#btn', function(){

    // });
});
