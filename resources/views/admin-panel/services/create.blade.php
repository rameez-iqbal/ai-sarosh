@extends('admin-panel.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h1>Create Page</h1>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Type</label>
                            <select name="type" id="type" class="form-control" onchange="toggleForm($(this).val())">
                                <option value="service">Service</option>
                                <option value="thematic_area">Thematic Area</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <form id="serviceForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="name" id="name">
                                <label for="section">Title</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Service Name" value="{{ old('section') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description" rows="3"></textarea>
                            </div>
                            
                        </div><br>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label fs-5" for="Image">Image</label>
                                <input type="file" class="filepond" name="image" id="image"
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp,image/svg" />
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <button type="submit" id="submitserviceFormBtn" class="btn btn-outline-primary">Save</button>
                            <a href="{{ route('services') }}" class="btn btn-outline-secondary">Back</a>
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
            $(document).on('submit', '#serviceForm', function(e) {
                e.preventDefault();
                let form = $(this)[0];
                var formData = new FormData(form);

                submitAjax('post', '{{ route('service.save') }}', formData, function(response, error = null) {
                    console.log(response);
                    if (response.status === false) {
                        response.data.reverse().forEach(function(message) {
                            toastr.error(message);
                        });
                    } else {
                        toastr.success(response.data + " created successfully");
                        setTimeout(() => {
                            window.location.href = '{{route('services')}}';
                        }, 1000);
                    }
                });
            });

            // Initial call
            toggleForm($('#type').val());




        });

        function toggleForm(val) {
            $('#page_form').empty();
            $('#name').val(val);
        }
        $(document).ready(function () {
            initializeFilePond();
            
        });

        function initializeFilePond() {
            // Destroy existing FilePond instances
            FilePond.destroy(document.getElementById('image'));

            // Initialize FilePond for the new inputs
            FilePond.create(document.getElementById('image'), {
                styleButtonRemoveItemPosition: 'right',
                imageCropAspectRatio: '1:1',
                acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml',
                    'image/webp','image/svg'
                ],
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

            
        }
    </script>
@endsection
