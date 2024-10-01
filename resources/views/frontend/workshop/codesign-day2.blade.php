@extends('frontend.layout.master')
@section('page-title', 'Co Design Workshop Day 2')
@section('content')
    <div class="container">
        {{ view('frontend.components.social-links') }}
        <x-breadcrumb :backLink="$backLink" homeText="Home" :breadcrumbItems="$breadcrumbItems" />
        <x-codesign-banner day="Day 2" />
       
     

    <div class="row mb-3 my-md-2 g-3" id="codesign_images">
        <h2 class="ff-main main-color fw-normal text-center mt-md-0">Panel Discussion</h2>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_pd_1.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_pd_2.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_pd_3.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_pd_4.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_pd_5.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_pd_6.png') }}" alt="">
        </div>
    </div>

    <div class="row my-md-5 g-3 mb-5" id="codesign_images">
        <h2 class="ff-main main-color fw-normal text-center mt-md-0">Grantees Presentation</h2>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_1.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_2.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_3.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_4.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_5.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_6.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_7.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_8.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_9.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_10.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_11.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_12.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_13.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_14.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_15.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_16.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_17.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_gp_18.png') }}" alt="">
        </div>


    </div>
    <div class="row my-md-5 g-3 mb-5" id="codesign_images">
        <h2 class="ff-main main-color fw-normal text-center mt-md-0">Ceremony</h2>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_c_1.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_c_2.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_c_3.png') }}" alt="">
        </div>


    </div>

    </div>
@endsection
