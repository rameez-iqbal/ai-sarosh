@extends('admin-panel.layout.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-title">
                    <h1>Edit {{ucfirst($service->type)}}</h1>
                </div>
                <div class="card-body">
                    <form id="updatePageForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="service_id" class="service_id" id="service_id" value="{{$service->id}}">
                        <input type="hidden" name="name" class="name" id="name" value="{{$service->type}}">
                        
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="page">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="title" value="{{ $service->title }}" >
                            </div>
                            
                            <div class="col-md-6">
                                <label for="page">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description" rows="5">{{ $service->description }}</textarea>
                            </div>
                            
                        </div><br>

                        <div class="col-md-6">
                            <label for="page">Image</label>
                            <input type="file" class="filepond" name="image" id="image"
                                accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
                        </div>
                </div><br>
                        
                    <div class="card-footer d-flex justify-content-between">
                        <button type="submit" id="submitPageFormBtn" class="btn btn-outline-primary">Save</button>
                        <a href="{{route('services')}}" class="btn btn-outline-secondary">Back</a>
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
                    url: "{{ route('service.save') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (response) {
                        if(response.status == true) {
                            toastr.success("Service Updated");
                            setTimeout(() => {
                                window.location.href = '{{route('services')}}';
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
            @if (isset($service['image']))
                , files: [{
                        source: "{{ asset('storage/services/'.$service->image) }}",
                    }],
            @endif

        });
    
       
</script>
@endsection