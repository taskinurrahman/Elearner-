//validate user signup
$(function () {
    $("#signup-form").validate({
        errorElement: "em",
        errorClass: "invalid",
        validClass: "success",
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },

            password: {
                required: true,
                minlength: 6,
            },
            password_confirm: {
                equalTo: "#password",
            }
        },

        messages: {
            name: {
                required: "This field is required",
            },
            email: {
                required: "This field is required",
                email: "Invalid Email Address.",
            },
            password: {
                required: "This field is required",
                minlength: "Minimum 6 character"
            },
            confirm_password: "Password does not match",

        },

    });

    $(function () {
        $("#form-login").validate({
            errorElement: "em",
            errorClass: "invalid",
            validClass: "success",
            rules: {
                email: {
                    required: true,
                    email: true,
                },

                password: {
                    required: true,
                    minlength: 6,
                },
            },
            messages: {

                email: {
                    required: "This field is required",
                    email: "Invalid Email Address.",
                },
                password: {
                    required: "This field is required",
                    minlength: "Minimum 6 character"
                }

            },


        });

    });
    $("#user-profile").validate({
        errorElement: "em",
        errorClass: "invalid",
        validClass: "success",
        rules: {
            user_name: {
                required: true,
            },
            password: {
                required: true,
                minlength: 6,
            },
            confirm_password: {
                equalTo: "#password",
            }
        },

        messages: {
            user_name: {
                required: "This field is required",
            },
            password: {
                required: "This field is required",
                minlength: "Minimum 6 character"
            },
            confirm_password: "Password does not match",
        },

    });

    setTimeout(function () {
        $("div.alert").remove();

    }, 5000)

    $(".enroll-btn").on("click", function (e) {
        console.log("enroll button clicked");
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var $id = $(this).data("id");
        let btn = $(this);

        console.log($id);
        $.ajax({
            url: "/enroll",
            method: "POST",
            data: {
                id: $id,
            },
            success: function (data) {
                console.log(data);
                btn.text("Enrolled");
                btn.prop("disabled",true);
            },
        });
    });
});

