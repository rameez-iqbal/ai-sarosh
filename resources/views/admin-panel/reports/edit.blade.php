@extends('admin-panel.layout.master')
@section('custom-css')
<style>
    .video_input{
        padding: 10px;
        border: 1px solid #f1f0ef;
        text-align: center;
        background-color: #f1f0ef;
        cursor: pointer;
        width: 100%;
        border-radius: 6px;
        min-height: 4.75em;
    }
</style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h1>Update Report</h1>
                </div>
                <div class="card-body">
                    <form id="report" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="report_id">
                                <input type="hidden" name="library_type_id" value="{{ $report->library_type_id }}">
                                <input type="hidden" name="report_id" value="{{ $report->id }}">
                                <label for="" class="form-label fs-5">Title </label>
                                <input type="text" class="form-control" name="title" placeholder="Title" value="{{$report->title}}">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label fs-5">Organization </label>
                                <input type="text" class="form-control" name="organization" placeholder="Organization" value="{{$report->organization}}">
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
                                <textarea class="editor-demo1" name="description">{{$report->description}}</textarea>
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
                $('#submitReportBtn').attr('disabled',true);
                e.preventDefault();
                let form = $(this)[0];
                var formData = new FormData(form);

                submitAjax('post', '{{ route('report.store') }}', formData, function(response, error = null) {
                    $('#submitReportBtn').attr('disabled',false);

                    if (response.status === false) {
                        response.data.reverse().forEach(function(message) {
                            toastr.error(message);
                        });
                    } else {
                        toastr.success("Report Updated Successfully");
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
            imagePreview:false,
            credits: {
                label: '',
                url: ''
            }
            @if (isset($report['image']))
                , files: [{
                        source: "{{ asset('storage/reports/'.$report->image) }}",
                    }],
            @endif
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
            @if (isset($report['report_file']))
                , files: [{
                        source: "{{ asset('storage/reports/'.$report->report_file) }}",
                    }],
            @endif

        });
    </script>
        <script src="{{ asset('app-assets') }}/js/summernote/summernote.min.js"></script>
        <script src="{{ asset('app-assets') }}/js/simplemde/simplemde.min.js"></script>
        <script src="{{ asset('app-assets')}}/js/simplemde/simplemde.js"></script>
@endsection
