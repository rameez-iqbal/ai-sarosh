@extends('frontend.layout.master')
@section('page-title', 'Webinars')
@section('content')
@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')

    <div class="container">
        {{ view('frontend.components.social-links') }}
        <x-breadcrumb :backLink="$backLink" homeText="Home" :breadcrumbItems="$breadcrumbItems" />
    </div>
    <section id="webinars" class="my-4 my-md-5">
        <div class="container">
            <div class="row my-3 my-md-5" data-aos="zoom-in-up">
                <h1 class="ff-main text-center main-color fw-bold">Webinars</h1>
            </div>
            <div class="row gy-4">
                @forelse ($obj->getWebinars() as $webinar)
                    <x-webinars
                    :webinarTitle="$webinar->title"
                    :webinarImg="asset('storage/webinars/'.$webinar->image)"
                    :webinarCreationDate="editDate($webinar->webinar_date)"
                    columns="col-md-4"
                    :href="$webinar->redirect_url"
                    />
                    
                @empty
                    <h3>No Webinar Found</h3>
                @endforelse
                {{-- <x-webinars
                webinarTitle="Webinar on AI-Sarosh 2023 Grant Cycle-full Proposal Development"
                webinarImg="app-assets/images/frontend/grant_cycle.svg"
                webinarCreationDate="12/May/2023"
                columns="col-md-4"
                href="https://www.youtube.com/watch?v=f4FW4Ug4W1w"
                />
                <x-webinars
                webinarTitle="Mindful Motherhood: How South Asia is coping with Perinatal Depression"
                webinarImg="app-assets/images/frontend/motherhood.svg"
                webinarCreationDate="15/May/2023"
                columns="col-md-4"
                href="https://www.youtube.com/watch?v=4W9ROoajYXs"
                />
                <x-webinars
                webinarTitle="Reviewers webinar for AI-Sarosh proposal evaluation"
                webinarImg="app-assets/images/frontend/reviewers.svg"
                webinarCreationDate="8/June/2023"
                columns="col-md-4"
                href="https://www.youtube.com/watch?v=nyLCcXvOBIs"
                />
                <x-webinars
                webinarTitle="Grantee Co-design workshop"
                webinarImg="app-assets/images/frontend/grantee.svg"
                webinarCreationDate="8/June/2023"
                columns="col-md-4"
                href="https://www.youtube.com/watch?v=IjQavz12SHs"
                /> --}}
            </div>
        </div>
    </section>
@endsection
