<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- 
        jquery
        bootstrap
        bootstrap 
    --}}

    @yield('less_import')
    @yield('javascript')
    <title>@yield('page title')</title>
    <style>
        * {
            box-sizing: border-box;
        }
    </style>
</head>
@yield('body')
</html>

    {{-- PANG POPUP NG MODAL TO --}}
@if($errors->any())
    <script>
        $(document).ready(function(){
            $('#create_post_modal').modal('show');
        });

        
    </script>
@endif

{{-- SA AJAX TONG SCRIPT NA TO --}}
<script>
    
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
                            $('input[type=text]#input_post_title').val(item.post_content);
                            $('textarea#post_content').val(item.post_content);
                        });
                    }
                });
            }
        });


    });
    
</script>