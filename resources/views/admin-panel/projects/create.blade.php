@extends('admin-panel.layout.master')

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
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Title </label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                            </div>
                            <div class="col-md-6">
                                <label for="">University </label>
                                <input type="text" class="form-control" name="university" id="university" placeholder="University">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="">PI </label>
                                <input type="text" class="form-control" name="pi" id="pi" placeholder="PI">
                            </div>
                            <div class="col-md-6">
                                <label for="">CO PI </label>
                                <input type="text" class="form-control" name="co_pi" id="co_pi" placeholder="CO PI">
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

                        <div class="card-footer d-flex justify-content-between">
                            <button type="submit" id="submitourProjectsBtn" class="btn btn-outline-primary">Save</button>
                            <a href="{{ route('our.clients') }}" class="btn btn-outline-secondary">Back</a>
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

                submitAjax('post', '{{ route('our.clients.store') }}', formData, function(response, error = null) {
                    console.log(response);;
                    if (response.status === false) {
                        response.data.reverse().forEach(function(message) {
                            toastr.error(message);
                        });
                    } else {
                        toastr.success("our client created successfully");
                        setTimeout(() => {
                            window.location.href = '/admin/our-clients';
                        }, 1000);
                    }
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
    </script>
@endsection
