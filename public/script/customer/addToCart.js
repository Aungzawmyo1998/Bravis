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

// ADD TO CART



$(document).ready(function () {


    $(document).on('click','#detail-product #addToCart', function () {

        // e.preventDefault();

        var countProduct = $(".cart-icon #count-product");
        var countValue = parseInt(countProduct.val());

        $(".cart-icon #count-product").val(countValue);


    });
    // $(document).on('click', '.product_data .increase-btn', function(){

    //     var countProduct = $(".cart-icon #count-product");
    //     var countValue = parseInt(countProduct.val());
    //     countValue ++;
    //     $(".cart-icon #count-product").val(countValue);


    // });
    // $(document).on('click', '.product_data .decrease-btn', function(){

    //     var countProduct = $(".cart-icon #count-product");
    //     var countValue = parseInt(countProduct.val());
    //     countValue --;
    //     $(".cart-icon #count-product").val(countValue);
    // });
    // $(document).on('click', '.product_data .updateQty', function(){

    //     var countProduct = $(".cart-icon #count-product");
    //     var countValue = parseInt(countProduct.val());
    //     countValue --;
    //     $(".cart-icon #count-product").val(countValue);
    // });

});




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

    });

});

