$(document).ready(function () {
    var fname = $(".fname").val();
    var lname = $(".lname").val();
    var email = $(".email").val();
    var phone = $(".phone").val();
    var address1 = $(".address1").val();
    var address2 = $(".address2").val();
    var country = $(".country").val();
    var city = $(".city").val();
    var state = $(".state").val();
    var zipcode = $(".zipcode").val();

    $(".razorpay-btn").click(function (e) {
        e.preventDefault();

        if (!fname) {
            fname_error = "First Name Required!";
            $("#fname_error").html("");
            $("#fname_error").html(fname_error);
        } else {
            fname_error = "";
            $("#fname_error").html("");
        }

        if (!lname) {
            lname_error = "Last Name Required!";
            $("#lname_error").html("");
            $("#lname_error").html(lname_error);
        } else {
            lname_error = "";
            $("#lname_error").html("");
        }

        if (!email) {
            email_error = "First Name Required!";
            $("#email_error").html("");
            $("#email_error").html(email_error);
        } else {
            email_error = "";
            $("#email_error").html("");
        }

        if (!phone) {
            phone_error = "First Name Required!";
            $("#phone_error").html("");
            $("#phone_error").html(phone_error);
        } else {
            phone_error = "";
            $("#phone_error").html("");
        }

        if (!address1) {
            address1_error = "First Name Required!";
            $("#address1_error").html("");
            $("#address1_error").html(address1_error);
        } else {
            address1_error = "";
            $("#address1_error").html("");
        }
        if (!address2) {
            address2_error = "First Name Required!";
            $("#address2_error").html("");
            $("#address2_error").html(address2_error);
        } else {
            address2_error = "";
            $("#address2_error").html("");
        }

        if (!country) {
            country_error = "First Name Required!";
            $("#country_error").html("");
            $("#country_error").html(country_error);
        } else {
            country_error = "";
            $("#country_error").html("");
        }

        if (!city) {
            city_error = "First Name Required!";
            $("#city_error").html("");
            $("#city_error").html(city_error);
        } else {
            city_error = "";
            $("#city_error").html("");
        }

        if (!state) {
            state_error = "First Name Required!";
            $("#state_error").html("");
            $("#state_error").html(state_error);
        } else {
            state_error = "";
            $("#state_error").html("");
        }

        if (!zipcode) {
            zipcode_error = "First Name Required!";
            $("#zipcode_error").html("");
            $("#zipcode_error").html(zipcode_error);
        } else {
            zipcode_error = "";
            $("#zipcode_error").html("");
        }

        if (
            fname_error != "" ||
            lname_error != "" ||
            phone_error != "" ||
            email_error != "" ||
            address1_error != "" ||
            address2_error != "" ||
            country_error != "" ||
            city_error != "" ||
            state_error != "" ||
            zipcode_error != ""
        ) {
            return false;
        }

        // else {
        //     var data = {
        //         fname: fname,
        //         lname: lname,
        //         email: email,
        //         phone: phone,
        //         address1: address1,
        //         address2: address2,
        //         country: country,
        //         city: city,
        //         state: state,
        //         zipcode: zipcode,
        //     };

        //     $.ajax({
        //         method: "POST",
        //         url: "/proceed-to-pay",
        //         data: data,
        //         success: function (response) {
        //             // alert(response.total_price);
        //         },
        //     });
        // }
    });

    paypal
        .Buttons({
            createOrder: function (data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                    purchase_units: [
                        {
                            amount: {
                                value: "{{ $total }}",
                            },
                        },
                    ],
                });
            },
            onApprove: function (data, actions) {
                // This function captures the funds from the transaction.
                return actions.order.capture().then(function (details) {
                    // This function shows a transaction success message to your buyer.
                    // alert('Transaction completed by ' + details.payer.name.given_name);

                    $.ajax({
                        method: "POST",
                        url: "/place-order",
                        data: {
                            fname: fname,
                            lname: lname,
                            email: email,
                            phone: phone,
                            address1: address1,
                            address2: address2,
                            country: country,
                            city: city,
                            state: state,
                            zipcode: zipcode,
                            payment_mode: "Paid by PayPal",
                            payment_id: details.id,
                        },
                        success: function (response) {
                            Swal.fire(response.status);
                            window.location.href = "/my-orders";
                        },
                    });
                });
            },
        })
        .render("#paypal-button-container");
});
