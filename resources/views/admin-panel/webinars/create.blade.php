@extends('admin-panel.layout.master')
@section('custom-css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<style>
    #fp-human-friendly {
        background: #fff !important;
    }
</style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h1>Create Webinar</h1>
                </div>
                <div class="card-body">

                    <form id="webinar" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="library_type_id" value="{{$library_type_id}}">
                                <label for=""  class="form-label fs-5">Title </label>
                                <input type="text" class="form-control" name="title" placeholder="Title">
                            </div>
                            <div class="col-md-6" >
                                <label for=""  class="form-label fs-5">Url </label>
                                <input type="text" class="form-control" name="redirect_url" placeholder="URL">
                            </div>
                            
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for=""  class="form-label fs-5">Webinar Date </label>
                                <input type="text" name="webinar_date" id="fp-human-friendly" class="form-control fp-human-friendly">

                            </div>
                            <div class="col-md-6">
                                <label class="form-label fs-5" for="Image">Image</label>
                                <input type="file" class="filepond" name="image" id="image"
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                            </div>
                        </div>
                       


                        <div class="card-footer d-flex justify-content-between">
                            <button type="submit" id="submitWebinarBtn" class="btn btn-outline-primary">Save</button>
                            <a href="{{ route('webinar',['type'=>'webinars']) }}" class="btn btn-outline-secondary">Back</a>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('custom-js')
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function() {
            flatpickr('#fp-human-friendly',{
                dateFormat:'Y-m-d',
                disableMobile:"true"
            });
            $(document).on('submit', '#webinar', function(e) {
                $('#submitWebinarBtn').attr('disabled',true);
                e.preventDefault();
                let form = $(this)[0];
                var formData = new FormData(form);

                submitAjax('post', '{{ route('webinar.store') }}', formData, function(response, error = null) {
                    $('#submitWebinarBtn').attr('disabled',false);

                    if (response.status === false) {
                        response.data.reverse().forEach(function(message) {
                            toastr.error(message);
                        });
                    } else {
                        toastr.success("Webinar Created Successfully");
                        setTimeout(() => {
                            window.location.href = '/admin/library-types/webinars';
                        }, 1000);
                    }
                });
            })
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
    </script>
@endsection
