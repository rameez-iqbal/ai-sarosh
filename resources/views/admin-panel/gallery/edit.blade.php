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
                        <div class="row">
                            <input type="hidden" name="library_type_id" value="{{ $gallery->library_type_id }}">
                            <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
                            <div class="col-md-6">
                                <label for="">Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option value="conference" {{$gallery->type == 'conference' ? 'selected': ''}}>Conference</option>
                                    <option value="workshop" {{$gallery->type == 'workshop' ? 'selected': ''}}>Workshop</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="">Heading </label>
                                <input type="text" class="form-control" name="heading" placeholder="Heading" value="{{$gallery->heading}}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="" class="">Post Url </label>
                                <input type="text" class="form-control" name="post_url" placeholder="Post Url" value="{{$gallery->post_url}}">
                            </div>
                            <div class="col-md-6">
                                <label for="">Recording URL</label>
                                <input type="text" class="form-control" name="recording_url" placeholder="Recording URL" value="{{$gallery->recording_url}}">
                            </div>
                        </div>
                        
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label class="" for="Image">Banner Image</label>
                                <input type="file" class="filepond" name="banner_images[]" id="image"
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                            </div>
                            
                            <div class="col-md-6">
                                <label class="" for="Image">Gallery Image</label>
                                <input type="file" class="filepond" name="gallery_images[]" id="gallery_images"
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea class="editor-demo1" name="description">{{$gallery->description}}</textarea>
                            </div>
                        </div>
                        
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('webinar', ['type' => 'gallery']) }}"
                                class="btn btn-outline-secondary">Back</a>
                            <button type="submit" id="submitGalleryBtn" class="btn btn-outline-primary">Save</button>
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
                        toastr.success("Gallery Updated Successfully");
                        setTimeout(() => {
                            window.location.href = "{{route('webinar',['type'=>'gallery'])}}";
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
            allowMultiple: true,
            maxFiles: 4,
            required: false,
            checkValidity: true,
            credits: {
                label: '',
                url: ''
            }
            @if (isset($gallery['banner_images']))
                , files: [
                        @foreach (json_decode($gallery['banner_images']) as $image)
                            {
                                source: "{{ asset('storage/gallery/'.$image) }}",
                            }
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    ],
            @endif

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
            @if (isset($gallery['gallery_images']))
                , files: [
                        @foreach (json_decode($gallery['gallery_images']) as $image)
                            {
                                source: "{{ asset('storage/gallery/'.$image) }}",
                            }
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach
                    ],
            @endif

        });
       
        

    </script>

<script src="{{ asset('app-assets') }}/js/summernote/summernote.min.js"></script>
<script src="{{ asset('app-assets') }}/js/simplemde/simplemde.min.js"></script>
<script src="{{ asset('app-assets')}}/js/simplemde/simplemde.js"></script>
@endsection
