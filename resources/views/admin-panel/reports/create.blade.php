@extends('admin-panel.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h1>Create Report</h1>
                </div>
                <div class="card-body">

                    <form id="report" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="report_id">
                                <input type="hidden" name="library_type_id" value="{{ $library_type_id }}">
                                <label for="" class="form-label fs-5">Title </label>
                                <input type="text" class="form-control" name="title" placeholder="Title">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label fs-5">Organization </label>
                                <input type="text" class="form-control" name="organization" placeholder="Organization">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label fs-5" for="Image">Image</label>
                                <input type="file" class="filepond" name="image" id="image"
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fs-5" for="Image">Report File</label>
                                <input type="file" class="filepond" name="report_file" id="report_file"
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp,application/pdf,application/msword" />
                            </div>
                            
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <textarea class="editor-demo1" name="description"></textarea>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('webinar', ['type' => 'reports']) }}"
                                class="btn btn-outline-secondary">Back</a>
                            <button type="submit" id="submitReportBtn" class="btn btn-outline-primary">Save</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('custom-js')

    <script>
        $(document).ready(function() {

            $(document).on('submit', '#report', function(e) {
                $('#submitReportBtn').attr('disabled', true);
                e.preventDefault();
                let form = $(this)[0];
                var formData = new FormData(form);

                submitAjax('post', '{{ route('report.store') }}', formData, function(response, error =
                    null) {
                        console.log(response);
                    $('#submitReportBtn').attr('disabled', false);

                    if (response.status === false) {
                        response.data.reverse().forEach(function(message) {
                            toastr.error(message);
                        });
                    } else {
                        toastr.success("Report Created Successfully");
                        setTimeout(() => {
                            window.location.href = '/admin/library-types/reports';
                        }, 1000);
                    }
                });
            })

            $('.editor-demo1').summernote({
                height: 300, // set editor height
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['insert', ['link', 'picture', 'video']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
        });


        FilePond.create(document.getElementById('image'), {
            styleButtonRemoveItemPosition: 'right',
            imageCropAspectRatio: '1:1',
            acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml', 'image/webp'],
            maxFileSize: '20480KB',
            ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
            storeAsFile: true,
            allowMultiple: false,
            maxFiles: 1,
            required: false,
            checkValidity: true,
            credits: {
                label: '',
                url: ''
            }

        });
        FilePond.create(document.getElementById('report_file'), {
            styleButtonRemoveItemPosition: 'right',
            imageCropAspectRatio: '1:1',
            acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml', 'image/webp',' application/pdf', 'application/msword,'],
            maxFileSize: '20480KB',
            ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
            storeAsFile: true,
            allowMultiple: false,
            maxFiles: 1,
            required: false,
            checkValidity: true,
            credits: {
                label: '',
                url: ''
            }

        });
        

    </script>
    <script src="{{ asset('app-assets') }}/js/summernote/summernote.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/simplemde/simplemde.min.js"></script>
    <script src="{{ asset('app-assets')}}/js/simplemde/simplemde.js"></script>
@endsection
