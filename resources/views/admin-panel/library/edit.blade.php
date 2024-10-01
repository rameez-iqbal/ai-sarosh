@extends('admin-panel.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h1>Create Library</h1>
                </div>
                <div class="card-body">

                    <form id="library" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="library_id" value="{{$library->id}}">
                                <label for=""  class="form-label fs-5">Type </label>
                                <input type="text" class="form-control" name="type" placeholder="Type" value="{{$library->type}}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fs-5" for="Image">Image</label>
                                <input type="file" class="filepond" name="image" id="image"
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                            </div>
                        </div>
                       


                        <div class="card-footer d-flex justify-content-between">
                            <button type="submit" id="submitlibraryBtn" class="btn btn-outline-primary">Update</button>
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
            $(document).on('submit', '#library', function(e) {
                $('#submitlibraryBtn').attr('disabled',true);
                e.preventDefault();
                let form = $(this)[0];
                var formData = new FormData(form);

                submitAjax('post', '{{ route('library.store') }}', formData, function(response, error = null) {
                    $('#submitlibraryBtn').attr('disabled',false);

                    if (response.status === false) {
                        response.data.reverse().forEach(function(message) {
                            toastr.error(message);
                        });
                    } else {
                        toastr.success("Library created successfully");
                        setTimeout(() => {
                            window.location.href = '/admin/library-types';
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
            @if (isset($library['image']))
                , files: [{
                        source: "{{ asset('storage/library/' . $library->image) }}",
                    }],
            @endif

        });
    </script>
@endsection
