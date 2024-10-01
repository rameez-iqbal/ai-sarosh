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
        <h1 class="ff-main main-color my-5 text-center fw-bold">Canadian Conference on Global Health 2023</h1>
        <p class="main-color fw-normal text-align-justify">The Canadian Conference on Global Health is an annual event that unites researchers, practitioners, policymakers, and students to discuss global health issues. The 2023 conference, themed <span class="fw-bold"> "From Rhetoric to Action: Moving Policy, Research, and Practice," </span> was held both in person and virtually from <span class="fw-bold"> October 16-18 </span>  at the <span class="fw-bold"> Westin Ottawa in Ottawa, Ontario. </span></p>
        <a href="#" class="main-color fw-semi-bold">View Article</a>
    </div>
    <div class=" conference_images my-5 gap-2">
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/canadian_conference_1.png')}}" alt="">
        </div>
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/canadian_conference_2.png')}}" alt="">
        </div>
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/canadian_conference_3.png')}}" alt="">
        </div>
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/canadian_conference_4.png')}}" alt="">
        </div>
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/canadian_conference_5.png')}}" alt="">
        </div>
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/canadian_conference_6.png')}}" alt="">
        </div>
        
    </div>
</div>
@endsection