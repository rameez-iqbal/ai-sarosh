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
                @endforelse
                
            </div>
        </div>
    </section>
@endsection
