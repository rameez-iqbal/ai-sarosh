@extends('admin-panel.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h1>Settings</h1>
                </div>
                <div class="card-body">
                    <form id="settingForm" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="setting_id" value="{{$settings?->id}}">
                        <div class="col-md-6">
                            <label>Facebook Url</label>
                            <input type="text" class="form-control" name="fb_url" id="fb_url" value="{{$settings ? json_decode($settings->social_url)->fb_url : ''}}">
                        </div>
                        <div class="col-md-6">
                            <label>Instagram Url</label>
                            <input type="text" class="form-control" name="insta_url" id="insta_url" value="{{$settings ? json_decode($settings->social_url)->insta_url : ''}}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Youtube Url</label>
                            <input type="text" class="form-control" name="youtube_url" id="youtube_url" value="{{$settings ? json_decode($settings->social_url)->youtube_url : ''}}">
                        </div>
                        <div class="col-md-6">
                            <label>LinkedIn Url</label>
                            <input type="text" class="form-control" name="linkedin_url" id="linkedin_url" value="{{$settings ? json_decode($settings->social_url)->linkedin_url : ''}}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Image</label>
                           <input type="file" id="logo" class="filepond" name="logo">
                           
                        </div>
                    </div>
                    
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{route('settings')}}" class="btn btn-outline-secondary">Back</a>
                            <button type="submit" id="submitSettingFormBtn" class="btn btn-outline-primary">Save</button>
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
            $(document).on('submit', '#settingForm', function(e) {
                e.preventDefault();
                let form = $(this)[0];
                var formData = new FormData(form);

                submitAjax('post', '{{ route('settings.store') }}', formData, function(response, error = null) {
                    console.log(response);;
                    if (response.status === false) {
                        response.data.reverse().forEach(function(message) {
                            toastr.error(message);
                        });
                    } else {
                        toastr.success(response.data+" created successfully");
                        setTimeout(() => {
                            window.location.href = '{{route('settings')}}';
                        }, 1000);
                    }
                });
            })
        
            
        });
       
        FilePond.create(document.getElementById('logo'), {
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
            @if (isset($settings->logo))
                , files: [{
                        source: "{{ asset('storage/setting/' . $settings->logo) }}",
                    }],
            @endif

        });

    </script>
@endsection
