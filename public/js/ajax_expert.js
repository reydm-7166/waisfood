$(document).ready(function(){

    $("input#search_input").on("input", function(){
        // Print entered value in a div box
        $("#result").text($(this).val());
        $("div.ajax").remove();
    });

    $("#form_submit").on("submit", function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        let nothing = "No Ratings";

        function roundUp(num, precision) {
            precision = Math.pow(10, precision)
            return Math.ceil(num * precision) / precision
          }

        //first param -> form route and action (post-get)
        //second param -> serialize the form
        //third param -> the server response
        $.post( $(this).attr("action"), $(this).serialize(), function(response) {
            //if 
            if(response.status == 200) {
                console.log(response.recipes);
                $('#recipe_list').html("");
                $('#pagination').html("");
                // $('#recipe_list').append(0.item.recipe_name);
                $.each(response.recipes, function (key, item) { 
                    (item.average_rating === null) ? item.average_rating = nothing : item.average_rating = roundUp(item.average_rating, 1) + " Stars";
                    
                    $('#recipe_list').append('\
                    <div id="recipe_item" class="m-2 d-flex flex-column text-center shadow ajax">\
                        <div id="title_container" class="d-flex align-items-center justify-content-center">\
                            <p class="text-break font" id="recipe_name">'+ item.recipe_name +'</p>\
                        </div>\
                        <img src="" alt="" class="img-recipe">\
                        <div id="count-star" class="mt-2 d-flex justify-content-between align-items-center">\
                            <p class="text-break font" id="ingredient_count">'+ item.ingredient_count +' Ingredients</p>\
                            <p class="stars font" id="averate_rating">'+ item.average_rating +'</p>\
                        </div>\
                        <a id="recipe_id" href="" class="text-decoration-none btn btn-primary mt-2 text-white font">View</a></button>\
                    </div>');
                });

            }
            //if comment fails (empty comment)
        });
        
        return false; //to prevent the browser going to the form's action url
     });

});