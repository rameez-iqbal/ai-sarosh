<div class="col-md-12" data-aos="zoom-in-up">
    <div class="card mb-3 border-0">
        <div class="row gap-4 ">
            <div class="{{$imageCol}}">
                <img src="{{$image}}" class="img-fluid rounded-start article-img" alt="no-article-img">
            </div>
            <div class="{{$textCol}}">
                <div class="card-body  p-md-t ">
                    <h2 class="card-title ff-main mb-md-3"><a href="{{$href}}"  target="_blank" class="fs-md-30 fs-24  main-color text-decoration-none ">{{$title}}</a></h2>
                    <h4 class="card-text fw-normal  py-2 main-color mb-0 ">{{$organization}}</h4>
                    <p class="card-text fw-normal  py-2 main-color mb-0 ">{!!$description!!}</p>
                    <h4 class="card-text main-color fw-lightr line-height-27 para-font-size main-color">{{$date}}</h5>
                    <div class="row py-md-4">
                        <a href="{{$reportFile}}" class="main-btn" target="_blank">Download Report</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>