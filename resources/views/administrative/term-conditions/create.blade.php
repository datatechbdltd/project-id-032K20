@extends('administrative.layout.app')
@push('title') {{ __('Create Term & Conditions') }} @endpush
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@section('content')
    <div class="card card-custom">
        <div class="card-header">
            <h3 class="card-title">
                Terms and condition
            </h3>
            <div class="card-toolbar">
                <div class="example-tools justify-content-center">
                    <span class="example-toggle" data-toggle="tooltip" title="View code"></span>
                    <span class="example-copy" data-toggle="tooltip" title="Copy code"></span>
                </div>
            </div>
        </div>
        <!--begin::Form-->
        <form method="post" action="{{route('administrative.terms-condition.store')}}">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label>Serial<span class="text-danger">*</span></label>
                    <input type="number" name="serial" class="form-control" min="1" />
                    @error('serial')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="text">Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" id="text" placeholder="Title"/>
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-1">
                    <label for="description">Description<span class="text-danger">*</span></label>
                    <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status<span class="text-danger">*</span></label>
                    <div class="col-9 col-form-label">
                        <div class="radio-inline">
                            <label class="radio radio-success">
                                <input type="radio" name="status" value="1"/>
                                <span></span>
                                Active
                            </label>
                            <label class="radio radio-success">
                                <input type="radio" name="status" value="0" />
                                <span></span>
                                Inactive
                            </label>
                        </div>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-secondary">Cancel</button>
            </div>
        </form>
        <!--end::Form-->
    </div>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script>
        $('#description').summernote({
            placeholder: 'Write description',
            tabsize: 2,
            height: 220,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    </script>
@endpush
