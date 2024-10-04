@extends('admin-panel.layout.master')
@section('custom-css')
<style>
    .note-editable {
        height: 200px !important;
    }
    .filepond--item {
        width: calc(25% - 16px);
        margin: 8px;
    }

    /* Adjust the container width to fit the layout */
    .filepond--list {
        display: flex;
        flex-wrap: wrap;
    }
</style>
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h1>Create Gallery</h1>
                </div>
                <div class="card-body">

                    <form id="gallery" enctype="multipart/form-data">
                        @csrf
                        {{view('admin-panel.gallery.form-fields',['library_type_id'=>$library_type_id])}}
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('custom-js')

    <script>
        $(document).ready(function() {

            $(document).on('submit', '#gallery', function(e) {
                $('#submitGalleryBtn').attr('disabled', true);
                e.preventDefault();
                let form = $(this)[0];
                var formData = new FormData(form);

                submitAjax('post', '{{ route('gallery.store') }}', formData, function(response, error =
                    null) {
                        console.log(response);
                    $('#submitGalleryBtn').attr('disabled', false);

                    if (response.status === false) {
                        response.data.reverse().forEach(function(message) {
                            toastr.error(message);
                        });
                    } else {
                        toastr.success("Gallery Created Successfully");
                        setTimeout(() => {
                            // window.location.href = '/admin/library-types/gallery';
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
        FilePond.create(document.getElementById('gallery_images'), {
            styleButtonRemoveItemPosition: 'right',
            imageCropAspectRatio: '2:2',
            acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml', 'image/webp'],
            maxFileSize: '20480KB',
            ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
            storeAsFile: true,
            allowMultiple: true,
            maxFiles: 20,
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
