@extends('admin-panel.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h1>Update Our Client</h1>
                </div>
                <div class="card-body">

                    <form id="ourClient" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <input type="hidden" name="our_client_id" id="our_client_id" value="{{$our_client->id}}">
                            <div class="col-md-6">
                                <label for="">Description </label>
                                <textarea name="description" name="description" class="form-control" id="description" placeholder="Description" rows="5">{{$our_client->description}}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fs-5" for="Image">Image</label>
                                <input type="file" class="filepond" name="image" id="image"
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                            </div>
                        </div>


                        <div class="card-footer d-flex justify-content-between">
                            <button type="submit" id="submitourClientBtn" class="btn btn-outline-primary">Save</button>
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
            $(document).on('submit', '#ourClient', function(e) {
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
                            window.location.href = '{{route('our.clients')}}';
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
            @if (isset($our_client['image']))
                , files: [{
                        source: "{{ asset('storage/ourclients/' . $our_client->image) }}",
                    }],
            @endif

        });
    </script>
@endsection
