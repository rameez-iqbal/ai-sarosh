@inject('obj', 'App\Http\Controllers\FrontEnd\FrontEndController')
<section id="single-project">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12 text-center" data-aos="zoom-in-up">
                <p class="mb-0 project-more ff-main fw-normal text-white">Click on any project to learn more</p>
            </div>
        </div>
        @if (array_key_exists('Bangladesh',$obj->getProjectsByCountry()) &&  count($obj->getProjectsByCountry()['Bangladesh']) > 0)
            <div class="row our-projects">
                <div class="col-md-12 text-center ">
                    <h1 class="fw-bold ff-main  my-3 my-md-5 text-white" data-aos="zoom-in-up">Our projects in Bangladesh
                    </h1>
                </div>
            </div>
            <div class="row projects-list">
                <div class="col-md-10 offset-md-1 main-list">
                    @foreach ($obj->getProjectsByCountry()['Bangladesh'] as $banglesh_proj)
                        <div class=" card-column" data-aos="zoom-in-up">
                            <div class="bg-image d-flex flex-column justify-content-between px-3" onclick="navigateToProject('project-{{$banglesh_proj->id}}')"
                                style="background-image: url({{ asset('storage/projects/' . $banglesh_proj->image) }});cursor:pointer">
                                <div class="align-self-end mt-3">
                                    <img src="{{ asset('storage/projects/' . $banglesh_proj->logo) }}">
                                </div>
                                <div class="">
                                    <p class="fw-bold ff-main proj-desc text-white">
                                        {{ truncateText($banglesh_proj->title, 14) }}
                                    </p>
                                    <p class="ff-main fw-lightr ceo-name text-white">{{ $banglesh_proj->university }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if (array_key_exists('Pakistan',$obj->getProjectsByCountry()) &&  count($obj->getProjectsByCountry()['Pakistan']) > 0)
            <div class="row pak-projects" data-aos="zoom-in-up">
                <div class="col-md-12 text-center">
                    <h1 class="fw-bold ff-main  my-3 my-md-5 text-white">Our projects in Pakistan</h1>
                </div>
            </div>
            <div class="row projects-list">
                <div class="col-md-10 offset-md-1 main-list">
                    @foreach ($obj->getProjectsByCountry()['Pakistan'] as $pakistan_proj)
                        <div class=" card-column" data-aos="zoom-in-up">
                            <div class="bg-image d-flex flex-column justify-content-between px-3"
                                style="background-image: url({{ asset('storage/projects/' . $pakistan_proj->image) }});cursor:pointer">
                                <div class="align-self-end mt-3">
                                    <img src="{{ asset('storage/projects/' . $pakistan_proj->logo) }}"
                                        style="width:60px;height:60px">
                                </div>
                                <div class="">
                                    <p class="fw-bold ff-main proj-desc text-white">
                                        {{ truncateText($pakistan_proj->title, 13) }}
                                    </p>
                                    <p class="ff-main fw-lightr ceo-name text-white">{{ $pakistan_proj->university }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @if (array_key_exists('Sri Lanka',$obj->getProjectsByCountry()) && count($obj->getProjectsByCountry()['Sri Lanka']) > 0)
            <div class="row srilanka-projects">
                <div class="col-md-12 text-center" data-aos="zoom-in-up">
                    <h1 class="fw-bold ff-main my-3 my-md-5  text-white">Our projects in Sri Lanka</h1>
                </div>
            </div>
            <div class="row projects-list">
                <div class="col-md-10 offset-md-1 main-list">
                    @foreach ($obj->getProjectsByCountry()['Sri Lanka'] as $srilanka_proj)
                        <div class=" card-column" data-aos="zoom-in-up">
                            <div class="bg-image d-flex flex-column justify-content-between px-3"
                                style="background-image: url({{ asset('storage/projects/' . $srilanka_proj->image) }});cursor:pointer">
                                <div class="align-self-end mt-3">
                                    <img src="{{ asset('storage/projects/' . $srilanka_proj->logo) }}"
                                        style="width:60px;height:60px">
                                </div>
                                <div class="">
                                    <p class="fw-bold ff-main proj-desc text-white">
                                        {{ truncateText($srilanka_proj->title, 13) }}
                                    </p>
                                    <p class="ff-main fw-lightr ceo-name text-white">{{ $srilanka_proj->university }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @if (array_key_exists('Nepal',$obj->getProjectsByCountry()) && count($obj->getProjectsByCountry()['Nepal']) > 0)
            <div class="row nepal-projects">
                <div class="col-md-12 text-center" data-aos="zoom-in-up">
                    <h1 class="fw-bold ff-main my-3 my-md-5  text-white">Our projects in Nepal</h1>
                </div>
            </div>
            <div class="row projects-list">
                <div class="col-md-10 offset-md-1 main-list">
                    @foreach ($obj->getProjectsByCountry()['Nepal'] as $nepal_proj)
                        <div class=" card-column" data-aos="zoom-in-up">
                            <div class="bg-image d-flex flex-column justify-content-between px-3"
                                style="background-image: url({{ asset('storage/projects/' . $nepal_proj->image) }});cursor:pointer">
                                <div class="align-self-end mt-3">
                                    <img src="{{ asset('storage/projects/' . $nepal_proj->logo) }}"
                                        style="width:60px;height:60px">
                                </div>
                                <div class="">
                                    <p class="fw-bold ff-main proj-desc text-white">
                                        {{ truncateText($nepal_proj->title, 13) }}
                                    </p>
                                    <p class="ff-main fw-lightr ceo-name text-white">{{ $nepal_proj->university }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

          

    </div>
</section>
