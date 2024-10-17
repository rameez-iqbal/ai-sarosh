<div class="col-md-12" data-aos="zoom-in-up">
    <div class="card mb-3 border-0">
        <div class="row gap-4 ">
            <div class="{{$imageCol}}">
                <img src="{{$image}}" class="img-fluid rounded-start article-img" style="border: 1px solid #2b2b2b21" alt="no-article-img">
            </div>
            <div class="{{$textCol}}">
                <div class="card-body p-md-t ">
                    <h2 class="card-title ff-main mb-md-2 fw-bold"><a href="{{$href}}"  target="_blank" class="fs-md-39 set-sm-fs-24 set-sm-fs  main-color text-decoration-none ">{{$title}}</a></h2>
                    <h4 class="card-text fw-normal mb-2 main-color " style="font-weight: 600 !important;">{{$organization}}</h4>
                    <p class="card-text fw-normal main-color mb-0">{!!$description!!}</p>
                    <h4 class="card-text main-color fw-lightr line-height-27 para-font-size main-color">{{$date}}</h5>
                    <div class="row pb-md-4">
                        <a href="{{$reportFile}}" class="main-btn" target="_blank">Download Report</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>