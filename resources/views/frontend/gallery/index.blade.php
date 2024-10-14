@extends('frontend.layout.master')
@section('custom-css')
<style>
    .gallery_image {
        width: 400px !important;
        height: 334px !important;
        object-fit: cover;
    }
</style>
@endsection
@section('page-title', 'Gallery')
@section('content')
    <div class="container">
        {{ view('frontend.components.social-links') }}
        <x-breadcrumb :backLink="$backLink" homeText="Home" :breadcrumbItems="$breadcrumbItems" />
    </div>
    
    <section id="articles" class="my-4 my-md-5">
        <div class="container">
            <div class="row my-3 my-md-5">
                <h1 class="ff-main text-center main-color fw-bold">Gallery</h1>
            </div>
            <div class="row g-3 g-md-5 justify-content-center">
                @inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')
                @forelse ($obj->getGalleries() as $gallery)
                    <x-vertical-card 
                    :image="isset($gallery->banner_images) && json_decode($gallery->banner_images) ? asset('storage/gallery/'.json_decode($gallery->banner_images)[0]) : null"
                    :name="$gallery['heading']"
                    columns="col-md-5"
                    :href="$gallery['slug']"
                    borderRadius="25px"
                    :bannerImage="isset($gallery->gallery_images) && json_decode($gallery->gallery_images) ? asset('storage/gallery/'.json_decode($gallery->gallery_images)[0]) : null"
                    :isGallery=true
                    />
                @empty
                @endforelse
            </div>
        </div>
    </section>
@endsection
@section('custom-js')
<script>
    $(document).ready(function() {
            $(document).on('click', '.img-div', function() {
                let imageUrl = $(this).attr('data-img');
                $.magnificPopup.open({
                    items: {
                        src: imageUrl,
                        type: 'image'
                    },
                    callbacks: {
                        open: function() {
                            $('.mfp-img').css({
                                'width': '600px',
                                'height': 'auto'
                            });
                        }
                    },
                    gallery: {
                        enabled: false
                    }
                });
            });
        });
</script>
@endsection