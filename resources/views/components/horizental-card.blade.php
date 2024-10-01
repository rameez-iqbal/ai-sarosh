<div class="col-md-12" data-aos="zoom-in-up">
    <div class="card mb-3 border-0">
        <div class="row @if($type=="report") gap-4 @endif">
            <div class="{{$imageCol}}">
                <img src="{{$image}}" class="img-fluid rounded-start article-img" alt="no-article-img">
            </div>
            <div class="{{$textCol}}">
                <div class="card-body @if($type=="report") p-md-t @endif">
                    <h2 class="card-title ff-main mb-md-3"><a href="{{$href}}"  target="_blank" class="fs-md-30 fs-24 @if($type=="report") main-color text-decoration-none @else blk-clr @endif">{{$title}}</a></h2>
                    <h3 class="card-text fw-normal @if($type=="report") py-2 main-color mb-0 @endif">{{$owner}}</p>
                    <h4 class="card-text main-color fw-lightr line-height-27 @if($type=="report") para-font-size main-color @endif">{{$date}}</h5>
                    @if($type=="report")
                        <div class="row py-md-4">
                            <a href="{{$href}}" class="main-btn" target="_blank">Download Report</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>