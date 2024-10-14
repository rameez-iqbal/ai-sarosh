@extends('admin-panel.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h1>Change Credientials</h1>
                </div>
                <div class="card-body">
                    <form id="changeCredientials" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="user_id" value="{{$user?->id}}">
                        
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" value="{{$user ? $user->first_name : ''}}">
                        </div>
                        <div class="col-md-6">
                            <label for="">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" value="{{$user ? $user->last_name : ''}}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{$user ? $user->email : ''}}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="">Old Password</label>
                            <input type="password" class="form-control" name="old_password" id="old_password">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="">New Password</label>
                            <input type="password" class="form-control" name="new_password" id="new_password">
                        </div>
                        <div class="col-md-6">
                            <label for="">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" >
                        </div>
                    </div>
                    
                    
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{route('user.form')}}" class="btn btn-outline-secondary">Back</a>
                            <button type="submit" id="submitchangeCredientialsBtn" class="btn btn-outline-primary">Save</button>
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
            $(document).on('submit', '#changeCredientials', function(e) {
                e.preventDefault();
                let form = $(this)[0];
                var formData = new FormData(form);

                submitAjax('post', '{{ route('change.credientials') }}', formData, function(response, error = null) {
                    if (response.status === false) {
                        response.data.reverse().forEach(function(message) {
                            toastr.error(message);
                        });
                    } else {
                        toastr.success("Credientials changed successfully");
                        setTimeout(() => {
                            window.location.href = '{{route('user.form')}}';
                        }, 1000);
                    }
                });
            })
        
            
        });
       
        

    </script>
@endsection
