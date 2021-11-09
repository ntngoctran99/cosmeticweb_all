$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// xử lý comment
$('#commentform').on('submit', function (e) {
    e.preventDefault();
    let message = $('#comment').val();
    let idProduct = $('#comment_post_ID').val();
    let userId = $("#user_ID").val();
    let rating = $("#ratings").val();

    if (userId === '' || message === '') {
        $('.text-login').css('display', 'block');
        $('#modalLogin').modal('show');
        return;
    }

    $.ajax({
        url: "../api/add/review",
        type: "POST",
        data: {
            // "_token": "{{ csrf_token() }}",
            message: message,
            idProduct: idProduct,
            userId: userId,
            rating: rating
        },
        success: function (response) {
            if (response.status === 'success') {
                window.location.reload(true);
            }
            console.log(response);
        },
        error: function (error) {
            console.log(error);
        },
    });

});

$('#add_cart').on('click', function () {
    let quantity = $("#quantity_input_detail").val();
    let idProduct = $(this).attr('data-id');

    $.ajax({
        method: 'POST',
        url: '/cart/add',
        data: {
            id: idProduct,
            quantity: quantity
        }
    })
        .done(function (response) {
            console.log(response)
            if(response.status == -1) {
                alert('Inventory is not enough')
            }
            else if (response.status == -2)
            {
                alert('The maximum allowed purchase quantity of this product has been reached.')
            }
            else {
                $(document).trigger('add-to-cart-success');
            }
            // $(document).trigger('get-cart-popup');
            // $(document).trigger('check-cart');
        })
        .fail(function (response) {

        })
        .always(function () {
            //alert( "complete" );
        });
});

$(document).on('add-to-cart-success', function () {
    $.ajax({
        method: 'POST',
        url: '/cart/check',
        data: {}
    })
        .done(function (cart) {
            //console.log("url", cart);
            $('.count_quntity').text(cart.total_items);
            $("#modalNotification").modal('show');
            $("#notifi").text('Add Product Success')
            setTimeout(function () {
                $("#modalNotification").modal('hide');
            }, 2000);
            // let total = cart.total;
            // $('.cart .total span').text(total.toFixed().replace(/(\d)(?=(\d{3})+(,|$))/g, '$1,'));
        })
        .fail(function () {
            //alert("check cart faild!");
        })
        .always(function () {
            //alert( "complete" );
        });
});


// handle button minus products in checkout
/*$(".quantity #quantity_checkout span.dec.qtybtn").on("click", function (e) {
    e.preventDefault();
    var proId = $('#product_id').attr('data-id')
    var newqty = $('#upQuantity'+proId).val() -1 ;
    console.log(newqty)
    $.ajax({
        method: 'POST',
        url: '/cart/update',
        data: {
            id: proId,
            qty: newqty
        }
    })
        .done(function (response) {
            console.log(response)
            if (response.status) {
                window.location.reload(true);
            }
        })
        .fail(function () {
            // alert("check cart faild!");
        })
        .always(function () {
            //alert( "complete" );
        });
});*/

//handle button plus products in checkout
/*$(".quantity #quantity_checkout span.inc.qtybtn").on("click", function (e) {
    e.preventDefault();
    var proId = $('#product_id').attr('data-id')
    var newqty = parseInt($('#upQuantity'+proId).val()) +1;
    console.log(newqty)
    $.ajax({
        method: 'POST',
        url: '/cart/update',
        data: {
            id: proId,
            qty: newqty
        }
    })
        .done(function (response) {
            console.log(response)
            if (response.status) {
                window.location.reload(true);
            }
        })
        .fail(function () {
            // alert("check cart faild!");
        })
        .always(function () {
            //alert( "complete" );
        });
});*/

/*$(".quantity #quantity_checkout .qtybtn").on("click", function (e) {
    e.preventDefault();
    var proId = $('#product_id').attr('data-id')
    var newqty = $('#upQuantity'+proId).val() ;
    alert(newqty)
});*/

$('.increment-btn').click(function (e) {
    e.preventDefault();
    var incre_value = $(this).parents('.quantity').find('.qty-input').val();
    var value = parseInt(incre_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value<100){
        value++;
        $(this).parents('.quantity').find('.qty-input').val(value);
    }
});

$('.decrement-btn').click(function (e) {
    e.preventDefault();
    var decre_value = $(this).parents('.quantity').find('.qty-input').val();
    var value = parseInt(decre_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value>1){
        value--;
        $(this).parents('.quantity').find('.qty-input').val(value);
    }
});

$('.changeQuantity').click(function (e) {
    e.preventDefault();

    var thisClick = $(this);
    var quantity = $(this).closest("#detail_cart").find('.qty-input').val();
    var product_id = $(this).closest("#detail_cart").find('#product_id').val();

    $.ajax({
        method: 'POST',
        url: '/cart/update',
        data: {
            id: product_id,
            qty: quantity
        }
    })
        .done(function (response) {
            //console.log(response)
            if (response.status) {
                thisClick.closest("#detail_cart").find('#cart_total').text('$'+response.ttprice);
                $('#totalajaxcall').load(location.href + ' .totalloading');
            }
            else{
                alert(response.message);
                thisClick.closest("#detail_cart").find('#cart_total').text('$'+response.ttprice);
                thisClick.closest("#detail_cart").find('.qty-input').val(1);
            }
        })
        .fail(function () {
            // alert("check cart faild!");
        })
        .always(function () {
            //alert( "complete" );
        });
});

