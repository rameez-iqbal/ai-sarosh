@extends('frontend.layout.master')
@section('page-title', 'Gallery')
@section('custom-css')

    <style>
        .gallery-banner-img {
            height: 529px;
            object-fit: cover;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        {{ view('frontend.components.social-links') }}
        <x-breadcrumb :backLink="$backLink" homeText="Home" :breadcrumbItems="$breadcrumbItems" />
        <div class="row conference" data-aos="zoom-in-up">
            <h1 class="ff-main main-color my-2 my-md-5 text-center fw-bold set-sm-fs">{{ $conference->heading }}</h1>
            <p class="main-color fw-normal text-align-justify"><span class="fw-bold">{!! $conference->description !!}</p>
            <a href="{{ $conference->post_url }}" class="main-color fw-semi-bold mb-2" target="_blank">View Linkedin Post</a>
        </div>
        @if (!empty($conference->banner_images) && count(json_decode($conference->banner_images)) > 0)
            <div class="row conference_banner_images gap-1 gap-md-2 " >
                @forelse (json_decode($conference->banner_images) as $banner_img)
                    <div class="col-md-12 img-div" data-aos="zoom-in-up" data-img="{{ asset('storage/gallery/' . $banner_img) }}">
                        <a href="javascript:void(0)" class="d-block h-100">
                        <img src="{{ asset('storage/gallery/' . $banner_img) }}" alt="" class="gallery-banner-img">
                        </a>
                    </div>
                @empty
                @endforelse
            </div>
        @endif
        @if (!empty($conference->gallery_images) && count(json_decode($conference->gallery_images)) > 0)

            <div class="my-2 health_conference_images gap-2">
                @forelse (json_decode($conference->gallery_images) as $gallery_img)
                    <div class="img-div" data-aos="zoom-in-up" data-img="{{ asset('storage/gallery/' . $gallery_img) }}">
                        <a href="javascript:void(0)" class="d-block h-100">
                            <img src="{{ asset('storage/gallery/' . $gallery_img) }}" class="international-public-images w-100"
                                alt="">
                        </a>
                    </div>
                @empty
                @endforelse
            </div>
        @endif
    </div>
@endsection
@section('custom-js')

    <script>
        $(document).ready(function() {
            $('.conference').find('p').addClass('ff-main text-clr fw-normal');
           
        });
    </script>
@endsection
