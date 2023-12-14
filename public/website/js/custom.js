$(document).ready(function () {
    $(".AddToCart").click(function (e) {
        e.preventDefault();
        let product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();
        let product_qty = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                product_qty: product_qty,
            },
            dataType: "json",
            success: function (response) {
                alert(response.status);
                // $('#cart-count').text(response.cart_count);
            },
        });
    });

    $(".increment-btn").click(function (e) {
        e.preventDefault();
        let inc_value = $(this)
        .closest(".product_data")
        .find(".qty-input")
        .val(); // input value
        let value = parseInt(inc_value, 10); // till 10
        value = isNaN(value) ? 0 : value; // value is number or not
        if (value < 10) {
            value++;
            $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val(value);
        }
    });

    $(".decrement-btn").click(function (e) {
        e.preventDefault();
        let dec_value = $(this)
        .closest(".product_data")
        .find(".qty-input")
        .val(); // input value
        let value = parseInt(dec_value, 10); // till 10
        value = isNaN(value) ? 0 : value; // value is number or not
        if (value > 1) {
            value--;
            $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val(value);
        }
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(".delete-cart-item").click(function (e) {
        e.preventDefault();
        let prod_id = $(this)
        .closest(".product_data")
        .find(".prod_id")
        .val(); 

        $.ajax({
            method: "POST",
            url: "delete-cart-item",
            data: {
                'prod_id': prod_id,
            },
            success: function (response) {
                window.location.reload();
                alert(response.status);
                // $('#cart-count').text(response.cart_count);
            },
        });
    });

    $(".changeQuantity").click(function (e)
    {
        e.preventDefault();
        let prod_id = $(this)
        .closest(".product_data")
        .find(".prod_id")
        .val(); 
        let qty = $(this)
        .closest(".product_data")
        .find(".qty-input")
        .val(); 

        data ={
            'prod_id' : prod_id,
            'prod_qty' : qty,
        }
        $.ajax({
            method: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                // $("#cart-count").text(response.cart_count);
                window.location.reload();
            },
        });
    });
});
