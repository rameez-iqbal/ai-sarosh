@extends('frontend.layout.master')
@section('page-title', 'Contact Us')
@section('content')
<div class="container">
    {{view('frontend.components.social-links')}}
    <x-breadcrumb
    :backLink="$backLink"
    homeText="Home"
    :breadcrumbItems="$breadcrumbItems"
    />
    <x-banner-component
    :title="$title"
    :description="$description"
    :image="$image"
    />
</div>
<div class="row m-0">
    <!-- Form Section -->
    <div class="col-md-12 col-lg-6 bg-light p-5" data-aos="fade-right">
        <form class="px-md-5">
            <div class="col-md-3 mb-3">
                <label for="firstName" class="form-label fw-semi-bold text-clr mb-0">First name*</label>
                <input type="text" class="form-control p-0 custom-input-field fw-semi-bold text-clr" id="firstName">
            </div>
            <div class="col-md-6 mb-3">
                <label for="lastName" class="form-label fw-semi-bold text-clr mb-0">Last name*</label>
                <input type="text" class="form-control p-0 custom-input-field fw-semi-bold text-clr" id="lastName">
            </div>
            <div class="col-md-6 mb-3">
                <label for="emailAddress" class="form-label fw-semi-bold text-clr mb-0">Email address*</label>
                <input type="email" class="form-control p-0 custom-input-field fw-semi-bold text-clr" id="emailAddress">
            </div>
            <div class="col-md-6 mb-3">
                <label for="message" class="form-label fw-semi-bold text-clr mb-0">Your message</label>
                <textarea class="form-control p-0 custom-input-field height-md-0 resize-none fw-semi-bold text-clr" id="message" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-50 rounded-pill submit-btn">Submit</button>
        </form>
    </div>

    <!-- Info Section -->
    <div class="bg-primary p-5 text-white right-bar" data-aos="fade-left">
        <h2 class="mb-5">Info:</h4>
        <div class="my-3 d-flex flex-column gap-3">
            <div class="d-flex gap-3 align-items-start">
                <img src="{{ asset('app-assets') }}/images/frontend/email.svg" data-src="{{ asset('app-assets') }}/images/frontend/email.svg" alt="">
                <p class="fw-normal">Email: aisarosh@phcglobal.org</p>
            </div>
            <div class="d-flex gap-3 align-items-start">
                <img src="{{ asset('app-assets') }}/images/frontend/address.svg" data-src="{{ asset('app-assets') }}/images/frontend/address.svg" alt="">
                <p class="fw-normal"> Office# 241, Near Askari bank, Bahadurabad, Karachi, Sindh, Pakistan</p>
            </div>
            <div class="d-flex gap-3 align-items-start">
                <img src="{{ asset('app-assets') }}/images/frontend/phone.svg" data-src="{{ asset('app-assets') }}/images/frontend/phone.svg" alt="">
                <a href="tel:+9234122345" class="fw-normal text-white text-decoration-none">Phone: (+92) 34122345</a>
            </div>
            
        </div>
    </div>
</div>

@endsection