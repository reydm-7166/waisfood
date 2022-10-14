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
    





});



