@extends('frontend.layout.master')
@section('page-title', 'Gallery')
@section('content')
    <div class="container">
        {{ view('frontend.components.social-links') }}
        <x-breadcrumb :backLink="$backLink" homeText="Home" :breadcrumbItems="$breadcrumbItems" />
    </div>
    <?php
    $galleries = 
    [
        [
            'image'=>'app-assets/images/frontend/codesign.png',
            'name'=>'Co-Design Workshop',
            'columns'=>'col-md-4',
            'href'=>"codesign"
        ],
        [
            'image'=>'app-assets/images/frontend/women_deliever.png',
            'name'=>'Women Deliver Conference’23',
            'columns'=>'col-md-4',
            'href'=>'wdc'
        ],
        [
            'image'=>'app-assets/images/frontend/public_health_conference.png',
            'name'=>'13th International Public Health Conference',
            'columns'=>'col-md-4',
            'href'=>'PHCConference'
        ],
        [
            'image'=>'app-assets/images/frontend/canadian_conference.png',
            'name'=>'2023 Canadian Conference',
            'columns'=>'col-md-4',
            'href'=>'canadianConference'
        ],
        [
            'image'=>'app-assets/images/frontend/global_health_security.png',
            'name'=>'Global Health Security Summit',
            'columns'=>'col-md-4',
            'href'=>'ghssconference'
        ],
        [
            'image'=>'app-assets/images/frontend/al4gh.png',
            'name'=>'AI4GH in Kenya',
            'columns'=>'col-md-4',
            'href'=>'al4gh'
        ]
    ]; 
    ?>
    <section id="articles" class="my-4 my-md-5">
        <div class="container">
            <div class="row my-3 my-md-5">
                <h1 class="ff-main text-center main-color fw-bold">Gallery</h1>
            </div>
            <div class="row g-3 g-md-5 justify-content-center">
                @foreach ($galleries as $gallery)
                    <x-vertical-card 
                    image="{{$gallery['image']}}"
                    name="{{$gallery['name']}}"
                    columns="{{$gallery['columns']}}"
                    href="{{$gallery['href']}}"
                    />
                @endforeach
            </div>
        </div>
    </section>
@endsection