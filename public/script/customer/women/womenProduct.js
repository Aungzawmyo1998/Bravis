
// women search

$(document).ready(function (){

    $('.women').on('keyup','#searchValue', function() {

        var searchValue = $(this).val();
        // console.log($searchValue);
        $.ajax({
            method: 'GET',
            url: '/women/search',
            dataType: 'json',
            data: {
                'searchValue': searchValue,
            },
            success:  function( data ) {
                // function createProductCard(product) {

                // }
                // alert(JSON.stringify(data));

                var items  = '';
                $('#womenProduct').html('');
                $.each(data, function(index, product) {

                    console.log(product.image);
                    items = '<a href="'+product.id+'/detail" class="card"><div class="img-container"><img src="/img/products/register/'+product.image+'"></div></a>';

                    // alert(items);


                    $('#womenProduct').append(items);
                });
            }
        });
    });

});
