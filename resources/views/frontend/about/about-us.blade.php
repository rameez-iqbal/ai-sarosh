@extends('frontend.layout.master')
@section('page-title', 'About Us')
@section('content')
<div class="container">
    {{view('frontend.components.social-links')}}
    <x-breadcrumb
    :backLink="$backLink"
    homeText="Home"
    :breadcrumbItems="$breadcrumbItems"
    />
    @inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')
    <x-banner-component
    :title="$obj->getAboutUsBanner()->heading"
    :description="$obj->getAboutUsBanner()->description"
    :image="Storage::url('home/'.$obj->getAboutUsBanner()->image)"
    />
</div>


    <section id="bg-about" style="background:#BBBFFF" class="py-5" data-aos="zoom-in-up">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6">
                    <h3 class="ai-sarosh-stands-for fw-bold ff-main text-end main-color">
                        What does AI-Sarosh stand for?
                    </h3>
                    <p class="ff-main fw-normal text-align-justify text-color">The name “AI-Sarosh” derives from a persian word “Sarosh” which means <span class="fw-bold"> voice of heaven </span> or <span class="fw-bold"> an angel and </span> AI means Artificial Intelligence. The logo embodies a <span class="fw-bold"> supportive embrace </span> that could be between close relations like that of a mother and child, father and child or partners. Digital technologies are the future now and ethical AI gives us the ability to learn, reason and problem solve the pertinent challenges in the world. Hence, AI-Sarosh!</p>
                </div>
            </div>
            <div class="row">
                <h3 class="fw-bold ff-main main-color">Who Are We ?</h3>
                <p class="ff-main fw-normal text-align-justify">
                    AI-Sarosh, funded by and part of the larger AI4GH project by the International Development Research Centre (IDRC),  is a collaborative knowledge hub led by PHC Global and GTA Foundation, based in Pakistan and Nepal respectively. As implementing partners, we aim to build an AI-powered platform designed to revolutionize access to SRMH resources and services in South Asia. This platform will make use of AI to improve services in Bangladesh, Sri Lanka, Nepal and Pakistan to help educate patients and healthcare providers and assist in the development of informed decision-making and policy. We focus on delivering an easy-to-use user experience that allows anyone, no matter their technological skill level, to use our platform and all its services.
                </p>
                <p class="ff-main fw-normal text-align-justify">
                    Through this platform, AI-Sarosh aims to provide evidence-based solutions that make use of AI technology to identify potential opportunities to facilitate or aid the existing programs, or develop newer programs improving quality and access to services, improving client knowledge, and engaging in meaningful ways to improve SRMH in South Asia. We work with a multidisciplinary approach by awarding and managing projects that leverage AI innovations to address key challenges in SRMH in South Asia. Moreover, our knowledge hub provides an platform to promote knowledge sharing on the use of AI for SRMH between countries in South Asia and different regions across the globe.
                </p>
                <p class="ff-main fw-normal text-align-justify">
                    We believe that this unique initiative, supported by our dynamic and passionate team of professionals, will go a long way toward helping us address some of the pressing issues concerning SRMH issues in South Asia and pave the way for the development of better health care solutions for this vulnerable population.
                </p>
                <p class="ff-main fw-normal text-align-justify">
                    We have provided nine grants to different organizations across the region to innovative AI solutions for improving access, quality, and equity of SRMH care. 
                </p>
            </div>
        </div>
        <img id="about-us-bottom" src="{{asset('app-assets/images/frontend/about_us_bottom.svg')}}" alt="">
    </section>

    <section id="thematic-areas" class="my-5">
        <div class="container">
            <div class="row">
                <h2 class="fw-bold fw-main text-center main-color heading-font-size">Thematic Areas</h2>
            </div>
            <div class="row my-3 my-md-5 gap-3 gap-md-4 justify-content-center" id="areas">
                @foreach($obj->getThematicAreas() as $thematicArea)
                    <x-service
                    columns="col-md-5" 
                    title="{{$thematicArea['title']}}" 
                    description="{{$thematicArea['description']}}" 
                    image="{{asset('storage/services/'.$thematicArea['image'])}}" 
                    />
                @endforeach
              
            </div>
        </div>
    </section>

    <section id="more-about-us" class="py-md-5" style="background: #FFDBCC" data-aos="zoom-in-up">
        <div class="container">
            <div class="row py-3">
                <h2 class="ff-main fw-normal main-color heading-font-size text-center mb-0">More About Us</h2>
            </div>
            <div class="row my-md-3">
                <h2 class="ff-main fw-bold main-color heading-font-size text-center">AI to improve SRMH service access, quality, and outcomes</h2>
            </div>
            <div class="row">
                <p class="fw-normal text-clr para-font-size text-align-justify">
                    The past two decades have seen a surge in discussion and utilization of digital systems, and Artificial Intelligence (AI) in health. Various AI innovations have been designed and tested to address the gaps and challenges in health systems delivery with a focus on SRMH. The potential to enhance health worker capacity and efficiency is undoubtedly invaluable. Hence, AI has begun to create change in healthcare across developed markets and has the potential to drive game-changing improvements for underserved communities in global health.
                </p>
                <p class="fw-normal text-clr para-font-size text-align-justify">
                    Therefore, the goal for AI-Sarosh is to organize and direct the efforts of specialty companies, academic institutions, research organizations, and information technology firms to catalyze responsible Artificial Intelligence innovations to improve SRMH outcomes. There is also a strong need to improve knowledge sharing on AI innovations for SRMH across the regions and globally to ensure targeted actions to improve SRMH.
                </p>
            </div>
            <div class="row py-md-4">
                <h2 class="ff-main fw-bold main-color heading-font-size text-center">AI Solutions in Health</h2>
            </div>
            <div class="row">
                <p class="fw-normal text-clr para-font-size text-align-justify">The USAID Framework to evaluate AI solutions for health, and the WHO Framework for AI training validation and evaluation are referred to as part of generating evidence in South Asia. We encourage the interested organization to understand the frameworks and suggest ways to use and application of solutions in their proposals.</p>
            </div>
        </div>
    </section>
@endsection