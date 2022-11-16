$(document).ready(function(){
    // calback for adding ingredients
    let add_items = function (e) {
        e.preventDefault();
        let ingredient_add = $('#add').val();

        $('#form_container').prepend("<div id='field_container' class='d-flex flex-row mb-2'><input type='text' name='ingredients[]' id=' class='btn btn-gray bg bg-warning fs-5' value='" + ingredient_add + "'disabled size='1'><i id='close' class='fa-regular fa-circle-xmark fa-lg'></i></div>");

        $('#add').val("");
    }
    $(document).on('keypress',function(e) {
        if(e.which == 13) {
            if( $('#add').val().length === 0 ) {
                alert("Input cannot be empty");
                return false;
            }
            add_items(e);
        }

    });

    $('#add_ingredient_form').click(function(e){
        if( $('#add').val().length === 0 ) {
            alert("Input cannot be empty");
            return false;
        }
        add_items(e);
    });

    $(document).on('click', '#close', function(e){
        e.preventDefault();
        $(this).parent().remove();
    });

    $('#button_add').click(function(e){
        e.preventDefault();
    });
    // #recipe_list



    // $(document).on('click', '#save_post', function(){

    //     $.get( $(this).attr("href"), $(this).serialize(), function(response) {
    //         if(response.message == true){
    //             $('#save_post').text("Unsave Post");
    //             alert("SAVED");
                
    //         }
    //         //
    //     });
    //     return false; //to prevent the browser going to the form's action url
    //  });
});




// $(wrapper).on('click', '.remove_button', function(e){
//     e.preventDefault();
//     $(this).parent('div').remove(); //Remove field html
//     x--; //Decrement field counter
// });