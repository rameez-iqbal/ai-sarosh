<!DOCTYPE html>
<html lang="en">

    <!-- Mirrored from infinitysoftway.com/oxoury/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2024 05:50:12 GMT -->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="Infinitysoftway" />
        <meta name="description" content="statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

        <!-- TITLE -->
        <title>AI-Sarosh - @yield('title')</title>

        <!-- FAVICON -->
        <link rel="icon" href="{{ asset('app-assets/images/frontend/favicon_logo.png') }}" type="image/x-icon"> 

        <!-- STYLE -->
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/style.css">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/dashboard/dashboard.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/js/datatables/buttons.dataTables.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/js/datatables/select.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/js/datatables/fixedColumns.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/toastr/toastr.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/dropzone/dropzone.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/filepond/filepond.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/filepond/plugins/filepond.preview.min.css">

        {{-- <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/bootstrap/bootstrap.min.css"> --}}
        @yield('custom-css')


    </head>

    <body>
        {{ view('admin-panel.layout.header') }}
        <div class="wrapper">
            {{ view('admin-panel.layout.leftbar') }}
            <div class="main-panel">
                <div class="panel-hedding">
                    @yield('content')
                </div>
                {{ view('admin-panel.layout.footer') }}
            </div>
        </div>
        <script src="{{ asset('app-assets') }}/js/jquery-3.6.0.min.js"></script>

        <!-- bootstrap -->
        <script src="{{ asset('app-assets') }}/js/bootstrap/bootstrap.min.js"></script>
        <script src="{{ asset('app-assets') }}/js/bootstrap/bootstrap.bundle.min.js"></script>

        <!-- jquery-nicescroll -->
        <script src="{{ asset('app-assets') }}/js/jquery-nicescroll/jquery.nicescroll.min.js"></script>
        
        <!-- apexcharts -->
        <script src="{{ asset('app-assets') }}/js/apexcharts/apexcharts.min.js"></script>
        <script src="{{ asset('app-assets') }}/js/apexcharts/apexcharts-custom.js"></script>
        <script src="{{ asset('app-assets') }}/js/datatables/datatables.min.js"></script>

        <script src="{{ asset('app-assets') }}/js/toastr/toastr.min.js"></script>

        <!-- summernote -->
        
        <!-- summernote -->



        <script src="{{ asset('app-assets') }}/js/filepond/plugins/filepond.preview.min.js"></script>
        <script src="{{ asset('app-assets') }}/js/filepond/plugins/filepond.typevalidation.min.js"></script>
        <script src="{{ asset('app-assets') }}/js/filepond/plugins/filepond.imagecrop.min.js"></script>
        <script src="{{ asset('app-assets') }}/js/filepond/plugins/filepond.imagesizevalidation.min.js"></script>
        <script src="{{ asset('app-assets') }}/js/filepond/plugins/filepond.filesizevalidation.min.js"></script>
        <script src="{{ asset('app-assets') }}/js/filepond/plugins/filepond.min.js"></script>
        <script src="{{ asset('app-assets') }}/js/custom.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
        
        <!-- custom -->
        <script>
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

            function submitAjax(method,route,formData,callback,dataType='json',msg="Please wait !") {
                $.ajax({
                    type: method,
                    url: route,
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: dataType,
                    // beforeSend:function(){
                    //     toastr.info(msg);
                    // },
                    success: function (response) {
                        if (typeof callback === "function") {
                            callback(response);
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(xhr, status, error);
                        if (typeof callback === "function") {
                            callback(null, xhr.responseText);
                        }
                    }
                });
            }
            FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginFileValidateType,
            FilePondPluginFileValidateSize,
            FilePondPluginImageValidateSize,
            FilePondPluginImageCrop,
        );
        </script>
        
        @yield('custom-js')

    </body>

</html>
