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
                    <h1>Create Video</h1>
                </div>
                <div class="card-body">

                    <form id="video" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="video_id">
                                <input type="hidden" name="library_type_id" value="{{ $library_type_id }}">
                                <label for="" class="form-label fs-5">Title </label>
                                <input type="text" class="form-control" name="title" placeholder="Title">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label fs-5">Name </label>
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="" class="form-label fs-5">Organization </label>
                                <input type="text" class="form-control" name="organization" placeholder="Organization">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fs-5" for="Image">Image</label>
                                <input type="file" class="filepond" name="image" id="image"
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            
                            <div class="col-md-6">
                                <label class="form-label fs-5" for="Image">Video</label><br>
                                <input type="file" style="display: none" name="video" class="file_multi_video" accept="video/*">
                                <p class="video_input d-flex justify-content-around align-items-center text-decoration-underline browse">Browse </p>
                                <center>
                                    <video style="width: fit-content" name="video" controls height="200px" class="mt-3">
                                        <source src="mov_bbb.mp4" id="video_here">
                                        Your browser does not support HTML5 video.
                                    </video>
                                </center>
                            </div>
                        </div>
                        <div class="row mt-3">
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('webinar', ['type' => 'videos']) }}"
                                class="btn btn-outline-secondary">Back</a>
                            <button type="submit" id="submitVideoBtn" class="btn btn-outline-primary">Save</button>
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

            $(document).on('submit', '#video', function(e) {
                $('#submitVideoBtn').attr('disabled', true);
                e.preventDefault();
                let form = $(this)[0];
                var formData = new FormData(form);

                submitAjax('post', '{{ route('video.store') }}', formData, function(response, error =
                    null) {
                    $('#submitVideoBtn').attr('disabled', false);

                    if (response.status === false) {
                        response.data.reverse().forEach(function(message) {
                            toastr.error(message);
                        });
                    } else {
                        toastr.success("Video Created Successfully");
                        setTimeout(() => {
                            window.location.href = '/admin/library-types/videos';
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

        $(document).on("change", ".file_multi_video", function(evt) {
            var $source = $('#video_here');
            $source[0].src = URL.createObjectURL(this.files[0]);
            $source.parent()[0].load();
        });

        $(document).on('click','.browse',function(){
            $('.file_multi_video').trigger('click');
        })
    </script>
@endsection
