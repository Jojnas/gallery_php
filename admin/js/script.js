
$(document).ready(function(){

$(".modal_thumbnails").click(function(){

    var user_href, user_href_splitted, user_id, image_src, image_src_splitted, image_id;

    $("#set_user_image").prop('disabled', false);

    user_href = $("#user-id").prop('href');
    user_href_splitted = user_href.split("=");
    user_id = user_href_splitted[user_href_splitted.length - 1];

    image_src = $(this).prop('src');
    image_src_splitted = image_src.split("/");
    image_id = image_src_splitted[image_src_splitted.length - 1];

    alert(image_id);



});

    tinymce.init({selector:'textarea'});


});



