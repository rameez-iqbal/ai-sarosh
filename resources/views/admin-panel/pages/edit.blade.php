@extends('admin-panel.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h1>Edit {{ucfirst($page->type)}}</h1>
                </div>
                <div class="card-body">
                    <form id="updatePageForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="page_id" class="page_id" id="page_id" value="{{$page->id}}">
                        <input type="hidden" name="type" class="type" id="type" value="{{$page->type}}">
                        @if($page->type == 'page')
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="page">Page Name</label>
                                    <input type="text" class="form-control" name="page" id="page" placeholder="Page Name" value="{{ $page->name }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="page">Sub Heading</label>
                                    <input type="text" class="form-control" name="sub_heading" id="sub_heading" placeholder="Sub Heading" value="{{ $page->sub_heading }}">
                                </div>
                                
                        @endif
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="page">Heading</label>
                                <input type="text" class="form-control" name="heading" id="heading" placeholder="Heading" value="{{ $page->heading }}" >
                            </div>
                            @if($page->type == 'section')
                            <div class="col-md-12">
                                <label for="page">Image</label>
                                <input type="file" class="filepond" name="section_image" id="section_image"
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                            </div>
                            @else
                            <div class="col-md-12">
                                <label for="page">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description" rows="5">{{ $page->description }}</textarea>
                            </div>
                            @endif
                            
                        </div><br>
                        @if($page->type == 'page')

                        <div class="col-md-6">
                            <label for="page">Image</label>
                            <input type="file" class="filepond" name="image" id="image"
                                accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                        </div>
                        </div><br>
                        @endif
                        @if($page->type == 'section')
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="page">Description</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Description" rows="5">{{ $page->description }}</textarea>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{route('pages')}}" class="btn btn-outline-secondary">Back</a>
                        <button type="submit" id="submitPageFormBtn" class="btn btn-outline-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
<script>
    $(document).ready(function () {
        $(document).on('submit','#updatePageForm',function(e){
             e.preventDefault();
             let form = $(this)[0];
             var formData = new FormData(form);
             $.ajax({
                    type: "POST",
                    url: "{{ route('page.save') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (response) {
                        if(response.status == true) {
                            toastr.success("Page Updated");
                            setTimeout(() => {
                                window.location.href = '/admin/pages';
                            }, 1000);
                        }else {
                            response.data.forEach(function(message) {
                                toastr.error(message);
                            });
                        }
                    },
                    error:function(er){
                        toastr.error("Something went wrong");
                    }
             })
         });

         $('#description').summernote({
                height: 200, // set editor height
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['insert', ['link', 'picture', 'video']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                ],
            });
        
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
            @if (isset($page['image']))
                , files: [{
                        source: "{{ asset('storage/home/'.$page->image) }}",
                    }],
            @endif

        });
        FilePond.create(document.getElementById('section_image'), {
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
            @if (isset($page['image']))
                , files: [{
                        source: "{{ asset('storage/home/'.$page->image) }}",
                    }],
            @endif

        });

       
        </script>
<script src="{{ asset('app-assets') }}/js/summernote/summernote.min.js"></script>
<script src="{{ asset('app-assets') }}/js/simplemde/simplemde.min.js"></script>
<script src="{{ asset('app-assets') }}/js/simplemde/simplemde.js"></script>
@endsection