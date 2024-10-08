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
<?php
$days = ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'];
?>
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h1>Update Gallery Workshop</h1>
                </div>
                <div class="card-body">

                    <form id="gallery" enctype="multipart/form-data">
                        @csrf
                        <div class="row repeater" id="repeater-wrapper">
                            <input type="hidden" name="id" value="{{ $id }}">
                            <div class="col-md-6">  
                                <label for="">Day</label>
                                <select name="type" class="form-control">
                                    @foreach ($days as $day)
                                        <option value="{{$day}}">{{$day}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="">Heading</label>
                                <input type="text" class="form-control" name="heading" placeholder="Heading">
                            </div>
                           
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="Image">Images</label>
                                    <input type="file" class="filepond" id="image" name="image[]" accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                                </div>
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


            $(document).on('submit', '#gallery', function(e) {
                $('#submitGalleryBtn').attr('disabled', true);
                e.preventDefault();
                let form = $(this)[0];
                var formData = new FormData(form);

                submitAjax('post', '{{ route('highlights.store') }}', formData, function(response, error =
                    null) {
                    console.log(response,error);
                    $('#submitGalleryBtn').attr('disabled', false);
                    
                    if(response) {
                        if (response.status === false) {
                            response.data.reverse().forEach(function(message) {
                                toastr.error(message);
                            });
                        } else {
                            toastr.success("Workshop Created Successfully");
                        }
                    }
                    // setTimeout(() => {
                    //         var id = <?php echo json_encode($id); ?>;
                    //         window.location.href = '/admin/gallery/highlights/'+id;
                    //     }, 1000);
                });
            });
        });
    </script>
@endsection
