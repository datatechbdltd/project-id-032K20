//one-way-search-origin
$( "#one-way-search-origin" ).autocomplete({
    source: function(request, response) {
        console.log(request.term);
        var formData = new FormData();
        formData.append('address', request.term)
        $.ajax({
            method: 'POST',
            url: "api/airport-search",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: formData,
            processData: false,
            contentType: false,
            success:function(data){
                var json_data = $.parseJSON(data);
                //console.log(json.data)
                var array = $.map(json_data.data,function(obj){
                    return{
                        value: obj.address['cityName'], //Filable in input field
                        label: obj.address['cityName'],  //Show as label of input field
                        phone: obj.address['cityName']
                    }
                })
                response($.ui.autocomplete.filter(array, request.term));
            },
            error: function (xhr) {
                Swal.fire({
                    title: 'Expire access code !',
                    text: "Please reload this page for generate a new access code.",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#deaa40',
                    cancelButtonColor: '#0fcaca',
                    confirmButtonText: 'Yes, reload it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Thank you!',
                            'New access code generation completed.',
                            'success'
                        )
                    }
                    location.reload();
                })
            },
        })
    }
});
//one-way-search-destination
$( "#one-way-search-destination" ).autocomplete({
    source: function(request, response) {
        console.log(request.term);
        var formData = new FormData();
        formData.append('address', request.term)
        $.ajax({
            method: 'POST',
            url: "api/airport-search",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: formData,
            processData: false,
            contentType: false,
            success:function(data){
                var json_data = $.parseJSON(data);
                //console.log(json.data)
                var array = $.map(json_data.data,function(obj){
                    return{
                        value: obj.address['cityName'], //Filable in input field
                        label: obj.address['cityName'],  //Show as label of input field
                        phone: obj.address['cityName']
                    }
                })
                response($.ui.autocomplete.filter(array, request.term));
            },
            error: function (xhr) {
                Swal.fire({
                    title: 'Expire access code !',
                    text: "Please reload this page for generate a new access code.",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#deaa40',
                    cancelButtonColor: '#0fcaca',
                    confirmButtonText: 'Yes, reload it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Thank you!',
                            'New access code generation completed.',
                            'success'
                        )
                    }
                    location.reload();
                })
            },
        })
    }
});
