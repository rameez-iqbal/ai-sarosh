@extends('frontend.layout.master')
@section('page-title', 'Co Design Workshop Day 3')
@section('content')
    <div class="container">
        {{ view('frontend.components.social-links') }}
        <x-breadcrumb :backLink="$backLink" homeText="Home" :breadcrumbItems="$breadcrumbItems" />
        <x-codesign-banner day="Day 3" />
      
     

    <div class="row mb-3 my-md-2 g-3" id="codesign_images">
        <h2 class="ff-main main-color fw-normal text-center mt-md-0">Co-Design Session</h2>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_cds_1.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_cds_2.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_cds_3.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_cds_4.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_cds_5.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_cds_6.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_cds_7.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_cds_8.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_cds_9.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_cds_10.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_cds_11.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_cds_12.png') }}" alt="">
        </div>
       
    </div>

    <div class="row my-md-5 g-3 mb-5" id="codesign_images">
        <h2 class="ff-main main-color fw-normal text-center mt-md-0">Press Conference</h2>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_pc_1.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_pc_2.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_pc_3.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_pc_4.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_pc_5.png') }}" alt="">
        </div>
        <div class="col-md-4" data-aos="zoom-in-up">
            <img src="{{ asset('app-assets/images/frontend/cdw_pc_6.png') }}" alt="">
        </div>
    </div>
  

</div>
@endsection
