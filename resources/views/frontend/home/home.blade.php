@extends('frontend.layout.master')
@section('page-title', 'Home')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/magnific/magnific.css">
@endsection
@section('content')
<div class="container">
    {{view('frontend.components.social-links')}}
</div>
{{view('frontend.home.banner')}}
{{view('frontend.home.objective')}}
{{view('frontend.home.gallery')}}
{{view('frontend.home.about-donor')}}
{{view('frontend.home.partners')}}

@endsection

@section('custom-js')
<script src="{{ asset('app-assets') }}/js/magnific/magnific.js"></script>

<script>
    $(document).ready(function() {
    $(document).on('click', '.img-div', function() {
        // Get the video or image URL from the data attribute
        let video = $(this).attr('data-img');
        
        // Open Magnific Popup with the retrieved URL
        $.magnificPopup.open({
            items: {
                src: video, // Set the src to the clicked item's data-img
                type: video.endsWith('.mp4') ? 'iframe' : 'image' // Check if the src is a video
            },
            gallery: {
                enabled: false // Disable the gallery
            }
        });
    });
});

</script>
@endsection