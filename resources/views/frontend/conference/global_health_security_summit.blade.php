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
        <h1 class="ff-main main-color my-5 text-center fw-bold">Global Health Security Summit: Islamabad</h1>
        <p class="main-color fw-normal text-align-justify">The Global Health Security Agenda (GHSA) is a global effort to create strong and resilient public health systems capable of preventing, detecting, and responding to infectious disease threats worldwide. Over 70 countries, including Pakistan have signed themselves as a signatory, along with international organizations, NGOs, and private sector companies, have joined the GHSA framework to achieve a vision of a world safe from global health threats. Global Health Security Summit 2024 was held in Islamabad from January 10-11, 2024. 
            Dr. Imran Khan was invited to the summit to talk about <span class="fw-bold"> Artificial Intelligence and Global Health Security: the potential of AI to improve global responses to future epidemics.</span></p>
        <a href="#" class="main-color fw-semi-bold">View Article</a>
    </div>
    <div class="row my-2 gap-2 justify-content-center ghss-banner">
        <div class="col-md-12" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/gss1.svg')}}" alt="">
        </div>
        <div class="col-md-12" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/gss2.svg')}}" alt="">
        </div>
        <div class="col-md-12" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/gss3.svg')}}" alt="">

        </div>
    </div>
    <div class="conference_images g-3 ghss-images mb-5 my-2 gap-2">
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/gss4.svg')}}" alt="">
        </div>
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/gss5.svg')}}" alt="">
        </div>
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/gss6.svg')}}" alt="">
        </div>
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/gss7.svg')}}" alt="">
        </div>
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/gss8.svg')}}" alt="">
        </div>
        <div class="" data-aos="zoom-in-up">
            <img src="{{asset('app-assets/images/frontend/gss9.svg')}}" alt="">
        </div>
    </div>
</div>
@endsection