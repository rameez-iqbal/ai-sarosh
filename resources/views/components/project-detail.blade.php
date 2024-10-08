<section id="details-section project-{{$id}}" class="p-3 p-md-5" style="background-color: {{$bgColor}};border-bottom:1px solid #000">
    <div class="container">
        <div class="row details">
            <div class="col-md-12 details-logo" data-aos="fade-right">
                <img src="{{$logo}}" alt="" >
            </div>
            <div class="col-md-6" data-aos="fade-right">
                <div class="row">
                    <div class="col-md-12 desc-row">
                        @if($type == 'text')
                        <p class="main-color ff-main detail-desc fw-bold text-align-justify">{{$title}}</p>
                        @elseif($type=='bullets')
                        <?php $titles = json_decode($title,true);?>
                            <ul>
                                @foreach( $titles as $title )
                                    <li class="main-color ff-main detail-desc fw-bold text-align-justify">{{$title}}</li>
                                @endforeach
                            </ul>
                        @endif 
                    </div>
                </div>
                <div class="row personal-info">
                    @if($piName!='' || !empty($piName))
                        <div class="col-md-6 personal-info-col">
                            <span class="mb-0 fw-bolder ff-main main-color">PI'Name :</span>
                            <span class="mb-0 fw-bold ff-main main-color">{{$piName}}</span>
                        </div>
                    @endif
                    @if($coPiName!='' || !empty($coPiName))
                        <div class="col-md-6 personal-info-col">
                            <span class="mb-0 fw-bolder ff-main main-color">Co-PI Name :</span>
                            <span class="mb-0 fw-bold ff-main main-color">{{$coPiName}}</span>
                        </div>
                    @endif
                </div>
                <div class="row project-detail my-2 my-md-3">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 p-0 p-md-2">
                                <div class="timelines d-flex gap-2 gap-md-4">
                                    <div class="left">
                                        <img src="{{asset('app-assets/images/frontend/timeline.svg')}}" alt="timeline.svg">
                                    </div>
                                    <div class="right">
                                        <span class="detail-heading ff-main fw-bold">Project Timeline:</span>
                                        <span class="detail-description fw-semi-bold ff-main">{{$projectTimeline}}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 my-3">
                        <div class="row">
                            <div class="col-md-12 p-0 p-md-2">
                                <div class="timelines d-flex  p-0 gap-2 gap-md-4 align-items-center">
                                    <div class="left">
                                        <img src="{{asset('app-assets/images/frontend/project_team.svg')}}" alt="">
                                    </div>
                                    <div class="right">
                                        <span class="detail-heading ff-main fw-bold">Project Team:</span>
                                        <span class="detail-description fw-semi-bold ff-main">{!! $projectTeam !!}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 my-3">
                        <div class="row">
                            <div class="col-md-12 p-0 p-md-2">
                                <div class="timelines d-flex gap-2 gap-md-4 align-items-center">
                                    <div class="left">
                                        <img src="{{asset('app-assets/images/frontend/flag.svg')}}" alt="">
                                    </div>
                                    <div class="right">
                                        <span class="detail-heading ff-main fw-bold">Country of the project implementation :</span>
                                        <span class="detail-description fw-semi-bold ff-main"> {{$country}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="row">
                            <div class="col-md-12 p-0 p-md-2">
                                <div class="timelines d-flex gap-2 gap-md-4 align-items-center">
                                    <div class="left">
                                        <img src="{{asset('app-assets/images/frontend/building.svg')}}" alt="">
                                    </div>
                                    <div class="right">
                                        <span class="detail-heading ff-main fw-bold">Organization:</span>
                                        <span class="detail-description fw-semi-bold ff-main">{{$organization}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="row">
                            <div class="col-md-12 p-0 p-md-2">
                                <div class="timelines d-flex gap-2 gap-md-4 align-items-center">
                                    <div class="left">
                                        <img src="{{asset('app-assets/images/frontend/world.svg')}}" alt="">
                                    </div>
                                    <div class="right">
                                        <span class="detail-description fw-semi-bold ff-main">{{$website}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mx-md-4" data-aos="fade-left">
                <div class="d-flex flex-column align-items-end">
                    <img src="{{$profileImage}}" alt="" class="profile_img mt-md-5">
                </div>
                <div class="row mx-md-4">
                    <div class="col-md-12 my-2 my-md-3  p-0  text-center">
                        <img src="{{$countryFlag}}" alt="" class="">
                        <span class="fw-semi-bold text-clr ff-main">{{$userName}}</span>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-11 p-0 p-md-2">
                <h3 class="fw-bolder ff-main main-color">About the Project:</h3>
                <p class="fw-normal ff-main text-clr text-align-justify">{!! $aboutProject !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 p-0 p-md-2">
                <span class="fw-normal ff-main blk-clr">*PI = Principal Investigator</span>
            </div>
            <div class="col-md-5 p-0 p-md-2">
                <span class="fw-normal ff-main blk-clr">*Co-PI = Co-Principal Investigator</span>
            </div>
        </div>
    </div>
</section>