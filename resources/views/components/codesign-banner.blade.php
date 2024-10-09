<div class="row my-2 mt-md-5">
    <div class="col-md-3">
        <div class="timeline-section" data-aos="fade-right">
            <h3 class="text-start fw-bold main-color">Highlights</h3>
            <div class="timeline">
                @forelse ($groupedHighlightsArray as $key=>$groupedHighlightsArr)
                    <div class="timeline-item">
                        <div class="timeline-day">
                            <a href="{{route('gallery.conferences',['slug'=>$slug,'day'=>$key])}}">{{$key}}</a>
                            <div class="mx-3 timeline-content">
                                @forelse ($groupedHighlightsArr as $day)
                                    <p class="mb-0">{{$day['heading']}}</p>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
    <div class="col-md-9" data-aos="fade-left">
        <img src="{{$headerContent['bannerImage']}}" class="w-100" alt="">
        <div class="row mt-3" id="banner-text-row">
            <div class="col-md-12"><h2 class="ff-main main-color fw-bold">{{$headerContent['heading']}}</h2></div>
            <div class="col-md-12">
                <p class="ff-main text-clr fw-normal">{!!$headerContent['description']!!}</p>
            </div>
        </div>
    </div>
</div>
@section('custom-js')
    <script>
        $(document).ready(function () {
            $('#banner-text-row').find('.col-md-12 p').addClass('ff-main text-clr fw-normal')
        });
    </script>
@endsection