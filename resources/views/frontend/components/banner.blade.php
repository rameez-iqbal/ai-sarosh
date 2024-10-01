@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')

<div class="row mb-5" data-aos="zoom-in-up">
    <div class="col-md-6" id="set-margin-top">
        <h1 class="main-heading">{{$obj->getProjectBanner()->heading}}</h1>
        <p class="project-banner-text fw-normal  main-color">{{$obj->getProjectBanner()->description}}</p>
    </div>
    <div class="col-md-5 offset-md-1">
        <img src="{{url('storage/home/'.$obj->getProjectBanner()->image)}}"  class="map-image" alt="">
    </div>
</div>