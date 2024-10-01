@extends('frontend.layout.master')
@section('page-title', 'Co Design Workshop Day 4')
@section('content')
    <div class="container">
        {{ view('frontend.components.social-links') }}
        <x-breadcrumb :backLink="$backLink" homeText="Home" :breadcrumbItems="$breadcrumbItems" />
        <x-codesign-banner day="Day 4" />
      
     

    <div class="row mb-3 my-md-2 g-3" id="codesign_images">
        <h2 class="ff-main main-color fw-normal text-center mt-md-0" data-aos="zoom-in-up">Speaker Session</h2>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_ss_1.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_ss_2.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_ss_3.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_ss_4.png') }}" alt="">
        </div>
        
       
    </div>

    <div class="row my-md-5 g-3 mb-5" id="codesign_images">
        <h2 class="ff-main main-color fw-normal text-center mt-md-0">Discussion</h2>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_d_1.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_d_2.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_d_3.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_d_4.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_d_5.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_d_6.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_d_7.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_d_8.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_d_9.png') }}" alt="">
        </div>
    </div>
  

</div>
@endsection
