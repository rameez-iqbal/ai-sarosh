@extends('admin-panel.layout.master')
@section('custom-css')
<style>
    .note-editable {
        height: 200px !important;
    }
</style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h1>Update Project</h1>
                </div>
                <div class="card-body">

                    <form id="ourProjects" enctype="multipart/form-data">
                        @csrf
                        
                        {{view('admin-panel.projects.form-fields',['countries'=>$countries,'project'=>$project])}}

                        <div class="card-footer d-flex justify-content-between mt-3">
                            <a href="{{ route('project.index') }}" class="btn btn-outline-secondary">Back</a>
                            <button type="submit" id="submitourProjectsBtn"
                                class="btn btn-outline-primary">Save</button>
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
            $(document).on('submit', '#ourProjects', function(e) {
                e.preventDefault();
                let form = $(this)[0];
                var formData = new FormData(form);

                submitAjax('post', '{{ route('project.store') }}', formData, function(response, error =
                    null) {
                    $('#submitourProjectsBtn').attr('disabled',true);
                    console.log(response);
                    if (response.status === false) {
                        response.data.reverse().forEach(function(message) {
                            toastr.error(message);
                        });
                    } else {
                        toastr.success("Project Updated successfully");
                        setTimeout(() => {
                            window.location.href = '{{route('project.index')}}';
                        }, 1000);
                    }
                    $('#submitourProjectsBtn').attr('disabled',false);

                });
            })
        });


        FilePond.create(document.getElementById('image'), {
            styleButtonRemoveItemPosition: 'right',
            imageCropAspectRatio: '1:1',
            acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml', 'image/webp'],
            maxFileSize: '10240KB',
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
            @if (isset($project['image']))
                , files: [{
                        source: "{{ asset('storage/projects/'.$project->image) }}",
                    }],
            @endif

        });
        FilePond.create(document.getElementById('logo'), {
            styleButtonRemoveItemPosition: 'right',
            imageCropAspectRatio: '1:1',
            acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml', 'image/webp'],
            maxFileSize: '10240KB',
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
            @if (isset($project['logo']))
                , files: [{
                        source: "{{ asset('storage/projects/'.$project->logo) }}",
                    }],
            @endif

        });
        FilePond.create(document.getElementById('detail_image'), {
            styleButtonRemoveItemPosition: 'right',
            imageCropAspectRatio: '1:1',
            acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml', 'image/webp'],
            maxFileSize: '10240KB',
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
            @if (isset($project->details['image']))
                , files: [{
                        source: "{{ asset('storage/projects/'.$project->details->image) }}",
                    }],
            @endif

        });

        $(document).ready(function() {
            // Initialize Summernote
           
            $('#about_description').summernote({
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['insert', ['link', 'picture', 'video']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });
            $('#project_team').summernote({
                height: 300, // set editor height
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['insert', ['link', 'picture', 'video']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });

            // Initialize Bootstrap tooltips if needed
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script src="{{ asset('app-assets') }}/js/summernote/summernote.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/simplemde/simplemde.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/simplemde/simplemde.js"></script>
@endsection
