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

    $(document).on('click', '.save', function(e){
        let id = $(this).attr("id");

        //alert($(this).attr("href"));
        $.get( $('#' + id).attr("href"), $(this).serialize(), function(response) {
            if(response.message == true)
            {
                $("#" +id).text("Unsave Post");
                alert("Post SAVED");
            }
            else
            {
                $("#" +id).text("Save Post");
                alert("REMOVED FROM SAVED");
            }
            //
        });
        return false; //to prevent the browser going to the form's action url
     });
});



