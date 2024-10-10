@extends('frontend.layout.master')
@section('page-title', 'Videos')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/magnific/magnific.css">

    <style>
        /**
         * Simple fade transition,
         */
        .mfp-fade.mfp-bg {
            opacity: 0;
            -webkit-transition: all 0.15s ease-out;
            -moz-transition: all 0.15s ease-out;
            transition: all 0.15s ease-out;
        }

        .mfp-fade.mfp-bg.mfp-ready {
            opacity: 0.8;
        }

        .mfp-fade.mfp-bg.mfp-removing {
            opacity: 0;
        }

        .mfp-fade.mfp-wrap .mfp-content {
            opacity: 0;
            -webkit-transition: all 0.15s ease-out;
            -moz-transition: all 0.15s ease-out;
            transition: all 0.15s ease-out;
        }

        .mfp-fade.mfp-wrap.mfp-ready .mfp-content {
            opacity: 1;
        }

        .mfp-fade.mfp-wrap.mfp-removing .mfp-content {
            opacity: 0;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        {{ view('frontend.components.social-links') }}
        <x-breadcrumb :backLink="$backLink" homeText="Home" :breadcrumbItems="$breadcrumbItems" />
    </div>
    <section id="videos">
        <div class="container mb-5">
            <div class="row" data-aos="zoom-in-up">

                <div id="my-popup" class="mfp-hide white-popup">
                    Inline popup
                </div>
                <h1 class="ff-main fw-bold main-color text-center fs-md-48 fs-32">Videos</h1>
                <h1 class=" ff-main fw-bold main-color text-center py-md-5 py-3 fs-md-48 fs-32">Keynote Speakers from
                    Co-Design Workshop:</h1>
            </div>
            <div class="row justify-content-center gap-4">
                @inject('obj', 'App\Http\Controllers\FrontEnd\FrontEndController')

                @forelse ($obj->getVideos() as $video)
                    <x-video :bgImg="asset('storage/videos/' . $video->image)" :title="$video->title" :name="$video->name" :org="$video->organization" :videoLink="asset('storage/videos/'.$video->video_link)" />
                @empty
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('custom-js')
    <script src="{{ asset('app-assets') }}/js/magnific/magnific.js"></script>

    <script>
        $(document).ready(function() {
            $('.open-video-popup').magnificPopup({
                items: [{
                    src: '',
                    type: "iframe" 
                }],
                gallery: {
                    enabled: false
                },
                type: 'video'
            });

            $(document).on('click', '.video-img', function() {
                let video = $(this).attr('data-video_url');
                $('.open-video-popup').magnificPopup('open');
                $.magnificPopup.instance.items[0].src = video;
                $.magnificPopup.instance.updateItemHTML();
            });
        });
    </script>
@endsection
