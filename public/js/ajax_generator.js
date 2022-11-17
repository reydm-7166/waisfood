$(document).ready(function(){
    // calback for adding ingredients
    let add_items = function (e) {
        e.preventDefault();
        let ingredient_add = $('#add').val();

        $('#form_container').prepend("<div id='field_container' class='d-flex flex-row mb-2'><input type='text' id=' class='btn btn-gray bg bg-warning fs-5' wire:model='"+  +"' value='" + ingredient_add + "'disabled size='1'><i id='close' class='fa-regular fa-circle-xmark fa-lg'></i></div>");

        $('#add').val("");
    }
    // $(document).on('keypress',function(e) {
    //     if(e.which == 13) {
    //         if( $('#add').val().length === 0 ) {
    //             return false;
    //         }
    //         add_items(e);
    //     }

    // });

    // $('#add_ingredient_form').click(function(e){
    //     if( $('#add').val().length === 0 ) {
    //         return false;
    //     }
    //     add_items(e);
    // });

    $(document).on('click', '#close', function(e){
        e.preventDefault();
        $(this).parent().remove();
    });

    $('#button_add').click(function(e){
        e.preventDefault();
    });
    // #recipe_list
    $(document).on('click', '#downvote, #upvote', function(e){
        $.get($(this).attr("href"), $(this).serialize(), function(response) {

            
        });
    });

});


