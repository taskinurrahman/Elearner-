///addcourse
$(function () {
    $("#form-addcourse").validate({
        errorElement: "em",
        errorClass: "invalid",
        validClass: "success",

        rules: {
            course_name: {
                required: true,
            },
            course_desc: {
                required: true,
            },
            course_author: {
                required: true,
            },
            course_duration: {
                required: true,
            },
            course_img: {
                required: true,
                accept: "image/jpg,image/jpeg,image/png,image/gif",
            }
        },
        messages: {
            course_name: {
                required: "This field is required",
            },
            course_desc: {
                required: "This field is required",
            },
            course_author: {
                required: "This field is required",
            },
            course_duration: {
                required: "This field is required",
            },
            course_img: {
                accept: "Only allowed jpg jpeg and png"
            },
        },
    });
    $("#form-updatecourse").validate({
        errorElement: "em",
        errorClass: "invalid",
        validClass: "success",

        rules: {
            course_name: {
                required: true,
            },
            course_desc: {
                required: true,
            },
            course_author: {
                required: true,
            },
            course_duration: {
                required: true,
            },
            course_img: {
                accept: "image/jpg,image/jpeg,image/png,image/gif",
            }
        },
        messages: {
            course_name: {
                required: "This field is required",
            },
            course_desc: {
                required: "This field is required",
            },
            course_author: {
                required: "This field is required",
            },
            course_duration: {
                required: "This field is required",
            },
            course_img: {
                accept: "Only allowed jpg jpeg and png"
            },
        },
    });

    $(".course-delete").click(function (e) {

        console.log('clicked')
        let obj = $(this);
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let id = $(this).data("id");
        $.ajax({
            url: "/admin/deletecourse",
            type: "POST",
            data: {
                'id': id,
            },
        })
            .done(function (data) {
                console.log(data);
                $(obj).closest("tr").remove();
            })
            .fail(function (err) {
                console.log(err);
            });
    });


    $(".user-delete").click(function (e) {
        console.log('clicked')
        let obj = $(this);
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let id = $(this).data("id");
        console.log(id);
        $.ajax({
            url: "/admin/deleteuser",
            type: "POST",
            data: {
                'id': id,
            },
        })
            .done(function (data) {
                $(obj).closest("tr").remove();
            })
            .fail(function (err) {
                console.log(err);
            });
    });

    setTimeout(function () {
        $("div.alert").remove();

    }, 2000);


    // $(document).on('click', '.pagination a', function(event){
    //     console.log('pagiantion clicked');
    //     event.preventDefault();
    //     var page = $(this).attr('href').split('page=')[1];
    //     fetch_data(page);
    // });
    //
    // function fetch_data(page)
    // {
    //     $.ajax({
    //         url:"/admin/fetch_data?page="+page,
    //         success:function(data)
    //         {
    //             console.log(data);
    //             $('#data-table').html(data);
    //         }
    //     });
    // }





});


