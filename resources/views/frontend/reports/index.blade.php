@extends('frontend.layout.master')
@section('page-title', 'Reports')
@section('content')
<div class="container">
    {{view('frontend.components.social-links')}}
    <x-breadcrumb
    :backLink="$backLink"
    homeText="Home"
    :breadcrumbItems="$breadcrumbItems"
    />
</div>

@inject('obj', 'App\Http\Controllers\FrontEnd\FrontEndController')

<section id="reports">
    <div class="container">
        <div class="row" data-aos="zoom-in-up">
            <h2 class="ff-main fw-bold main-color heading-font-size text-center fs-md-48">Reports</h2>
            <div class="text-center d-flex justify-content-center">
                <h3 class="sub-heading-font-size ff-main fw-normal main-color text-center py-2 set-reports-desc-width">We have documented the events held by AI-Sarosh. To read the reports, download the PDF files below.</h3>

            </div>
        </div>
        <div class="row my-md-5 gap-md-5" id="report-list">
            @foreach($obj->getReports() as $report)
                <x-horizental-card
                    image="{{$report['image']}}"
                    href="{{$report['href']}}"
                    title="{{$report['title']}}"
                    owner="{{$report['owner']}}"
                    date="{{$report['date']}}"
                    imageCol="{{$report['imageCol']}}"
                    textCol="{{$report['textCol']}}"
                    type="{{$report['type']}}"
                />
            @endforeach
        </div>
    </div>
</section>
@endsection