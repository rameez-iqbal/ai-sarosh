@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')
<section id="banner-section">
    <div class="container">
        <div class="row icons-row d-flex justify-content-center">
            <div class="col-md-6 d-flex justify-content-center">
                <div class="gap-3 gap-md-5 d-flex flex-row" data-aos="fade-up">
                    <img src="{{ asset('app-assets') }}/images/frontend/mother_care.svg" data-src="{{ asset('app-assets') }}/images/frontend/mother_care.svg" alt="">
                    <img src="{{ asset('app-assets') }}/images/frontend/heart.svg" data-src="{{ asset('app-assets') }}/images/frontend/heart.svg" alt="">
                    <img src="{{ asset('app-assets') }}/images/frontend/care.svg" data-src="{{ asset('app-assets') }}/images/frontend/care.svg" alt="">
                    <img src="{{ asset('app-assets') }}/images/frontend/ovel.svg" data-src="{{ asset('app-assets') }}/images/frontend/ovel.svg" alt="">
                    <img src="{{ asset('app-assets') }}/images/frontend/users.svg" data-src="{{ asset('app-assets') }}/images/frontend/users.svg" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 banner-content mx-auto" >
                <h1 class="main-heading text-center ff-bv-serif" data-aos="zoom-in-up">{{$obj->homeBannerSectionData()->heading}}</h1>
                <h1 class="banner-al-sarosh-content text-center" data-aos="zoom-in-up">{{$obj->homeBannerSectionData()->sub_heading}}</h1>
            </div>
        </div>
        <div class="row" data-aos="zoom-in-up">
            <div class="col-md-11 about-banner-al-sarosh mx-auto">
                <p class="main-para mb-0 about-al-sarosh-artificial">{{$obj->homeBannerSectionData()->description}}</p>
            </div>
        </div>
        <div class="row" id="image-section">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{asset('app-assets/images/frontend/vision_mission.webp')}}" class="w-100" alt="">
                        {{-- <img src="{{ asset('storage/home/' . $obj->homeBannerSectionData()->image) }}" class="img-fluid" data-src="{{ asset('storage/home/' . $obj->homeBannerSectionData()->image) }}" alt=""> --}}
                    </div>
                </div>
                <div class="row vision-mission-row">
                    @forelse ($obj->getVisionMission() as $vision_mission)
                        <div class="custom-card"  data-aos="zoom-in-up">
                            <div class="d-flex flex-column card-content">
                                <h1 class="heading mb-0 text-center fw-normal">{{$vision_mission->heading}}</h1>
                                <p class="mission-vision-text mb-0 fw-normal">{{$vision_mission->description}}</p>
                            </div>
                        </div>
                    @empty
                        <h3>No Banner Image</h3>
                    @endforelse
                </div>
            </div>
            
        </div>
</div>
</section>