$(document).ready(function(){
    //load comments once the post page is loaded
        let post_id = $('#post_id').val();
        $.ajax({
            type: "get",
            url: "/comment-onload/"+post_id,
            dataType: "JSON",
            success: function (response) {
                
                //loop to display all comments -> sort by latest first at top
                $.each(response.comment_data, function (key, item) { 
                    $('#comment_section').prepend('\
                    <div id="individual_comment_container" class="border border-dark mt-2">\
                        <br><p>'+ item.id +' This is the comment id</p>\
                        <br><p>'+ item.user_id +' This is the user id of the comment owner</p>\
                        <br><p>'+ item.comment_content +' <i>This is the comment content<i/></p>\
                        <br><p>'+ item.created_at +' <i>This is the comment content<i/></p>\
                        <br><p>'+ item.updated_at +' <i>This is the comment content<i/></p>\
                    </div>');
        
                });
            }
        });
    //////////////// AJAX FOR UPVOTE //////////////////
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
            //////////////// AJAX FOR DOWNVOTE //////////////////
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

    $("#add_comment_form").on("submit", function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //first param -> form route and action (post-get)
        //second param -> serialize the form
        //third param -> the server response
        $.post( $(this).attr("action"), $(this).serialize(), function(response) {
            //if successfully inserted the comment
            if(response.status == 200) {
                $('#add_comment_form')[0].reset();
                $.each(response.comment_data, function (key, item) { 
                
                    $('#comment_section').prepend('\
                    <div id="individual_comment_container" class="border border-dark mt-2">\
                        <br><p>'+ item.comment_id +' This is the comment id</p>\
                        <br><p>'+ item.user_id +' This is the user id of the comment owner</p>\
                        <br><p>'+ item.comment_content +' <i>This is the comment content<i/></p>\
                        <br><p>'+ item.created_at +' <i>This is the comment content<i/></p>\
                        <br><p>'+ item.updated_at +' <i>This is the comment content<i/></p>\
                    </div>'); 
                    });
                if($('#error_message').length)
                {
                    $('#error_message').remove();
                }
            }
            //if comment fails (empty comment)
            if(response.status == 400) {
                $('#add_comment').addClass("form-error");
                if(!$('#error_message').length)
                {
                    $('#reply').after('<small class="form-text d-block text-danger fw-bold" id="error_message">'+ response.errors.add_comment[0] +'</small>')
                }  
             }

        });
        
        return false; //to prevent the browser going to the form's action url
     });


     $(document).on('click', '#save_post', function(e){
       // alert($(this).attr("href"));
        $.get( $(this).attr("href"), $(this).serialize(), function(response) {
            if(response.message == true){
                $('#save_post').text("Unsave Post");
                alert("SAVED");
                
            }
            else 
            {
                $('#save_post').text("Save Post");
                alert("REMOVED FROM SAVED");
                
            }
            //
        });
        return false; //to prevent the browser going to the form's action url
     });
});
