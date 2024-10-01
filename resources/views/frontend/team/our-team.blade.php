@extends('frontend.layout.master')
@section('page-title', 'Our Team')
@section('content')
    <div class="container">
        {{ view('frontend.components.social-links') }}
        <x-breadcrumb :backLink="$backLink" homeText="Home" :breadcrumbItems="$breadcrumbItems" />
        <x-banner-section :title="$title" :description="$description" :image="$image" />
        @inject('obj', 'App\Http\Controllers\FrontEnd\FrontEndController')
        @php
            $leaders = []; // Initialize the array before the loop
        @endphp

        @forelse($obj->getOurTeamsData()[0] as $team)
            @php
                $leaders[] = [
                    'profileImg' => asset('storage/teams/' . $team->image),
                    'leaderName' => $team->name,
                    'designation' => $team->designation,
                ];
            @endphp
        @empty
            <h3>No Leadership Found</h3>
        @endforelse

        @if (!empty($leaders))
            <x-team :title="$team->category->role" :bgColor="$team->category->bgColor" columns="col-md-4" width="75" :leaders="$leaders" />
        @endif

        @php
            $technical_team = []; // Initialize the array before the loop
        @endphp

        @forelse($obj->getOurTeamsData()[1] as $team)
            @php
                $technical_team[] = [
                    'profileImg' => asset('storage/teams/' . $team->image),
                    'leaderName' => $team->name,
                    'designation' => $team->designation,
                ];
            @endphp
        @empty
            <h3>No Technical Found</h3>
        @endforelse

        @if (!empty($technical_team))
            <x-team :title="$team->category->role" :bgColor="$team->category->bgColor" columns="col-md-3" :leaders="$technical_team" />
        @endif

        @php
            $implementation_team = []; // Initialize the array before the loop
        @endphp

        @forelse($obj->getOurTeamsData()[2] as $team)
            @php
                $implementation_team[] = [
                    'profileImg' => asset('storage/teams/' . $team->image),
                    'leaderName' => $team->name,
                    'designation' => $team->designation,
                ];
            @endphp
        @empty
            <h3>No Implementation Found</h3>
        @endforelse

        @if (!empty($implementation_team))
            <x-team :title="$team->category->role" :bgColor="$team->category->bgColor" columns="col-md-3" :leaders="$implementation_team" />
        @endif

        @php
            $implementation_team = []; // Initialize the array before the loop
        @endphp

        @forelse($obj->getOurTeamsData()[3] as $team)
            @php
                $implementation_team[] = [
                    'profileImg' => asset('storage/teams/' . $team->image),
                    'leaderName' => $team->name,
                    'designation' => $team->designation,
                ];
            @endphp
        @empty
            <h3>No Implementation Found</h3>
        @endforelse

        @if (!empty($implementation_team))
            <x-team :title="$team->category->role" :bgColor="$team->category->bgColor" columns="col-md-3" :leaders="$implementation_team" />
        @endif

      
    </div>

@endsection
