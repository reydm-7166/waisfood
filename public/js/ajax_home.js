$(document).ready(function(){

    $('.edit-cancel').click(function(){
        $('#edit_post_modal').hide();
    })

    $(document).on('click', '#edit_post', function(){
        var id = $(this).val();

        // $('#staticBackdropLabel').text("Edit Post");

        edit_modal(id);

        function edit_modal(id) {
            $('#edit_post_modal').show();

            $('#edit_post_modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
            });


            $.ajax({
                type: "get",
                url: "/edit-data/"+id,
                dataType: "json",
                success: function (response) {
                    $.each(response.post_data, function (key, item) { 
                        $('input#post_id').val((item.id).toString());
                        $('input[type=text]#input_post_title').val(item.post_content);
                        $('textarea#post_content').val(item.post_content);
                        
                    });
                }
            });
        }
    });

    $(document).on('click', '#upvote', function(e){
        e.preventDefault();
        let post_id = $('#post_id').val();


        upvote(post_id);

        function upvote(post_id) {

            $.ajax({
                type: "get",
                url: "/post/"+post_id,
                dataType: "json",
                success: function (response) {
                        $('#like_count').html(response.post_data);
                        //console.log(response);
                        
                    }
                });
            }
        });
    $(document).on('click', '#downvote', function(e){
        e.preventDefault();
        let post_id = $('#post_id').val();


        downvote(post_id);

        function downvote(post_id) {

            $.ajax({
                type: "get",
                url: "/postd/"+post_id,
                dataType: "json",
                success: function (response) {
                        $('#like_count').html(response.post_data);
                        
                    }
                });
            }
        });

//////////////// AJAX FOR COMMENT //////////////////
    
    $('#add_comment_form').on('submit', function(e){
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: "/comment",
            data: $(this).serialize(),
            dataType: "JSON",
            success: function (response) {
                $('#add_comment').removeClass("form-error").val("");
                
                //loop to display all comments

               $.each(response.post_data, function (key, item) { 
                $('#comment_section').append('\
                <div id="individual_comment_container" class="border border-dark mt-2">\
                    <br><p>'+ item.id +' This is the comment id</p>\
                    <br><p>'+ item.user_id +' This is the user id of the comment owner</p>\
                    <br><p>'+ item.comment_content +' <i>This is the comment content<i/></p>\
                </div>');
                   
                    
                });

            if($('#error_message').length)
            {
                $('#error_message').remove();
            } 
            //alert("NO EROR");   
            },
            error: function(response){
                //alert((response.responseJSON.errors.add_comment[0]));
                $('#add_comment').addClass("form-error");
                if(!$('#error_message').length)
                {
                    $('#reply').after('<small class="form-text d-block text-danger fw-bold" id="error_message">'+ response.responseJSON.errors.add_comment[0] +'</small>')
                }  
            }
        });
    
    });



});



