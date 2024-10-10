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
                                <option value="page">Page</option>
                                <option value="section">Section</option>
                            </select>
                        </div>
                    </div>
                    <br>
                    <form id="pageForm" enctype="multipart/form-data">
                        @csrf

                        <div id="page_form">
                        </div>

                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('pages') }}" class="btn btn-outline-secondary">Back</a>
                            <button type="submit" id="submitPageFormBtn" class="btn btn-outline-primary">Save</button>
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
            $(document).on('submit', '#pageForm', function(e) {
                e.preventDefault();
                let form = $(this)[0];
                var formData = new FormData(form);

                submitAjax('post', '{{ route('page.save') }}', formData, function(response, error = null) {
                    console.log(response);
                    if (response.status === false) {
                        response.data.reverse().forEach(function(message) {
                            toastr.error(message);
                        });
                    } else {
                        toastr.success(response.data + " created successfully");
                        setTimeout(() => {
                            window.location.href = '/admin/pages';
                        }, 1000);
                    }
                });
            });

            // Initial call
            toggleForm($('#type').val());




        });

        function toggleForm(val) {
            let html = ''; // Reset html content each time
            $('#page_form').empty(); // Clear existing content

            if (val == 'page') {
                // Form for "Page"
                html += `<input type="hidden" name="type" id="type" value="page">
                <div class="row">
                    <div class="col-md-6">
                        <label for="page">Page Name</label>
                        <input type="text" class="form-control" name="page" id="page" placeholder="Page Name" value="{{ old('page') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="page">Heading</label>
                        <input type="text" class="form-control" name="heading" id="heading" placeholder="Heading">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="page">Sub Heading</label>
                        <input type="text" class="form-control" name="sub_heading" id="sub_heading" placeholder="Sub Heading">
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <label for="page">Description</label>
                        <textarea class="editor-demo1" name="description"></textarea>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-md-12">
                        <label class="" for="Image">Image</label>
                                <input type="file" class="filepond" name="image" id="image"
                                    accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                    </div>
                </div>`;
            } else if (val == 'section') {
                // Form for "Section"
                html += `<input type="hidden" name="type" id="type" value="section">
            <div class="row">
                <div class="col-md-6">
                    <label for="section">Section Name</label>
                    <input type="text" class="form-control" name="heading" id="heading" placeholder="Section Name" value="{{ old('section') }}">
                </div>
                <div class="col-md-6">
                    <label class="" for="Image">Image</label>
                            <input type="file" class="filepond" name="section_image" id="section_image"
                                accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                </div>
            </div><br>
            <div class="row">
                <div class="col-md-12">
                    <label for="">Description</label>
                    <textarea class="editor-demo1" id="description" name="description" placeholder="Description" rows="3"></textarea>
                </div>
            </div>`;
            }

            $('#page_form').append(html);

            // Initialize FilePond after appending new content
            initializeFilePond();
            $('.editor-demo1').summernote({
                height: 300, // set editor height
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['insert', ['link', 'picture', 'video']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']],
                ],
            });
        }

        function initializeFilePond() {
            // Destroy existing FilePond instances
            FilePond.destroy(document.getElementById('image'));
            FilePond.destroy(document.getElementById('section_image'));

            // Initialize FilePond for the new inputs
            FilePond.create(document.getElementById('image'), {
                styleButtonRemoveItemPosition: 'right',
                imageCropAspectRatio: '1:1',
                acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml',
                    'image/webp'
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

            FilePond.create(document.getElementById('section_image'), {
                styleButtonRemoveItemPosition: 'right',
                imageCropAspectRatio: '1:1',
                acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml',
                    'image/webp'
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
    <script src="{{ asset('app-assets') }}/js/summernote/summernote.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/simplemde/simplemde.min.js"></script>
    <script src="{{ asset('app-assets') }}/js/simplemde/simplemde.js"></script>
@endsection
