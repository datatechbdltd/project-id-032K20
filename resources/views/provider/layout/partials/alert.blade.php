@if(check_provider_approval(auth()->user()->id))
    <div class="alert alert-success text-center" role="alert">
        This account not activated. <a href="#" class="alert-link">Click here</a> to see the administrative note.
    </div>
@else
    <div class="alert alert-danger text-center" role="alert">
        This account is not activated. <a href="#" class="alert-link">Click here</a> to see the administrative note.
    </div>
@endif
