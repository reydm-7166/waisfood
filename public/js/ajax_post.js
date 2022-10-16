$(document).ready(function(){
    //load comments once the post page is loaded
        let post_id = $('#post_id').val();

        $.ajax({
            type: "get",
            url: "/comment-onload/"+post_id,
            dataType: "JSON",
            success: function (response) {
                
                //loop to display all comments -> sort by latest first at top
                console.log(response.comment_data);
                $.each(response.comment_data, function (key, item) { 
                    $('#comment_section').prepend('\
                    <div id="individual_comment_container" class="border border-dark mt-2">\
                        <br><p>'+ item.id +' This is the comment id</p>\
                        <br><p>'+ item.user_id +' This is the user id of the comment owner</p>\
                        <br><p>'+ item.comment_content +' <i>This is the comment content<i/></p>\
                    </div>');
        
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
                $('#comment_section').html("");
            $.each(response.comment_data, function (key, item) { 
                
                $('#comment_section').prepend('\
                <div id="individual_comment_container" class="border border-dark mt-2">\
                    <br><p>'+ item.comment_id +' This is the comment id</p>\
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
