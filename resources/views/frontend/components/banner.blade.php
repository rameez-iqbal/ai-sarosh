@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')
@if(!is_null($obj->getProjectBanner()))
    <div class="row mb-5 justify-content-between" data-aos="zoom-in-up">
        <div class="col-md-6" id="set-margin-top">
            <h1 class="main-heading">{{$obj->getProjectBanner()->heading}}</h1>
            <p class="project-banner-text fw-normal  main-color w-75">{{$obj->getProjectBanner()->description}}</p>
        </div>
        <div class="col-md-6 text-end">
            <img src="{{asset('storage/home/'.$obj->getProjectBanner()->image)}}"  class="map-image w-100" alt="">
        </div>
    </div>
@endif