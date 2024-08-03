const openCartBtn = document.getElementById("open-cart");
const closeCartBtn = document.getElementById("close-cart");
const showCart = document.querySelector(".add-to-cart");
// const countProduct = document.querySelector("#countProduct");

openCartBtn.addEventListener("click", (e)=>{
    // console.log("click");
    e.stopPropagation();
    showCart.classList.add("active");
});

closeCartBtn.addEventListener('click', (e)=> {
    e.stopPropagation();
    showCart.classList.remove('active');
});

// window.addEventListener('click',(e)=>{
//     const targetClass = e.target.className;
//     // const handelClass = document.querySelector("")
//     if ( targetClass !== "add-item-container" && targetClass !== "btn-container" && targetClass !== "card-head" ) {
//         showCart.classList.remove('active');
//     }

// });

// ADD TO CART

/*

$(document).ready(function () {

    $.ajaxSetup(
        {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    var smallQty = parseInt($('#smallQty').val());
    var mediumQty = parseInt($('#mediumQty').val());
    var largeQty = parseInt($('#largeQty').val());

    var sizeSmallQty = parseInt($('#sizeSmallQty').val());
    var sizeMediumQty = parseInt($('#sizeMediumQty').val());
    var sizeLargeQty = parseInt($('#sizeLargeQty').val());




    $(document).on('click','#detail-product #addToCart', function (e) {

        e.preventDefault();
        // console.log($("#sizeSmallQty"));

        var productId = parseInt($('#productId').val());

        var size = $('input[name="size"]:checked').val();

        var countProduct = $(".cart-icon #count-product");
        var countValue = parseInt(countProduct.val());

        // $(".cart-icon #count-product").val(countValue);
        if(size == "small" ) {
            // var smallCountValue = 1;
            if(sizeSmallQty <= smallQty) {
                countValue ++;
                $.ajax({
                    type: 'POST',
                    url: `/product/${productId}/add/cart`,
                    data: {
                        "size": size,
                    },
                });
                $(".cart-icon #count-product").val(countValue);
            }
            sizeSmallQty ++;
            // alert(sizeSmallQty);
        }

        if(size == "median") {

            if(sizeMediumQty <= mediumQty) {
                sizeMediumQty ++;
                alert("median");
                countValue ++;
                $.ajax({
                    type: 'POST',
                    url: `/product/${productId}/add/cart`,
                    data: {
                        "size": size,
                    },
                });
                $(".cart-icon #count-product").val(countValue);
            }
        }

        if(size == "large") {
            // alert("large");
            if(sizeLargeQty <= largeQty) {
                countValue ++;
                sizeLargeQty ++;
                $.ajax({
                    type: 'POST',
                    url: `/product/${productId}/add/cart`,
                    data: {
                        "size": size,
                    },
                });
                $(".cart-icon #count-product").val(countValue);

            }
        }
            // $.ajax({
            //     type: 'POST',
            //     url: `/product/${productId}/add/cart`,
            //     data: {
            //         "size": size,

            //     },

            // });


    });


});
*/




// FOR CART UPDATE

$(document).ready(function (){

    $.ajaxSetup(
        {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    $('.increase-btn').click (function (e){
        e.preventDefault();

        // alert("click");

        var qty = $(this).closest('.product_data').find('.qty-value').val();
        var value = parseInt(qty);
        var sizeQty = $(this).closest('.product_data').find('#sizeQty').val();
        var sizeQtyValue = parseInt(sizeQty);
        var countProduct = $(".cart-icon #count-product");
        var countValue = parseInt(countProduct.val());

        // alert(sizeQty);
        if(value < sizeQtyValue) {
            value ++;
            countValue ++;
        }
        // value ++;

        $(this).closest('.product_data').find('.qty-value').val(value);

        $(".cart-icon #count-product").val(countValue);


    });

    $('.decrease-btn').click(function (e) {
        e.preventDefault();
        var qty = $(this).closest('.product_data').find('.qty-value').val();
        // alert(qty);
        var value = parseInt(qty);
        var countProduct = $(".cart-icon #count-product");
        var countValue = parseInt(countProduct.val());

        if (value > 1) {
            value --;
            countValue --;
            // $('.qty-value').val(value);
            $(this).closest('.product_data').find('.qty-value').val(value);
            $(".cart-icon #count-product").val(countValue);
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

        $.ajax({
            type: 'GET',
            url: '/cart/count',
            success: function(response) {
                // countProduct.innerHTML = response;
                console.log(response);
            }
        });

    });

    $(document).on('click','.remove-btn', function(){

        $(this).closest('.product_data').find('.cart-item').css('display','none');

        var productID = $(this).val();
        var size = $(this).closest('.product_data').find('.size').val();
        var countProduct = $(".cart-icon #count-product");
        var countValue = parseInt(countProduct.val());
        var qty = $(this).closest('.product_data').find('.qty-value').val();
        var value = parseInt(qty);
        $(".cart-icon #count-product").val(countValue-value);

        $.ajax({
            type: 'POST',
            url: '/cart/delete',
            data: {
                "id": productID,
                "size": size,
            }
        });

        $.ajax({
            type: 'GET',
            url: '/cart/count',
            success: function(response) {
                // countProduct.innerHTML = response;
                console.log(response);
            }
        });

    });

});

