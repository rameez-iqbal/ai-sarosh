@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')

<div class="row mb-5" data-aos="zoom-in-up" >
        <div class="col-md-6" >
            <h1 class="main-heading ff-bv-serif pt-2 pt-md-5">{{$title}}</h1>
            <p class="project-banner-text fw-normal  main-color">{{$description}}</p>
        </div>
        <div class="col-md-5 offset-md-1">
            <img src="{{$image}}"  class="map-image" alt="">
        </div>
    </div>
</div>