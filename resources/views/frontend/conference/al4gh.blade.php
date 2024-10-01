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
        <h1 class="ff-main main-color my-5 text-center fw-bold">AI4GH: Nairobi, Kenya 2023 </h1>
        <p class="fw-normal text-align-justify main-color ">The International Development Research Center (IDRC) funded a 3-day meeting in <span class="fw-bold"> Nairobi from November 13-15,</span> organized by <span class="fw-bold"> The Global Health Network (TGHN).</span> AI4GH partners discussed achievements, milestones, best practices, and challenges in AI-driven health solutions, focusing on improving communication, responsible AI-based healthcare, and policy engagement. The meeting aimed to establish a foundation for continuous collaboration and knowledge-sharing among AI4GH partners, highlighting the desire for deeper collaborations and recognizing the network's diverse talent and resources. The event was a huge success, offering participants excellent opportunities to network, share ideas, and collaborate on innovative global health solutions.</p>
        <a href="#" class="main-color fw-semi-bold mb-2">View Article</a>
    </div>
    <div class="row conference_banner_images gap-3" data-aos="zoom-in-up">
        <div class="col-md-12">
            <img src="{{asset('app-assets/images/frontend/al4gh_banner.svg')}}" alt="">
        </div>
    </div>
    <div class=" my-2 conference_images gap-2 mb-5">
        <div class=" p-md-0" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/al4gh_1.svg')}}" alt="">
        </div>
        <div class=" p-md-0" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/al4gh_2.svg')}}" alt="">
        </div>
        <div class=" p-md-0" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/al4gh_3.svg')}}" alt="">
        </div>
        <div class=" p-md-0" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/al4gh_4.svg')}}" alt="">
        </div>
    </div>
</div>
@endsection