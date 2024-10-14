@extends('frontend.layout.master')
@section('page-title', 'Library')
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
@inject('obj','App\Http\Controllers\FrontEnd\FrontEndController')

<div class="container">
    <section id="libraries" class="my-3">
        <div class="row g-3 g-md-5 justify-content-center">
            @forelse ($obj->getLibraryTypes() as $libraryType)
                <x-library-list 
                :image="asset('storage/library/'.$libraryType->image)"
                :name="$libraryType->type"
                columns="col-md-4"
                :href="$libraryType->slug"
                />
            @empty
                <h3>No Library Type Found</h3>                
            @endforelse
            
        </div>
    </section>
</div>
@endsection
</div>