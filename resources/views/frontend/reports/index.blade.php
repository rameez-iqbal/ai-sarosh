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
<?php
    $reports = 
    [
        [
            'image'=>'app-assets/images/frontend/report_ai.png',
            'title'=>'Artificial Intelligence for Sexual and Reproductive Health - South Asia HUB',
            'owner'=>'Co-design workshop report',
            'date'=>"This report contains detailed documentation of the purpose of AI-Sarosh and the 4 - day workshop and presentations that took place in Colombo, Sri Lanka. The sessions and presentations aimed to improve the design of project ideas and Strategies for all grant initiatives, ensuring Alignment with AI Saroshs overarching vision and objectives. The workshop focused on fostering knowledge sharing, facilitating mutual learning, and creating an immersive collaborative environment. ",
            'imageCol'=>'col-md-3',
            'textCol'=>'col-md-8',
            'href'=>'#',
            'type'=>'report'
        ],
        [
            'image'=>'app-assets/images/frontend/report_transforming.png',
            'title'=>'Transforming Healthcare: AI, Public Health and Government Engagement',
            'owner'=>'Panel discussion report',
            'date'=>"The panel discussion brought together experts with diverse backgrounds in healthcare, artificial intelligence (AI), and public health. Dr. Mohammad Imran Khan, a public health expert with experience in research, advocacy, and implementation of effective health interventions in developing nations, moderated the panel. He is the founding executive director at PHC Global and leads the AI-SAROSH Project. The event provided a platform for insightful discussions on leveraging AI and public health efforts to improve healthcare. This report delves into the key takeaways and responses from the panelists. ",
            'imageCol'=>'col-md-3',
            'textCol'=>'col-md-8',
            'href'=>'#',
            'type'=>'report'
        ],
    ];
?>

<section id="reports">
    <div class="container">
        <div class="row" data-aos="zoom-in-up">
            <h2 class="ff-main fw-bold main-color heading-font-size text-center fs-md-48">Reports</h2>
            <div class="text-center d-flex justify-content-center">
                <h3 class="sub-heading-font-size ff-main fw-normal main-color text-center py-2 set-reports-desc-width">We have documented the events held by AI-Sarosh. To read the reports, download the PDF files below.</h3>

            </div>
        </div>
        <div class="row my-md-5 gap-md-5" id="report-list">
            @foreach($reports as $report)
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