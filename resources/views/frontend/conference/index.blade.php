@extends('frontend.layout.master')
@section('page-title', 'Home')
@section('content')
<div class="container">
    {{view('frontend.components.social-links')}}
    <x-breadcrumb
    :backLink="$backLink"
    homeText="Home"
    :breadcrumbItems="$breadcrumbItems"
    />
    <div class="row conference" data-aos="zoom-in-up">
        <h1 class="ff-main main-color my-5 text-center fw-bold">{{$conference->heading}}</h1>
        <p class="main-color fw-normal text-align-justify"><span class="fw-bold">{!! $conference->description !!}</p>
        <a href="{{$conference->post_url}}" class="main-color fw-semi-bold mb-2" target="_blank">View Linkedin Post</a>
    </div>
    @if(!empty($conference->banner_images) && count(json_decode($conference->banner_images))>0)
        <div class="row conference_banner_images gap-1 gap-md-2">
            @forelse (json_decode($conference->banner_images) as $banner_img)
                <div class="col-md-12" data-aos="zoom-in-up">
                    <img src="{{asset('storage/gallery/'.$banner_img)}}" alt="">
                </div>
            @empty
            @endforelse
        </div>
    @endif
    <div class="my-2 health_conference_images gap-2">
        @forelse (json_decode($conference->gallery_images) as $gallery_img)
            <div class="" data-aos="zoom-in-up">
                <img src="{{asset('storage/gallery/'.$gallery_img)}}" class="international-public-images w-100" alt="">
            </div>
        @empty
        @endforelse
        {{-- <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/phc_conference_1.png')}}" class="international-public-images w-100" alt="">
        </div>
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/phc_conference_2.png')}}" class="international-public-images w-100" alt="">
        </div>
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/phc_conference_3.png')}}" class="international-public-images w-100" alt="">
        </div> --}}
    </div>
</div>
@endsection