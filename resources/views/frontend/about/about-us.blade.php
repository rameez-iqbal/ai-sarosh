@extends('frontend.layout.master')
@section('page-title', 'About Us')
@section('custom-css')
<style>
    /* #left-icon {
        position: absolute;
        right: 0px;
        height: 22px;
        top: 5%;
    }
    #right-icon {
        position: absolute;
        top: 34%;
        left: 0px;
        height: 22px;
    } */
    @media(min-width:1024px) {
        #left-icon {
            position: absolute;
            right: -50px;
            height: 22px;
            top: 4%;
        }
        #right-icon {
            position: absolute;
            top: 35%;
            left: -60px;
            height: 22px;
        }
        .ai-sarosh-stands-for {
            font-size: 24px !important;
        }
    }
</style>
@endsection
@section('content')
<div class="container">
    {{view('frontend.components.social-links')}}
    <x-breadcrumb
    :backLink="$backLink"
    homeText="Home"
    :breadcrumbItems="$breadcrumbItems"
    />
    @inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')
    @if(!is_null($obj->getAboutUsBanner()))
        <x-banner-component
        :title="$obj->getAboutUsBanner()?->heading"
        :description="$obj->getAboutUsBanner()?->sub_heading"
        :image="asset('storage/home/'.$obj->getAboutUsBanner()?->image)"
        />
    @endif
</div>


    <section id="bg-about" style="background:#BBBFFF" class="py-5" data-aos="zoom-in-up">
        <img id="left-icon" class="d-none d-lg-block" src="{{asset('app-assets/images/frontend/left.png')}}" alt="">
        <img id="right-icon" class="d-none d-lg-block" src="{{asset('app-assets/images/frontend/right.png')}}" alt="">


        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-5">
                    <h3 class="ai-sarosh-stands-for fw-bold ff-main text-end main-color">
                        What does AI-Sarosh stand for?
                    </h3>
                    <p class="ff-main fw-normal text-align-justify blue-clr sarosh-desc">The name “AI-Sarosh” derives from a persian word “Sarosh” which means <span class="fw-bold"> voice of heaven </span> or <span class="fw-bold"> an angel and </span> AI means Artificial Intelligence. The logo embodies a <span class="fw-bold"> supportive embrace </span> that could be between close relations like that of a mother and child, father and child or partners. Digital technologies are the future now and ethical AI gives us the ability to learn, reason and problem solve the pertinent challenges in the world. Hence, AI-Sarosh!</p>
                </div>
            </div>
            @if(!is_null($obj->getAboutUsBanner()))
                <div class="row" id="who-are-we">
                    <h3 class="fw-bold ff-main main-color mb-3">Who Are We ?</h3>
                    {!!$obj->getAboutUsBanner()?->description !!}
                </div>
            @endif
        </div>
        <img id="about-us-bottom" src="{{asset('app-assets/images/frontend/about_us_bottom.svg')}}" alt="">
    </section>
    @if(count($obj->getThematicAreas())>0)
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
    @endif

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

@section('custom-js')
<script>
    $(document).ready(function () {
        $('#who-are-we').find('p').addClass('ff-main fw-normal text-align-justify blue-clr sarosh-desc');
    });
</script>
@endsection