$('.qty-input').change(function (e){
    //console.log(e)
    e.preventDefault();
    var thisClick = $(this);
    var quantity = $(this).closest("#detail_cart").find('.qty-input').val();
    var product_id = $(this).closest("#detail_cart").find('#product_id').val();
    if(quantity<=0)
    {
        $(this).closest("#detail_cart").find('.qty-input').val(1);
        quantity=1;
    }
    $.ajax({
        method: 'POST',
        url: '/cart/update',
        data: {
            id: product_id,
            qty: quantity
        }
    })
        .done(function (response) {
            //console.log(response)
            if (response.status) {
                thisClick.closest("#detail_cart").find('#cart_total').text('$'+response.ttprice);
                $('#totalajaxcall').load(location.href + ' .totalloading');
            }
            else{
                alert(response.message);
                thisClick.closest("#detail_cart").find('#cart_total').text('$'+response.ttprice);
                thisClick.closest("#detail_cart").find('.qty-input').val(1);
                //window.location.reload(true);
            }
        })
        .fail(function () {
            // alert("check cart faild!");
        })
        .always(function () {
            //alert( "complete" );
        });
});

$('.quantity_input_detail').change(function (e){
    //console.log(e)
    e.preventDefault();
    var quantity = $('#quantity_input_detail').val();
    if(quantity<=0)
    {
        alert('The quantity you order must be greater than 0')
        $('#quantity_input_detail').val(1);
    }
});

// // hanlde button remove cart in checkout
$('.rm_cart').on('click', function (e) {
    e.preventDefault();
    let idProduct = $(this).data('id');
    $.ajax({
        method: 'POST',
        url: '/cart/remove',
        data: {
            id: idProduct
        }
    })
        .done(function (msg) {
            if (msg.status) {
                window.location.reload(true);
            }

            // $('.cart-item-' + id).remove();
            // if (in_cart) {
            //     init_cart_tippy()
            // }

        })
        .fail(function () {
            // alert("check cart faild!");
        })
        .always(function () {
            //alert( "complete" );
        });
});

// handle order
$("#btn-order").on('click', function (e) {
    e.preventDefault();
    $(".errorFull").css("display", "none");
    $(".errorUsername").css("display", "none");
    let userID = $("#userIDBill").val();
    let fullname = $("#usernameBill").val();
    let address = $("#addressBill").val();
    let phone_number = $("#phoneBill").val();
    let note = $("#noteBill").val();
    let total_product = $("#totalProduct").val();
    let cart_detail = $("#cart_detail").val();
    //console.log(cart_detail)
    if (userID === '') {
        $('.text-login').css('display', 'block');
        $("#modalLogin").modal('show');
        return;
    }

    if (fullname === '' || address === '' || phone_number === '') {
        $(".errorFull").css("display", "block");
        return;
    } else {
        $.ajax({
            method: 'POST',
            url: '../api/orders',
            data: {
                idUser: userID,
                fullname: fullname,
                address: address,
                phone_number: phone_number,
                note: note,
                total_product: total_product,
                cart_detail: cart_detail,
            }
        })
            .done(function (msg) {
                if (msg.status) {
                    //console.log(msg)
                    $(document).trigger('remove-session-cart');
                    //window.location.reload(true);
                }
            })
            .fail(function () {
                 alert("check cart faild!");
            })
            .always(function () {
                //alert( "complete" );
            });
    }

});

// remove order
$(".rm_order").on('click', function (e) {
    e.preventDefault();
    let idOrder = $(this).data('id');
    let quantity = $(this).data('quantity');
    let stock = $(this).data('stock');
    let orderDetail = $(this).data('order-detail');

    $.ajax({
        method: 'DELETE',
        url: '../api/remove/orders',
        data: {
            id: idOrder,
            cart_quantity: quantity,
            product_quantity: stock,
            order_detail : orderDetail
        }
    })
        .done(function (msg) {
            if (msg.status) {
                //console.log(msg);
                window.location.reload(true);
            }
            if(msg.status == -1){
                alert(msg.message)
                window.location.reload(true);
            }
        })
        .fail(function () {
            // alert("check cart faild!");
        })
        .always(function () {
            //alert( "complete" );
        });
})

// remove session cart
$(document).on('remove-session-cart', function () {
    $.ajax({
        method: 'POST',
        url: '/cart/remove/session',
        data: {}
    })
        .done(function (msg) {
            if (msg.status) {
                window.location.href = $("#menu_home").data('href');
            }
        })
        .fail(function (error) {
            // alert("check cart faild!");
        })
        .always(function () {
            //alert( "complete" );
        });
});

$(document).ready(function () {
    $.ajax({
        method: 'POST',
        url: '/cart/check',
        data: {}
    })
        .done(function (cart) {
            $('.count_quntity').text(cart.total_items);
        })
        .fail(function () {
            // log("gio hang rong")
            // alert("check cart faild!");
        })
        .always(function () {
            //alert( "complete" );
        });
});
