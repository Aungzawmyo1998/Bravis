$(document).ready(function () {
    $('.allProduct').on('keyup','#searchValue', function () {
        var searchValue = $(this).val();

        console.log(searchValue);

        $.ajax({
            method: 'GET',
            url: '/allProduct/search',
            dataType: 'json',
            data: {
                'searchValue': searchValue,
            },

            success: function (data) {
                var items = '';
                $('#allProduct').html('');
                $.each(data, function(index,product) {
                    // console.log(product.image);

                    items = ` <a href="${product.id}/detail" class="card">
                                <div class="img-container">
                                    <img src="/img/products/register/${product.image}" alt="">
                                </div>
                                <div class="data">
                                    <p>${ product.name}</p>
                                    <p class="price" style="font-weight: 500" >${ product.price } MMK</p>
                                </div>
                            </a>`

                    $('#allProduct').append(items);
                });
            }
        });

    });
});

$(document).ready(function(){
    $('.allProduct').on('change', '#sorting', function () {
        var sortingValue = $(this).val();
        console.log(sortingValue);

        $.ajax({
            method: 'GET',
            url: '/allProduct/sorting',
            dataType: 'json',
            data: {
                'sortingValue': sortingValue,
            },
            success:  function( data ) {

                var items  = '';
                $('#allProduct').html('');
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

                    $('#allProduct').append(items);
                });
            }
        });
    });
});
