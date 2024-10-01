@extends('frontend.layout.master')
@section('page-title', 'Home')
@section('content')
<div class="container">
    {{view('frontend.components.social-links')}}
</div>
{{view('frontend.home.banner')}}
{{view('frontend.home.objective')}}
{{view('frontend.home.gallery')}}
{{view('frontend.home.about-donor')}}
{{view('frontend.home.partners')}}

@endsection