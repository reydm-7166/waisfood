<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Wais Food</title>
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://kit.fontawesome.com/4dc2abe180.js" crossorigin="anonymous"></script> 
        {{-- jquery --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        {{-- sweetalert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.13/dist/sweetalert2.all.min.js" integrity="sha256-TBwuVto41E6J99u3aYEC1Ow9xioSgoQJG05j79iQzro=" crossorigin="anonymous"></script>

        @vite('resources/css/app.css')
        <livewire:styles />

    </head>

    <body class="antialiased">
        {{
            $slot
        }}
        <livewire:scripts />
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </body>
    {{-- SA AJAX TONG SCRIPT NA TO {{ for checking upvote // downvote}} --}}
    <script src="{{ asset('js/ajax_home.js') }}" type="text/javascript"></script>

    {{-- add ingredient button --}}
    <script type="text/javascript">
        $(document).ready(() => {
            $(document).one('click submit', 'button[type=submit], input[type=submit]', (e) => {
              
            });
            $("#addIngredient").on('click', (e) => {
                let obj = $(e.currentTarget);
                let index = parseInt(obj.attr('data-index'));
                let target =  $(obj.attr('data-target'));
                let toClone = $(obj.attr('data-to-clone'));
                // Clone the field and remove the id to prevent mishaps.
                let clone = toClone.clone().removeAttr("id");
                // Clean the input field.
                clone.find('input, textarea').val("");
                // Increment the "for" and "id" attributes, label number, then lastly, update the "data-index"
                let forField = $(`#${clone.find('label').attr("for")}`);
                let newFieldId = forField.attr("id").substr(0, forField.attr("id").lastIndexOf("_") + 1) + index;
                clone.find('label').attr("for", newFieldId);
                clone.find(`input#${forField.attr("id")}, textarea#${forField.attr("id")}`).attr("id", newFieldId);
                clone.find('label').text(clone.find('label').text().substr(0, clone.find('label').text().lastIndexOf("#") + 1) + (index + 1));
                obj.attr('data-index', ++index);
                // Append the cloned element to the target.
                target.append(clone);
            });
        });
    </script>

    
    
    {{-- eto para sa expandable/responsive textarea (sa may livewire/feedbacks) --}}
    <script>
        window.addEventListener('show-delete-dialog', event => {
            Swal.fire({
            title: 'Do you want to delete?',
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Delete'
            }).then((result) => {
            if (result.isConfirmed) {
                    window.livewire.emit('delete_confirmed')
                }   
            })
        });
    
        window.addEventListener('success', event => {
            Swal.fire({
                icon: 'success',
                title: `Deleted Successfully!`,
                iconColor: 'white',
                background: `#d33`,
                position: `top`,
                showConfirmButton: false,
                timer: 5000,
                toast: true,
                customClass: {
                    title: 'text-white',
                },
            });
        });
    
        window.addEventListener('close-modal-then-success', event => {
    
            $('#close_modal').trigger('click');
    
            Swal.fire({
                icon: 'success',
                title: `Updated Successfully!`,
                iconColor: 'white',
                background: `#a5dc86`,
                position: `top-right`,
                showConfirmButton: false,
                timer: 5000,
                toast: true,
                customClass: {
                    title: 'text-white',
                },
            });
        });
    
    </script>
    
    <script>
        $(document).ready(function(){
    
        $("input#search_input").on("input", function(){
            // Print entered value in a div box
            $("div.ajax").remove();
        });

        $("#form_submit").on("submit", function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //clears the search input box
            $("input#search_input").val('');
            //for message
            let nothing = "No Ratings";
            //rounding up of rating to 2 decimal places
            function roundUp(num, precision) {
                precision = Math.pow(10, precision)
                return Math.ceil(num * precision) / precision
            }
            //first param -> form route and action (post-get)
            //second param -> serialize the form
            //third param -> the server response
            $.post( $(this).attr("action"), $(this).serialize(), function(response) {
                //if success (message is true: that means it worked)
    
                if(response.message) {
                    
                    Swal.fire({
                        icon: 'success',
                        title: `Success`,
                        iconColor: 'white',
                        html: `<p class="text-white font mx-auto swal-text">${response.details}</p>`,
                        background: `#a5dc86`,
                        position: `top`,
                        showConfirmButton: false,
                        timer: 5000,
                        toast: true,
                        customClass: {
                            title: 'text-white',
                        },
    
                    });
    
                    $('#recipe_list').html("");
                    $('#pagination').html("");
                    $('#no_result').html("");
    
                    console.log(response.recipes);
                    $.each(response.recipes, function (key, item) { 
                        (item.average_rating === null) ? item.average_rating = nothing : item.average_rating = roundUp(item.average_rating, 1) + " Stars";
    
                        //this is for the route link
                        let recipe_link = '{{route("recipe.show", [":name", ":id"])}}';
                        recipe_link = recipe_link.replace(':name', item.recipe_name);
                        recipe_link = recipe_link.replace(':id', item.id);

                        recipe_image = '{{ asset('img/recipe-images/') }}' + '/' + item.image_file;

                        // alert(recipe_image);
    
    
                        $('#recipe_list').append('<div class="m-[5px] rounded-[20px] p-[15px] bg-[white]">\
                                <div class="fav-food w-[auto] flex flex-col justify-center items-center">\
                                    <div class="p-[5px] pb-[10px] text-center min-h-100">\
                                        <p class="food-title font-bold text-[15px]">'+ item.recipe_name +'</p>\
                                    </div>\
                                    <img class="w-[auto] mb-[5px]" src="'+ recipe_image +'" alt="food">\
                                    <div id="rate_ingredients" class="flex justify-between w-full">\
                                        <p class="time text-[15px] text-[gray]">'+ item.ingredient_count +' Ingredients</p>\
                                        <p class="time text-[15px] text-[gray]">'+ item.average_rating +'</p>\
                                    </div>\
                                    <button class="w-full h-9 px-6 text-white transition-colors mt-[10px] duration-150 bg-[#f6941c] rounded-lg focus:shadow-outline hover:bg-[#f6941c]-800 hover:shadow-2xl">\
                                        <a id="recipe_id" href="'+ recipe_link +'">View</a>\
                                    </button>\
                                </div>\
                            </div>\
                        ');
                    });
                }
                else 
                {
                    Swal.fire({
                        icon: 'error',
                        title: `Nothing Found`,
                        iconColor: 'white',
                        html: `<p class="text-white font mx-auto swal-text">${response.details}</p>`,
                        background: `#f27474`,
                        position: `top`,
                        timer: 5000,
                        showConfirmButton: false,
                        toast: true,
                        customClass: {
                            title: 'text-white',
                        },
    
                        });
    
                    $('#recipe_list').html("");
                    $('#pagination').html("");
    
                   $('#recipe_list').append('\
                    <div id="no_result" class="d-flex justify-content-center flex-wrap">\
                        <h2 class="mt-5 font fs-1 text-danger">NO RESULTS FOUND</h2>\
                    </div>\
                   ')
                }
                //if comment fails (empty comment)
            });
            
            return false; //to prevent the browser going to the form's action url
        });
    
        });   
    </script>
    
            
    @if (isset($liked_posts[0]) && $liked_posts[0]->like == 1)
        <script type="text/javascript">
            $(document).ready(function(){
                $('#upvote').addClass("bg bg-primary");
                $('#downvote').removeClass("bg bg-danger")
            });
        </script>
    @elseif(isset($liked_posts[0]) && $liked_posts[0]->like == -1)
        <script type="text/javascript">
            $(document).ready(function(){
                    $('#upvote').removeClass("bg bg-primary");
                    $('#downvote').addClass("bg bg-danger")
                });
        </script>
    @endif
    
</html>