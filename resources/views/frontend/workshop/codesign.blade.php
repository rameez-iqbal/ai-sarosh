@extends('frontend.layout.master')
@section('page-title', 'Co Design Workshop Day 1')
@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')

@section('content')
    <div class="container">
        {{ view('frontend.components.social-links') }}
        <x-breadcrumb :backLink="$backLink" homeText="Home" :breadcrumbItems="$breadcrumbItems" />
        @php
            $header_content = [
                'heading' => $conference['heading'],
                'description' => $conference['description'],
                'bannerImage' => asset('storage/gallery/' . json_decode($conference['banner_images'])[0]),
            ];
        @endphp
        <x-codesign-banner :slug="$conference->slug" :headerContent="$header_content" :groupedHighlightsArray="$grouped_highlights_array" />
        <h2 class="ff-main main-color fw-bold text-center mt-md-2">{{request()->route('day') ?? array_keys($grouped_highlights_array)[0]}}</h2>
        @if(is_null(request()->route('day')))
            @forelse(array_values($grouped_highlights_array)[0] as $data)
                <div class="row mb-3 my-md-2 g-3" id="codesign_images">
                    <h2 class="ff-main main-color fw-normal text-center">{{ $data['heading'] }}</h2>
                    @forelse(json_decode($data['images']) as $image)
                        <div class="col-md-4" data-aos="zoom-in-up">
                            <img src="{{ asset('storage/highlights/' . $image) }}" alt="">
                        </div>
                    @empty
                    @endforelse
                </div>
            @empty
            @endforelse
        @else
            @forelse ($obj->getWorkshop(request()->route('day')) as $data)
                <div class="row mb-3 my-md-2 g-3" id="codesign_images">
                    <h2 class="ff-main main-color fw-normal text-center">{{ $data['heading'] }}</h2>
                    @forelse(json_decode($data['images']) as $image)
                        <div class="col-md-4" data-aos="zoom-in-up">
                            <img src="{{ asset('storage/highlights/' . $image) }}" alt="">
                        </div>
                    @empty
                    @endforelse
                </div>
            @empty
                <h3>No Workshop Found</h3>
            @endforelse
        @endif
        {{-- @forelse(array_values($grouped_highlights_array)[0] as $data)
            <div class="row my-md-5 g-3 mb-5" id="codesign_images">
                <h2 class="ff-main main-color fw-normal text-center mt-md-0" data-aos="zoom-in-up">{{ $data['heading'] }}
                </h2>
                @forelse(json_decode($data['images']) as $image)
                    <div class="col-md-4" data-aos="zoom-in-up">
                        <img src="{{ asset('storage/highlights/' . $image) }}" alt="">
                    </div>
                @empty
                @endforelse

            </div>
        @empty
        @endforelse --}}

    </div>
@endsection
