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
        <h1 class="ff-main main-color my-5 text-center fw-bold">Women Deliver Conference 2023</h1>
        <p class="fw-normal text-align-justify main-color "> <span class="fw-bold"> Dr. Noor-us-Sabah,</span> represented Pakistan as a speaker at Women Deliver Conference’23.  She is a SRMH expert in our technical team and a public health professional from Balochistan with degrees from Bolan Medical Degree College, Quetta, and Johns Hopkins. As Director Technical with PHC Global Pakistan, she showcased the knowledge hub for reproductive and maternal health in South Asia, promoting AI-developed solutions informed by local data and experiences. She emphasized the need for more women in tech, noting that only 28% of the global AI workforce are women. The WDC 23 Conference in <span class="fw-bold"> Kigali, Rwanda, </span> saw over 6000 participants discussing health, education, and reproductive rights.</p>
        <a href="#" class="main-color fw-semi-bold">View Article</a>
    </div>
    <div class="row justify-content-center my-3" data-aos="zoom-in-up">
        <div class="col-md-8">
            <img src="{{asset('app-assets/images/frontend/wdc.svg')}}" class="w-100" alt="">
            <h2 class="ff-main fw-bold main-color text-center my-4">Dr. Noor-us-Sabah Rakhshani in WDC 2023</h2>
        </div>
    </div>
    
</div>
@endsection