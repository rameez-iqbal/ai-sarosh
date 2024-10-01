@extends('frontend.layout.master')
@section('page-title', 'Co Design Workshop Day 1')
@section('content')
<div class="container">
    {{view('frontend.components.social-links')}}
    <x-breadcrumb
    :backLink="$backLink"
    homeText="Home"
    :breadcrumbItems="$breadcrumbItems"
    />
    <x-codesign-banner day="Day 1" />
        
        <div class="row mb-3 my-md-2 g-3" id="codesign_images">
            <h2 class="ff-main main-color fw-normal text-center mt-md-0">Team Building Activity</h2>
            <div class="col-md-4" data-aos="zoom-in-up">
                <img src="{{asset('app-assets/images/frontend/cd_tb_1.png')}}" alt="">
            </div>
            <div class="col-md-4" data-aos="zoom-in-up">
                <img src="{{asset('app-assets/images/frontend/cd_tb_2.png')}}" alt="">
            </div>
            <div class="col-md-4" data-aos="zoom-in-up">
                <img src="{{asset('app-assets/images/frontend/cd_tb_3.png')}}" alt="">
            </div>
            <div class="col-md-4" data-aos="zoom-in-up">
                <img src="{{asset('app-assets/images/frontend/cd_tb_4.png')}}" alt="">
            </div>
            <div class="col-md-4" data-aos="zoom-in-up">
                <img src="{{asset('app-assets/images/frontend/cd_tb_5.png')}}" alt="">
            </div>
            <div class="col-md-4" data-aos="zoom-in-up">
                <img src="{{asset('app-assets/images/frontend/cd_tb_6.png')}}" alt="">
            </div>
            <div class="col-md-4" data-aos="zoom-in-up">
                <img src="{{asset('app-assets/images/frontend/cd_tb_7.png')}}" alt="">
            </div>
            <div class="col-md-4" data-aos="zoom-in-up">
                <img src="{{asset('app-assets/images/frontend/cd_tb_8.png')}}" alt="">
            </div>
            <div class="col-md-4" data-aos="zoom-in-up">
                <img src="{{asset('app-assets/images/frontend/cd_tb_9.png')}}" alt="">
            </div>
        </div>
        <div class="row my-md-5 g-3 mb-5" id="codesign_images">
            <h2 class="ff-main main-color fw-normal text-center mt-md-0" data-aos="zoom-in-up">Opening Speach</h2>
            <div class="col-md-4" data-aos="zoom-in-up">
                <img src="{{asset('app-assets/images/frontend/cdw_os_1.png')}}" alt="">
            </div>
            <div class="col-md-4" data-aos="zoom-in-up">
                <img src="{{asset('app-assets/images/frontend/cdw_os_2.png')}}" alt="">
            </div>
            <div class="col-md-4" data-aos="zoom-in-up">
                <img src="{{asset('app-assets/images/frontend/cdw_os_3.png')}}" alt="">
            </div>
            <div class="col-md-4" data-aos="zoom-in-up">
                <img src="{{asset('app-assets/images/frontend/cdw_os_4.png')}}" alt="">
            </div>
            <div class="col-md-4" data-aos="zoom-in-up">
                <img src="{{asset('app-assets/images/frontend/cdw_os_5.png')}}" alt="">
            </div>
            <div class="col-md-4" data-aos="zoom-in-up">
                <img src="{{asset('app-assets/images/frontend/cdw_os_6.png')}}" alt="">
            </div>
           
        </div>
    
</div>
@endsection