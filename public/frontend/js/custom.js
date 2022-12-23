$(document).ready(function () {
    $(".add-to-cart").click(function (e) {
        e.preventDefault();
        var productId = $(this).closest(".product-data").find(".prod-id").val();
        var productQty = $(this)
            .closest(".product-data")
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
                productId: productId,
                productQty: productQty || "1",
            },
            success: function (response) {
                Swal.fire(response.status);
            },
        });
    });

    $(".add-to-wishlist").click(function (e) {
        e.preventDefault();
        var productId = $(this).closest(".product-data").find(".prod-id").val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            method: "POST",
            url: "/add-to-wishlist",
            data: {
                productId: productId,
            },
            success: function (response) {
                Swal.fire(response.status);
            },
        });
    });

    //  $(".increment-btn").click(function (e) {
    //      e.preventDefault();

    //      var inc_value = $(this)
    //          .closest(".product-data")
    //          .find(".qty-input")
    //          .val();
    //      var value = parseInt(inc_value, 10);
    //      value = isNaN(value) ? 0 : value;
    //      if (value < 10) {
    //          value++;
    //          $(this).closest(".product-data").find(".qty-input").val(value);
    //      }
    //  });

    //  $(".decrement-btn").click(function (e) {
    //      e.preventDefault();

    //      var dec_value = $(this)
    //          .closest(".product-data")
    //          .find(".qty-input")
    //          .val();
    //      var value = parseInt(dec_value, 10);
    //      value = isNaN(value) ? 0 : value;
    //      if (value > 1) {
    //          value--;
    //          $(this).closest(".product-data").find(".qty-input").val(value);
    //      }
    //  });

    $(".delete-cart-item").click(function (e) {
        e.preventDefault();

        var prod_id = $(this).closest(".product-data").find(".prod_id").val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            method: "POST",
            url: "/delete-cart-item",
            data: {
                prod_id: prod_id,
            },
            success: function (response) {
                window.location.reload();
                Swal.fire(response.status);
            },
        });
    });

    $(".remove-wishlist-item").click(function (e) {
        e.preventDefault();

        var prod_id = $(this).closest(".product-data").find(".prod-id").val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            method: "POST",
            url: "/remove-wishlist-item",
            data: {
                prod_id: prod_id,
            },
            success: function (response) {
                window.location.reload();
                Swal.fire("", response.status, "success");
            },
        });
    });

    $(".change-quantity").change(function (e) {
        e.preventDefault();

        var prod_id = $(this).closest(".product-data").find(".prod_id").val();
        var qty = $(this).closest(".product-data").find(".qty-input").val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            method: "POST",
            url: "update-cart-item",
            data: {
                prod_id: prod_id,
                product_qty: qty,
            },
            success: function (response) {
                window.location.reload();
                Swal.fire(response.status);
            },
        });
    });
});
