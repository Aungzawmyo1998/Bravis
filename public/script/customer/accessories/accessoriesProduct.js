
// women search

$(document).ready(function (){

    $('.accessories').on('keyup','#searchValue', function() {

        var searchValue = $(this).val();
        // var sortingValue = $(this)
        // console.log($searchValue);
        $.ajax({
            method: 'GET',
            url: '/accessories/search',
            dataType: 'json',
            data: {
                'searchValue': searchValue,
            },
            success:  function( data ) {

                var items  = '';
                $('#accessoriesProduct').html('');
                $.each(data, function(index, product) {

                    // console.log(product.image);
                    // items = '<a href="'+product.id+'/detail" class="card"><div class="img-container"><img src="/img/products/register/'+product.image+'"></div></a>';

                    items = `<a href="${product.id}/detail" class="card">
                            <div class="img-container">

                                <img src="/img/products/register/${product.image}" alt="">
                            </div>
                            <div class="data">
                                <p>${ product.name}</p>
                                <p class="price" style="font-weight: 500" >${ product.price } MMK</p>
                            </div>
                        </a>`

                    $('#accessoriesProduct').append(items);
                });
            }
        });

    });

    $(document).ready(function(){
        $('.accessories').on('change', '#sorting', function () {
            var sortingValue = $(this).val();
            // console.log(sortingValue);

            $.ajax({
                method: 'GET',
                url: '/accessories/sorting',
                dataType: 'json',
                data: {
                    'sortingValue': sortingValue,
                },
                success:  function( data ) {

                    var items  = '';
                    $('#accessoriesProduct').html('');
                    $.each(data, function(index, product) {

                        // console.log(product.image);
                        // items = '<a href="'+product.id+'/detail" class="card"><div class="img-container"><img src="/img/products/register/'+product.image+'"></div></a>';

                        items = `<a href="${product.id}/detail" class="card">
                                <div class="img-container">

                                    <img src="/img/products/register/${product.image}" alt="">
                                </div>
                                <div class="data">
                                    <p>${ product.name}</p>
                                    <p class="price" style="font-weight: 500" >${ product.price } MMK</p>
                                </div>
                            </a>`

                        $('#accessoriesProduct').append(items);
                    });
                }
            });
        });
    });

    // $(document).

});
