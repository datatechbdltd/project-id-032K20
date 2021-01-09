<div class="section-tab section-tab-2 pb-3">
    <ul class="nav nav-tabs" id="myTab3" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="one-way-tab" data-toggle="tab" href="#one-way" role="tab" aria-controls="one-way" aria-selected="true">
                {{ __('One way') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="round-trip-tab" data-toggle="tab" href="#round-trip" role="tab" aria-controls="round-trip" aria-selected="false">
                {{ __('Round-trip') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="multi-city-tab" data-toggle="tab" href="#multi-city" role="tab" aria-controls="multi-city" aria-selected="false">
                {{ __('Multi-city') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="um-rah-tab" data-toggle="tab" href="#um-rah" role="tab" aria-controls="multi-city" aria-selected="false">
                {{ __('Um-rah') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="group-ticket-tab" data-toggle="tab" href="#group-ticket" role="tab" aria-controls="multi-city" aria-selected="false">
                {{ __('Group Ticket') }}
            </a>
        </li>
    </ul>
</div><!-- end section-tab -->
<div class="tab-content" id="myTabContent3">
    <div class="tab-pane fade show active" id="one-way" role="tabpanel" aria-labelledby="one-way-tab">
        <div class="contact-form-action">
            <form action="#" class="row align-items-center">
                <div class="col-lg-6 pr-0">
                    <div class="input-box">
                        <label class="label-text">{{ __('Flying from') }}</label>
                        <div class="form-group">
                            <span class="la la-map-marker form-icon"></span>
                            <input class="form-control" type="text" id="one-way-search-origin" placeholder="City or airport">
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-6">
                    <div class="input-box">
                        <label class="label-text">{{ __('Flying to') }}</label>
                        <div class="form-group">
                            <span class="la la-map-marker form-icon"></span>
                            <input class="form-control" type="text" id="one-way-search-destination" placeholder="City or airport">
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 pr-0">
                    <div class="input-box">
                        <label class="label-text">{{ __('Departing') }}</label>
                        <div class="form-group">
                            <span class="la la-calendar form-icon"></span>
                            <input class="date-range form-control" type="text" name="daterange-single" value="04/28/2020">
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 pr-0">
                    <div class="input-box">
                        <label class="label-text">{{ __('Passengers') }}</label>
                        <div class="form-group">
                            <div class="dropdown dropdown-contain">
                                <a class="dropdown-toggle dropdown-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <span>{{ __('Passengers') }} <span class="qtyTotal guestTotal_2">0</span></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-wrap">
                                    <div class="dropdown-item">
                                        <div class="qty-box d-flex align-items-center justify-content-between">
                                            <label>{{ __('Adults') }}</label>
                                            <div class="qtyBtn d-flex align-items-center">
                                                <input type="text" name="qtyInput" value="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="qty-box d-flex align-items-center justify-content-between">
                                            <label>{{ __('Children') }}</label>
                                            <div class="qtyBtn d-flex align-items-center">
                                                <input type="text" name="qtyInput" value="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="qty-box d-flex align-items-center justify-content-between">
                                            <label>{{ __('Infants') }}</label>
                                            <div class="qtyBtn d-flex align-items-center">
                                                <input type="text" name="qtyInput" value="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end dropdown -->
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 pr-0">
                    <div class="input-box">
                        <label class="label-text">{{ __('Coach') }}</label>
                        <div class="form-group select-contain w-auto">
                            <select class="select-contain-select">
                                <option value="1" selected>{{ __('Economy') }}</option>
                                <option value="2">{{ __('Business') }}</option>
                                <option value="3">{{ __('First class') }}</option>
                            </select>
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3">
                    <a href="#" class="theme-btn w-100 text-center margin-top-20px">{{ __('Search Now') }}</a>
                </div>
            </form>
        </div>
    </div><!-- end tab-pane -->
    <div class="tab-pane fade" id="round-trip" role="tabpanel" aria-labelledby="round-trip-tab">
        <div class="contact-form-action">
            <form action="#" class="row align-items-center">
                <div class="col-lg-6 pr-0">
                    <div class="input-box">
                        <label class="label-text">{{ __('Flying from') }}</label>
                        <div class="form-group">
                            <span class="la la-map-marker form-icon"></span>
                            <input class="form-control" type="text" placeholder="City or airport">
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-6">
                    <div class="input-box">
                        <label class="label-text">{{ __('Flying to') }}</label>
                        <div class="form-group">
                            <span class="la la-map-marker form-icon"></span>
                            <input class="form-control" type="text" placeholder="City or airport">
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 pr-0">
                    <div class="input-box">
                        <label class="label-text">{{ __('Departing - Returning') }}</label>
                        <div class="form-group">
                            <span class="la la-calendar form-icon"></span>
                            <input class="date-range form-control" type="text" name="daterange" value="04/28/2020">
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 pr-0">
                    <div class="input-box">
                        <label class="label-text">{{ __('Passengers') }}</label>
                        <div class="form-group">
                            <div class="dropdown dropdown-contain">
                                <a class="dropdown-toggle dropdown-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    <span>{{ __('Passengers') }} <span class="qtyTotal guestTotal_3">0</span></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-wrap">
                                    <div class="dropdown-item">
                                        <div class="qty-box d-flex align-items-center justify-content-between">
                                            <label>{{ __('Adults') }}</label>
                                            <div class="qtyBtn d-flex align-items-center">
                                                <input type="text" name="qtyInput" value="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="qty-box d-flex align-items-center justify-content-between">
                                            <label>{{ __('Children') }}</label>
                                            <div class="qtyBtn d-flex align-items-center">
                                                <input type="text" name="qtyInput" value="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dropdown-item">
                                        <div class="qty-box d-flex align-items-center justify-content-between">
                                            <label>{{ __('Infants') }}</label>
                                            <div class="qtyBtn d-flex align-items-center">
                                                <input type="text" name="qtyInput" value="0">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end dropdown -->
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3 pr-0">
                    <div class="input-box">
                        <label class="label-text">{{ __('Coach') }}</label>
                        <div class="form-group">
                            <div class="select-contain w-auto">
                                <select class="select-contain-select">
                                    <option value="1" selected>{{ __('Economy') }}</option>
                                    <option value="2">{{ __('Business') }}</option>
                                    <option value="3">{{ __('First class') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-3">
                    <a href="#" class="theme-btn w-100 text-center margin-top-20px">{{ __('Search Now') }}</a>
                </div>
            </form>
        </div>
        <div class="advanced-wrap">
            <a class="btn collapse-btn theme-btn-hover-gray font-size-15" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">
                {{ __('Advanced options') }} <i class="la la-angle-down ml-1"></i>
            </a>
            <div class="collapse pt-3" id="collapseThree">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="input-box">
                            <label class="label-text">{{ __('Preferred airline') }}</label>
                            <div class="form-group">
                                <div class="select-contain w-100">
                                    <select class="select-contain-select">
                                        <option selected="selected" value=""> {{ __('No preference') }}</option>
                                        <option value="AN">Advanced Air</option>
                                        <option value="A3">Aegean</option>
                                        <option value="EI">Aer Lingus</option>
                                        <option value="5G">Aerocuahonte / Mayair</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end advanced-wrap -->
    </div><!-- end tab-pane -->
    <div class="tab-pane fade multi-flight-wrap" id="multi-city" role="tabpanel" aria-labelledby="multi-city-tab">
        <div class="contact-form-action multi-flight-field d-flex align-items-center">
            <form action="#" class="row flex-grow-1 align-items-center">
                <div class="col-lg-4 pr-0">
                    <div class="input-box">
                        <label class="label-text">{{ __('Flying from') }}</label>
                        <div class="form-group">
                            <span class="la la-map-marker form-icon"></span>
                            <input class="form-control" type="text" placeholder="City or airport">
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-4 pr-0">
                    <div class="input-box">
                        <label class="label-text">{{ __('Flying to') }}</label>
                        <div class="form-group">
                            <span class="la la-map-marker form-icon"></span>
                            <input class="form-control" type="text" placeholder="City or airport">
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-4">
                    <div class="input-box">
                        <label class="label-text">{{ __('Departing') }}</label>
                        <div class="form-group">
                            <span class="la la-calendar form-icon"></span>
                            <input class="date-range form-control date-multi-picker" type="text" name="daterange-single" value="04/28/2020">
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
            </form>
            <div class="multi-flight-delete-wrap pt-3 pl-3">
                <button class="multi-flight-remove" type="button"><i class="la la-remove"></i></button>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-3 pr-0">
                <div class="form-group">
                    <button class="theme-btn add-flight-btn margin-top-40px w-100" type="button"><i class="la la-plus mr-1"></i>{{ __('Add another flight') }}</button>
                </div>
            </div>
            <div class="col-lg-3 pr-0">
                <div class="input-box">
                    <label class="label-text">{{ __('Passengers') }}</label>
                    <div class="form-group">
                        <div class="dropdown dropdown-contain">
                            <a class="dropdown-toggle dropdown-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                <span>{{ __('Passengers') }} <span class="qtyTotal guestTotal_4">0</span></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-wrap">
                                <div class="dropdown-item">
                                    <div class="qty-box d-flex align-items-center justify-content-between">
                                        <label>{{ __('Adults') }}</label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <input type="text" name="qtyInput" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="qty-box d-flex align-items-center justify-content-between">
                                        <label>{{ __('Children') }}</label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <input type="text" name="qtyInput" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="qty-box d-flex align-items-center justify-content-between">
                                        <label>{{ __('Infants') }}</label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <input type="text" name="qtyInput" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end dropdown -->
                    </div>
                </div>
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 pr-0">
                <div class="input-box">
                    <label class="label-text">{{ __('Coach') }}</label>
                    <div class="form-group">
                        <div class="select-contain w-auto">
                            <select class="select-contain-select">
                                <option value="1" selected>{{ __('Economy') }}</option>
                                <option value="2">{{ __('Business') }}</option>
                                <option value="3">{{ __('First class') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3">
                <a href="#" class="theme-btn w-100 text-center margin-top-20px">{{ __('Search Now') }}</a>
            </div>
        </div>
    </div><!-- end tab-pane -->
    <div class="tab-pane fade multi-flight-wrap" id="um-rah" role="tabpanel" aria-labelledby="um-rah-tab">
    <div class="tab-pane fade multi-flight-wrap" id="group-ticket" role="tabpanel" aria-labelledby="group-ticket-tab">
        <div class="contact-form-action multi-flight-field d-flex align-items-center">
            <form action="#" class="row flex-grow-1 align-items-center">
                <div class="col-lg-4 pr-0">
                    <div class="input-box">
                        <label class="label-text">{{ __('Flying from') }}</label>
                        <div class="form-group">
                            <span class="la la-map-marker form-icon"></span>
                            <input class="form-control" type="text" placeholder="City or airport">
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-4 pr-0">
                    <div class="input-box">
                        <label class="label-text">{{ __('Flying to') }}</label>
                        <div class="form-group">
                            <span class="la la-map-marker form-icon"></span>
                            <input class="form-control" type="text" placeholder="City or airport">
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
                <div class="col-lg-4">
                    <div class="input-box">
                        <label class="label-text">{{ __('Departing') }}</label>
                        <div class="form-group">
                            <span class="la la-calendar form-icon"></span>
                            <input class="date-range form-control date-multi-picker" type="text" name="daterange-single" value="04/28/2020">
                        </div>
                    </div>
                </div><!-- end col-lg-3 -->
            </form>
            <div class="multi-flight-delete-wrap pt-3 pl-3">
                <button class="multi-flight-remove" type="button"><i class="la la-remove"></i></button>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-3 pr-0">
                <div class="form-group">
                    <button class="theme-btn add-flight-btn margin-top-40px w-100" type="button"><i class="la la-plus mr-1"></i>{{ __('Add another flight') }}</button>
                </div>
            </div>
            <div class="col-lg-3 pr-0">
                <div class="input-box">
                    <label class="label-text">{{ __('Passengers') }}</label>
                    <div class="form-group">
                        <div class="dropdown dropdown-contain">
                            <a class="dropdown-toggle dropdown-btn" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                <span>{{ __('Passengers') }} <span class="qtyTotal guestTotal_4">0</span></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-wrap">
                                <div class="dropdown-item">
                                    <div class="qty-box d-flex align-items-center justify-content-between">
                                        <label>{{ __('Adults') }}</label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <input type="text" name="qtyInput" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="qty-box d-flex align-items-center justify-content-between">
                                        <label>{{ __('Children') }}</label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <input type="text" name="qtyInput" value="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="qty-box d-flex align-items-center justify-content-between">
                                        <label>{{ __('Infants') }}</label>
                                        <div class="qtyBtn d-flex align-items-center">
                                            <input type="text" name="qtyInput" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end dropdown -->
                    </div>
                </div>
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3 pr-0">
                <div class="input-box">
                    <label class="label-text">{{ __('Coach') }}</label>
                    <div class="form-group">
                        <div class="select-contain w-auto">
                            <select class="select-contain-select">
                                <option value="1" selected>{{ __('Economy') }}</option>
                                <option value="2">{{ __('Business') }}</option>
                                <option value="3">{{ __('First class') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div><!-- end col-lg-3 -->
            <div class="col-lg-3">
                <a href="#" class="theme-btn w-100 text-center margin-top-20px">{{ __('Search Now') }}</a>
            </div>
        </div>
    </div><!-- end tab-pane -->
</div>
</div>



<!-- ================================
            START PAGE LAVEl SCRIPT
================================= -->
<script>
    $(document).ready(function() {
        //one-way-search-origin
        $( "#one-way-search-origin" ).autocomplete({
            source: function(request, response) {
                //console.log(request.term);
                var api_url = 'https://test.api.amadeus.com/v1/reference-data/locations?subType=CITY,AIRPORT&keyword='+request.term;
                var access_token = "{{ getAmadeusAccessToken() }}";
                $.ajax({
                    method: 'GET',
                    url: api_url,
                    headers: {
                        Authorization: 'Bearer ' + access_token
                    },
                    success:function(data){
                        var array = $.map(data.data,function(obj){
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
            },
            minLength: 1,
        });
        //one-way-search-destination
        $( "#one-way-search-destination" ).autocomplete({
            source: function(request, response) {
                //console.log(request.term);
                var api_url = 'https://test.api.amadeus.com/v1/reference-data/locations?subType=CITY,AIRPORT&keyword='+request.term;
                var access_token = "{{ getAmadeusAccessToken() }}";
                $.ajax({
                    method: 'GET',
                    url: api_url,
                    headers: {
                        Authorization: 'Bearer ' + access_token
                    },
                    success:function(data){
                        var array = $.map(data.data,function(obj){
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
            },
            minLength: 1,
        });
    });
</script>
<!-- ================================
         END PAGE LAVEl SCRIPT
================================= -->

