@extends('admin-panel.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h1>Create Our Team</h1>
                </div>
                <div class="card-body">

                    <form id="ourTeam" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6" >
                                <label for=""  class="form-label fs-5">Name </label>
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                            <div class="col-md-6">
                                <label for=""  class="form-label fs-5">Designation </label>
                                <input type="text" class="form-control" name="designation" placeholder="Designation">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for=""  class="form-label fs-5">Category</label>
                                <select name="category" id="" class="form-control">
                                    @forelse ($our_team_roles as $our_team_role)
                                        <option value="{{$our_team_role->id}}">{{$our_team_role->role}}</option>
                                    @empty
                                        <option value="">No Role Found</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-md-6">
                                    <label class="form-label fs-5" for="Image">Image</label>
                                    <input type="file" class="filepond" name="image" id="image"
                                        accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                            </div>
                        </div>


                        <div class="card-footer d-flex justify-content-between">
                            <button type="submit" id="submitourTeamBtn" class="btn btn-outline-primary">Save</button>
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
            $(document).on('submit', '#ourTeam', function(e) {
                $('#submitourTeamBtn').attr('disabled',true);
                e.preventDefault();
                let form = $(this)[0];
                var formData = new FormData(form);

                submitAjax('post', '{{ route('our.teams.store') }}', formData, function(response, error = null) {
                    $('#submitourTeamBtn').attr('disabled',false);

                    if (response.status === false) {
                        response.data.reverse().forEach(function(message) {
                            toastr.error(message);
                        });
                    } else {
                        toastr.success("our team created successfully");
                        setTimeout(() => {
                            window.location.href = '/admin/our-teams';
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

        });
    </script>
@endsection
