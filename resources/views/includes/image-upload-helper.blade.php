<script>
    $(document).ready(function() {
        //Chose image
        $(".image-chose-btn").click(function (){
            $(this).parent().find('.image-importer').click();
        })
        //Display image
        $(".image-importer").change(function (event){
            if(event.target.files.length > 0) {
                $(this).parent().parent().find('.image-display').attr("src",URL.createObjectURL(event.target.files[0]));
            }
        })
        //Reset image
        $(".image-reset-btn").click(function (){
            $(this).parent().parent().find('.image-display').attr("src",$(this).val());
            $(this).parent().find('.image-importer').val('');
        })
        //upload image
        /*
        function loadLessImageUploader(submitButton, submissionUrl){
            var formData = new FormData();
            formData.append('type', $(this).val())
            formData.append($(this).val(), $(this).parent().parent().find('.image-importer')[0].files[0])
            var this_button = $(this);
            $.ajax({
                method: 'POST',
                url: submissionUrl,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function (){
                    this_button.prop("disabled", true)
                },
                complete: function (){
                    this_button.prop("disabled", false)
                },
                success: function (response_data) {
                    if (response_data.type == 'success'){
                        this_button.parent().parent().find('.image-display').attr("src",'{{ url('/') }}/'+response_data.image_src);
                        this_button.parent().find('.image-reset-btn').val('{{ url('/') }}/'+response_data.image_src);
                        this_button.parent().find('.image-importer').val('');
                        Swal.fire({
                            position: 'top-end',
                            icon: response_data.type,
                            title: response_data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }else{
                        Swal.fire({
                            icon: response_data.type,
                            title: 'Oops...',
                            text: response_data.message,
                        })
                    }
                },
                error: function (xhr) {
                    var errorMessage = '<div class="card bg-danger">\n' +
                        '                        <div class="card-body text-center p-5">\n' +
                        '                            <span class="text-white">';
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        errorMessage +=(''+value+'<br>');
                    });
                    errorMessage +='</span>\n' +
                        '                        </div>\n' +
                        '                    </div>';
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        footer: errorMessage
                    })
                },
            })
        }
        */
    });
</script>
