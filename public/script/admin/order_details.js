
$(document).ready(function() {

    $(document).on('click','.detail-btn', function (e) {
        e.preventDefault();


        if($(this).closest('.detail-container').find('.order-details').css("display") == "none") {
            $(".order-details").css("display", "none");
            $(".edit-container").css("display","none");
            $(this).closest('.detail-container').find('.order-details').css('display','block');

        } else {
            // $(".order-details").css("display", "none");
            $(this).closest('.detail-container').find('.order-details').css('display','none');
        }


    });
    $(document).on("click", "#detailCloseBtn", function(e){
        e.preventDefault();
        $(this).closest('.detail-container').find('.order-details').css('display','none');
    });


    $(document).on("click", '.edit-btn', function(e) {
        e.preventDefault();

        if($(this).closest('#order-edit').find('.edit-container').css("display") == "none") {
            $(".edit-container").css("display","none");
            $(".order-details").css("display", "none");
            $(this).closest('#order-edit').find('.edit-container').css("display","block");
        } else {

            $(this).closest('#order-edit').find('.edit-container').css("display","none");

        }

    } );

    $(document).on("click","#orderEditClose", function(e){
        e.preventDefault();

        $(this).closest('#order-edit').find('.edit-container').css("display","none");
    });

});
