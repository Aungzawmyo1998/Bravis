
$(document).ready(function() {

    // $(documet).on('click','.detail-btn',function (e){
    //     e.preventDefault();
    //     $(this).closest('.detail-container').find('.order-details').css('display','none');
    // });
    // var orderDetail = $('#orderDetail');
    // var orderDetail = document.querySelectorAll('#orderDetail');


    $(document).on('click','.detail-btn', function (e) {
        e.preventDefault();


        if($(this).closest('.detail-container').find('.order-details').css("display") == "none") {
            $(".order-details").css("display", "none");
            $(this).closest('.detail-container').find('.order-details').css('display','block');

        } else {
            // $(".order-details").css("display", "none");
            $(this).closest('.detail-container').find('.order-details').css('display','none');
        }


    });






});
