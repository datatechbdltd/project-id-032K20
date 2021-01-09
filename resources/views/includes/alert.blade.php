<!--
#still_alert
#validation message show using bootstrap and jquery
#Param 1. type 2. message
 need to use this div
<div class="alert-display">
</div>
-->
<script>
    function still_alert(type, message, place){
        $('.'+place).html('' +
            '\n' +
            '<div class="alert alert-custom alert-notice alert-light-'+type+' fade show" role="alert">\n' +
            '    <div class="alert-icon"><i class="flaticon-'+type+'"></i></div>\n' +
            '    <div class="alert-text">'+message+'</div>\n' +
            '    <div class="alert-close">\n' +
            '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
            '            <span aria-hidden="true"><i class="ki ki-close"></i></span>\n' +
            '        </button>\n' +
            '    </div>\n' +
            '</div>'+
            '')
    }

    function frontend_alert(type, message, place){
        $('.'+place).html(' <div class="alert alert-'+type+'" role="alert">\n' + message +' </div>')
    }
</script>

<!--
#show session message
#Param 1. type 2. message
-->
@if(session()->has('message'))
    <div class="alert alert-{{session('type')}}">
        {!! session('message') !!}
    </div>
@endif
<!--
#show error message
-->
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif


