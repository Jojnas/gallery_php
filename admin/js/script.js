$(document).ready(function () {

    var user_href, user_href_splitted, user_id, image_src, image_src_splitted, image_name, photo_id;

    $(".modal_thumbnails").click(function () {


        $("#set_user_image").prop('disabled', false);

        user_href = $("#user-id").prop('href');
        user_href_splitted = user_href.split("=");
        user_id = user_href_splitted[user_href_splitted.length - 1];

        image_src = $(this).prop('src');
        image_src_splitted = image_src.split("/");
        image_name = image_src_splitted[image_src_splitted.length - 1];

        photo_id = $(this).attr("data");

        $.ajax({

            url: "includes/ajax_code.php",
            data: {photo_id: photo_id},
            type: "POST",
            success: function(data){
                if(!data.error){
                    $("#modal_sidebar").html(data);
                }
            }


        });


    });


    $("#set_user_image").click(function () {

        $.ajax({
            url: "includes/ajax_code.php",
            data: {
                image: image,
                id: id
            },
            type: "POST",
            success: function (data) {

                if (!data.error) {

                    $(".image_user_box a img").prop('src', data);
                }
            }

        });



    });

    /*edit photo sidebar*/

    $(".info-box-header").click(function(){

        $(".inside").slideToggle("slow");

        $("#toggle").toggleClass("glyphicon-menu-down glyphicon , glyphicon-menu-up glyphicon");
    });

    /*delete item*/

    $(".delete_link").click(function(){

        return confirm("Pretty sure?");

    });


    tinymce.init({selector: 'textarea'});


});



