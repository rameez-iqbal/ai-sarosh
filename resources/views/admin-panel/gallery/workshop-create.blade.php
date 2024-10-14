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

        .btn i {
            padding-right: 0 !important;
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
                    <h1>Create Gallery Workshop</h1>
                </div>
                <div class="card-body">

                    <form id="gallery" enctype="multipart/form-data">
                        @csrf
                        {{ view('admin-panel.gallery.highlights-form-fields', ['id' => $id, 'days' => $days]) }}
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    <script>
        $(document).ready(function() {
            let counter = 0; // Start counter at 0 for zero-based indexing

            // Function to create a new repeater row
            function createRepeaterRow() {
                // Create a new div for the repeater row
                let newRepeater = document.createElement('div');
                newRepeater.classList.add('row', 'repeater');

                newRepeater.innerHTML = `
                    <input type="hidden" name="days[${counter}][id]" value="{{ $id }}">
                    <div class="col-md-5">
                        <label for="">Day</label>
                        <select name="days[${counter}][day]" class="form-control">
                            @foreach ($days as $day)
                                <option value="{{ $day }}">{{ $day }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <label for="" class="">Heading</label>
                        <input type="text" class="form-control" name="days[${counter}][heading]" placeholder="Heading ${counter + 1}">
                    </div>
                    <div class="col-md-2 mt-4">
                        <button class="btn btn-outline-primary addBtn" type="button"><i class="fa fa-plus"></i></button>
                        <button class="btn btn-outline-danger deleteBtn" type="button"><i class="fa fa-trash"></i></button>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="Image">Images</label>
                            <input type="file" class="filepond" id="image${counter}" name="days[${counter}][images][]" accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                        </div>
                    </div>
                `;

                // Append the newRepeater to the DOM
                document.getElementById('repeater-container').appendChild(newRepeater);

                // Initialize FilePond for the new file input
                FilePond.create(newRepeater.querySelector(`input[type="file"]`), {
                    styleButtonRemoveItemPosition: 'right',
                    imageCropAspectRatio: '1:1',
                    acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg', 'image/svg+xml',
                        'image/webp'
                    ],
                    maxFileSize: '10240KB',
                    ignoredFiles: ['.ds_store', 'thumbs.db', 'desktop.ini'],
                    storeAsFile: true,
                    allowMultiple: true,
                    maxFiles: 50,
                    required: true,
                    checkValidity: true,
                    credits: {
                        label: '',
                        url: ''
                    },
                });

                // Increment the counter for the next set
                counter++;
            }

            // Delegate event listeners to the repeater container for dynamic elements
            document.addEventListener('click', function(event) {
                // Handle add button click
                if (event.target && event.target.classList.contains('addBtn')) {
                    createRepeaterRow();
                }

                // Handle delete button click
                if (event.target && event.target.classList.contains('deleteBtn')) {
                    if (confirm('Are you sure?')) {
                        let repeaterRow = event.target.closest('.repeater');
                        if (repeaterRow) {
                            repeaterRow.remove();
                        }
                    }
                }
            });

            // Initialize the first repeater row
            createRepeaterRow();



            $(document).on('submit', '#gallery', function(e) {
                $('#submitGalleryBtn').attr('disabled', true);
                e.preventDefault();
                let form = $(this)[0];
                var formData = new FormData(form);

                submitAjax('post', '{{ route('highlights.store') }}', formData, function(response, error =
                    null) {
                    console.log(response, error);
                    $('#submitGalleryBtn').attr('disabled', false);

                    if (response) {
                        if (response.status === false) {
                            response.data.reverse().forEach(function(message) {
                                toastr.error(message);
                            });
                        } else {
                            toastr.success("Workshop Created Successfully");
                        }
                    }
                    setTimeout(() => {
                        window.location.href = '{{route('highlights.index',['id'=>$id])}}';
                    }, 1000);
                });

            });
        });
    </script>
@endsection
