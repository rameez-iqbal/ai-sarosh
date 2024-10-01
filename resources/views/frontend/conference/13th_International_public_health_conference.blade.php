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
        <h1 class="ff-main main-color my-5 text-center fw-bold">13th International Public Health Conference</h1>
        <p class="main-color fw-normal text-align-justify"><span class="fw-bold">Dr. M. Imran Khan</span> introduced AI-Sarosh, a South Asian knowledge hub leveraging AI to tackle SRMH-related health challenges, at the 13th International Public Health Conference at the Health Services Academy in <span class="fw-bold"> Islamabad, Pakistan. </span> He thanked IDRC, Canada, and highlighted nine AI-driven initiatives focused on adolescent health, pregnancy risk prediction, gestational diabetes diagnosis and treatment, fetal ultrasound quality, cervical screening, early maternal depression identification, and overall maternal health.</p>
        <a href="#" class="main-color fw-semi-bold mb-2">View Linkedin Post</a>
    </div>
    <div class="row conference_banner_images gap-3 ">
        <div class="col-md-12" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/phc_conference_banner.png')}}" alt="">
        </div>
    </div>
    <div class=" my-2 health_conference_images gap-2">
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/phc_conference_1.png')}}" class="international-public-images w-100" alt="">
        </div>
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/phc_conference_2.png')}}" class="international-public-images w-100" alt="">
        </div>
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/phc_conference_3.png')}}" class="international-public-images w-100" alt="">
        </div>
    </div>
</div>
@endsection