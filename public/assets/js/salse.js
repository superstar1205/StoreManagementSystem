$('#iproductkey').keyup(function() {
    var productkey = $('#iproductkey').val();
    var route_getproducts = $(this).attr("data-name");
    $('#iproduct_list').css({ 'display': 'none' });
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
                    $('#iproduct_list').css({ 'display': 'block' });
                    shtml += `<tr class="productinfo" id ="${results[i].id}" pro_price="${results[i].product_price}" pro_name="${ results[i].product_name }"><td class="img"><img class="w-100" src="${results[i].image}"></td><td>${ results[i].product_name }</td><td class="text-center">₪ ${results[i].product_price}</td><td class="text-center">${ results[i].product_num }</td></tr>`;
                }
                shtml += '</tbody>';
                $('#iproductlist').html(shtml);
                $('#iproductlist tr').click(function() {
                    var product_id = $(this).attr('id');
                    console.log(product_id);
                    var product_price = $(this).attr('pro_price');
                    var product_name = $(this).attr('pro_name');
                    $('#iproduct_id').val(product_id);
                    $('#iproduct_name').val(product_name);
                    $('#iproduct_price').val(product_price);
                    $('#iproductkey').val('');
                    $('#iproduct_list').css({ 'display': 'none' });
                })
            }
        });
    }
});


$('#iproduct_price').keyup(function() {
    var tprice = $('#iproduct_price').val() * $('#iquantity').val();
    $('#itotal_price').val(tprice);
});
$('#iquantity').keyup(function() {
    console.log($('#iproduct_price').val());
    var tprice = $('#iproduct_price').val() * $('#iquantity').val();
    $('#itotal_price').val(tprice);
});

$('#iproductadd').click(function() {
    var inv_no = $('#iinvoice_no').val();
    var customer = $('#icustomer').val();
    var product_id = $('#iproduct_id').val();
    var quantity = $('#iquantity').val();
    var price = $('#iproduct_price').val();
    var total_price = $('#itotal_price').val();
    var route_addproduct = $(this).attr("data-name");
    if (!customer) {
        alert('Please enter Customer name');
    } else if (!quantity) {
        alert('Please enter Quantity');
    } else if (!price) {
        alert('Please enter Price');
    } else if (!total_price) {
        alert('Please enter Total Price');
    } else {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: route_addproduct,
            type: "POST",
            data: { inv_no: inv_no, customer: customer, product_id: product_id, price: price, quantity: quantity, total_price, total_price },
            dataType: "json",
            success: function(result) {
                $('#iproduct_id').val('');
                $('#iquantity').val('');
                $('#iproduct_price').val('');
                $('#itotal_price').val('');
                $('#iproduct_name').val('');
                const { results } = result;
                var shtml = '';
                var total_iprice = 0;
                if (results.length > 0) {
                    for (i in results) {
                        var key = Number(i) + 1;
                        total_iprice += results[i].total_price;
                        shtml += `<tr>
                                    <td class="text-center">${ key }</td>
                                    <td class="text-center"><div class="i_img"><img class="w-100" src="${ results[i].image }"></div></td>
                                    <td>${ results[i].product_name }</td>
                                    <td class="text-center">₪ ${ results[i].product_price }</td>
                                    <td class="text-center">${ results[i].product_amount }</td>
                                    <td class="text-center">₪ ${ results[i].total_price }</td>
                                    <td  class="text-center"><a class="dropdown-item"  onclick="deletiproduct(${ results[i].id })" ><i class="bx bx-trash me-1"></i> Delete</a></td>
                                </tr>`;
                    }
                    shtml += '<tr><td colspan=5><strong>Total Price</strong></td><td class="text-center">₪ <label id="inv_total_p">' + total_iprice + '</label></td></tr>';
                    $('#invoice_list').html(shtml);
                    $("#paid_price").attr({
                        "max": total_iprice,
                        "placeholder": "Max price is ₪" + total_iprice
                    });
                }
            },
        });
    }

});

$('#paid_price').keyup(function() {
    var paid_price = $('#paid_price').val();
    var inv_total_p = Number($('#inv_total_p').text());
    if (paid_price >= inv_total_p) {
        $('#unpaid_price').val('0');
        $('#inv_status').val('Complete');
    } else {
        $('#unpaid_price').val(inv_total_p - paid_price);
        $('#inv_status').val('In Complete');
    }

});
$('#npaid_price').keyup(function() {
    var npaid = $('#npaid_price').val();
    var upaid = Number($('#unpaid_a').text());
    if (npaid >= upaid) {
        $('#nunpaid_price').val('0');
        $('#ninv_status').val('Complete');
    } else {
        $('#nunpaid_price').val(upaid - npaid);
        $('#ninv_status').val('In Complete');
    }
});

function deletiproduct(id) {
    var route_deletiproduct = $('#invoice_list').attr("data-name");
    var inv_no = $('#iinvoice_no').val();
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $.ajax({
        url: route_deletiproduct,
        type: "POST",
        data: { id: id, inv_no: inv_no },
        dataType: "json",
        success: function(result) {
            $('#iproduct_id').val('');
            $('#iquantity').val('');
            $('#iproduct_price').val('');
            $('#itotal_price').val('');
            $('#iproduct_name').val('');
            const { results } = result;
            var shtml = '';
            var total_iprice = 0;
            if (results.length > 0) {
                for (i in results) {
                    var key = Number(i) + 1;
                    total_iprice += results[i].total_price;
                    shtml += `<tr>
                                <td class="text-center">${ key }</td>
                                <td class="text-center"><div class="i_img"><img class="w-100" src="${ results[i].image }"></div></td>
                                <td>${ results[i].product_name }</td>
                                <td class="text-center">₪ ${ results[i].product_price }</td>
                                <td class="text-center">${ results[i].product_amount }</td>
                                <td class="text-center">₪ ${ results[i].total_price }</td>
                                <td  class="text-center"><a class="dropdown-item" onclick="deletiproduct(${ results[i].id })" ><i class="bx bx-trash me-1"></i> Delete</a></td>
                            </tr>`;
                }
                shtml += '<tr><td colspan=5><strong>Total Price</strong></td><td class="text-center" >₪<label id="inv_total_p">' + total_iprice + '</label></td></tr>';
                $('#invoice_list').html(shtml);
                $("#paid_price").attr({
                    "max": total_iprice,
                    "placeholder": "Max price is " + total_iprice
                });
                if ($("#paid_price").val() > total_iprice) {
                    $("#paid_price").val(total_iprice);
                }
            }
        },
    });
}

function delete_inv(inv_no) {
    var route_deletinv = $('#inv_list').attr("data-name");
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $.ajax({
        url: route_deletinv,
        type: "POST",
        data: { inv_no: inv_no },
        dataType: "json",
        success: function(result) {
            location.reload();
        }
    });
}

function delete_expense(id) {
    var route_deletexpense = $('#expense_list').attr("data-name");
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $.ajax({
        url: route_deletexpense,
        type: "POST",
        data: { id: id },
        dataType: "json",
        success: function(result) {
            location.reload();
        }
    });
}

function delete_partner(id, percentage) {
    var route_deletpartner = $('#partner_list').attr("data-name");
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    $.ajax({
        url: route_deletpartner,
        type: "POST",
        data: { id: id, percentage: percentage },
        dataType: "json",
        success: function(result) {
            location.reload();
        }
    });
}