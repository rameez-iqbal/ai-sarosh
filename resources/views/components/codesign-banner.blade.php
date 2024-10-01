<div class="row my-2 mt-md-5">
    <div class="col-md-3">
        <div class="timeline-section"  data-aos="fade-right">
            <h3 class="text-start fw-bold main-color">Highlights</h3>
            <div class="timeline">
                <!-- Day 1 -->
                <div class="timeline-item">
                    <div class="timeline-day">
                        <a href="{{route('codesign')}}">Day 1</a>
                        <div class="mx-3 timeline-content">
                            <p class="mb-0">Opening</p>
                            <p class="mb-0">Team Building</p>
                        </div>
                    </div>
                    
                </div>

                <!-- Day 2 -->
                <div class="timeline-item">
                    <div class="timeline-day">
                        <a href="{{route('codesign.day2')}}">Day 2</a>
                        <div class="mx-3 timeline-content">
                            <p class="mb-0">Panel Discussion</p>
                            <p class="mb-0">Speaker Series</p>
                            <p class="mb-0">Award Ceremony</p>
                        </div>
                    </div>
                </div>

                <!-- Day 3 -->
                <div class="timeline-item">
                    <div class="timeline-day">
                        <a href="{{route('codesign.day3')}}">Day 3</a>
                        <div class="mx-3 timeline-content">
                            <p class="mb-0">Co-Design Session</p>
                            <p class="mb-0">Press Conference</p>
                        </div>
                    </div>
                </div>

                <!-- Day 4 -->
                <div class="timeline-item">
                    <div class="timeline-day">
                        <a href="{{route('codesign.day4')}}">Day 4</a>
                        <div class="mx-3 timeline-content">
                            <p class="mb-0">Speaker Series</p>
                            <p class="mb-0">Discussion Session</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8" data-aos="fade-left">
        <img src="{{asset('app-assets/images/frontend/co_design_banner.png')}}" class="w-100" alt="">
        <div class="row mt-3">
            <div class="col-md-12"><h2 class="ff-main main-color fw-bold">Co-Design Workshop</h2></div>
            <div class="col-md-12">
                <p class="ff-main text-clr fw-normal">The workshop was conducted to bring together the grantees and the AI-Sarosh Secretariat with the aim of knowledge sharing, cross-learning, improve design and strategies for achieving project objectives, and ensure that data collection was in alignment with AI-Sarosh's overarching vision.</p>
            </div>
            <h2 class="ff-main main-color fw-bold text-center mt-md-5">{{$day}}</h2>
        </div>
    </div>
</div>