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
                    <h1>Our Projects</h1>
                </div>
                <div class="card-body">

                    <form id="ourProjects" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="project_id" value="{{isset($project) && !is_null($project) ? $project->id : null}}">
                        <div class="project-listing">
                            <h4 class="text-center">
                                Project
                            </h4>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="">Title </label>
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Title">
                                </div>
                                <div class="col-md-6">
                                    <label for="">University </label>
                                    <input type="text" class="form-control" name="university" id="university"
                                        placeholder="University">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label class="form-label fs-5" for="Image">Logo</label>
                                    <input type="file" class="filepond" name="logo" id="logo"
                                        accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fs-5" for="Image">Image</label>
                                    <input type="file" class="filepond" name="image" id="image"
                                        accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                                </div>
                            </div>

                        </div>
                        <h4 class="text-center mt-3">
                            Details
                        </h4>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="">PI </label>
                                <input type="text" class="form-control" name="pi" id="pi" placeholder="PI">
                            </div>
                            <div class="col-md-6">
                                <label for="">CO PI </label>
                                <input type="text" class="form-control" name="co_pi" id="co_pi"
                                    placeholder="CO PI">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Start Time </label>
                                        <input type="date" class="form-control" name="start_time" id="start_time"
                                            placeholder="Start Time">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">End Time </label>
                                        <input type="date" class="form-control" name="end_time" id="end_time"
                                            placeholder="End Time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="">Project Team</label>
                                <input type="text" class="form-control" name="project_team" id="project_team"
                                    placeholder="Project Team">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="form-label" for="">Website Url</label>
                                <input type="text" class="form-control" name="url" id="url"
                                    placeholder="Website Url">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="">Country</label>
                                <select name="country_id" id="country_id" class="form-control">
                                    @forelse ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @empty
                                        <option value="">--No Country Exists--</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="">About Project</label>
                                <textarea class="description" id="about_description" name="description" placeholder="Description" rows="2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fs-5" for="Image">Image</label>
                                <input type="file" class="filepond" name="detail_image" id="detail_image"
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-between mt-3">
                            <a href="{{ route('our.clients') }}" class="btn btn-outline-secondary">Back</a>
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
                        toastr.success("Project created successfully");
                        setTimeout(() => {
                            // window.location.href = '/admin/our-clients';
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

        });

        $(document).ready(function() {
            // Initialize Summernote
            $('#about_description').summernote({
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
