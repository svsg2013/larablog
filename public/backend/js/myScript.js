$(document).ready(function(){
    $('.fadeout').delay(3600).fadeOut();
});

// create more image on click add button
$("#addMoreImage").click(function(){
    $('#imageBlock').append(
        '<div id="imageField">'+
        '<button type="button" class="removeQuatationBtn btn btn-custom"><i class="fa fa-close"></i></button>'+
        '<input name="prodImages[]" id="product_more_image_path" type="file">'+
        '</div>'
    );
});
$("#imageBlock").on("click", ".removeQuatationBtn", function (e) {
    //alert('ok');
    $(this).parents("#imageField").remove();
    no--;
});