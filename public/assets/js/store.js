$('#product_price').keyup(function() {
    var tprice = $('#product_price').val() * $('#product_num').val();
    $('#total_price').val(tprice);
});

$('#product_num').keyup(function() {
    var tprice = $('#product_price').val() * $('#product_num').val();
    $('#total_price').val(tprice);
});

$('#pproduct_price').keyup(function() {
    var tprice = $('#pproduct_price').val() * $('#pquantity').val();
    $('#ptotal_price').val(tprice);
});
$('#pquantity').keyup(function() {
    console.log($('#pproduct_price').val());
    var tprice = $('#pproduct_price').val() * $('#pquantity').val();
    $('#ptotal_price').val(tprice);
});


$('#pproductkey').keyup(function() {
    var productkey = $('#pproductkey').val();
    var route_getproducts = $(this).attr("data-name");
    $('#pproduct_list').css({ 'display': 'none' });
    var shtml = '';
    console.log(productkey.length);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if (productkey.length > 0) {
        $.ajax({
            url: route_getproducts,
            type: "POST",
            data: { productkey: productkey },
            dataType: "json",
            success: function(result) {
                shtml += `<thead>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Quantity of Store</th>
                    </thead>
                    <tbody>`;
                const { results } = result;
                for (i in results) {
                    $('#pproduct_list').css({ 'display': 'block' });
                    shtml += `<tr class="productinfo" id ="${results[i].id}" pro_price="${results[i].product_price}" pro_name="${ results[i].product_name }"><td><div class="img"><img class="w-100" src="${results[i].image}"></div></td><td>${ results[i].product_name }</td><td class="text-center">₪ ${results[i].product_price}</td><td class="text-center">${ results[i].product_num }</td></tr>`;
                }
                shtml += '</tbody>';
                $('#pproductlist').html(shtml);
                $('#pproductlist tr').click(function() {
                    var product_id = $(this).attr('id');
                    console.log(product_id);
                    var product_price = $(this).attr('pro_price');
                    var product_name = $(this).attr('pro_name');
                    $('#pproduct_id').val(product_id);
                    $('#pproduct_name').val(product_name);
                    $('#pproduct_price').val(product_price);
                    $('#pproductkey').val('');
                    $('#pproduct_list').css({ 'display': 'none' });
                })
            }
        });
    }
});


function delete_product(id) {
    var route_deletproduct = $('#prod_list').attr("data-name");
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $.ajax({
        url: route_deletproduct,
        type: "POST",
        data: { id: id },
        dataType: "json",
        success: function(result) {
            location.reload();
        }
    });
}