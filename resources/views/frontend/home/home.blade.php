@extends('frontend.layout.master')
@section('page-title', 'Home')
@section('custom-css')
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets') }}/css/plugins/magnific/magnific.css">
    <style>
        @media (max-width: 425px) {
            .donner-image img {
                width: 100%;
            }
        }
    </style>
@endsection
@section('content')
    <div class="container">
        {{ view('frontend.components.social-links') }}
    </div>
    {{ view('frontend.home.banner') }}
    {{ view('frontend.home.objective') }}
    {{ view('frontend.home.gallery') }}
    {{ view('frontend.home.about-donor') }}
    {{ view('frontend.home.partners') }}

@endsection

@section('custom-js')
    <script src="{{ asset('app-assets') }}/js/magnific/magnific.js"></script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.img-div', function() {
                let imageUrl = $(this).attr('data-img');
                $.magnificPopup.open({
                    items: {
                        src: imageUrl,
                        type: 'image'
                    },
                    callbacks: {
                        open: function() {
                            $('.mfp-img').css({
                                'width': '600px',
                                'height': 'auto'
                            });
                        }
                    },
                    gallery: {
                        enabled: false
                    }
                });
            });
        });
    </script>
@endsection
