@extends('frontend.layout.master')
@section('page-title', 'Projects')
@section('custom-css')
<style>
    .link {
        text-decoration: none;
        color: #292929;
    }
</style>
@endsection
@section('content')
    <div class="container">
        {{ view('frontend.components.social-links') }}
        <x-breadcrumb :backLink="$backLink" homeText="Home" :breadcrumbItems="$breadcrumbItems" />
        {{ view('frontend.components.banner') }}
    </div>
    {{ view('frontend.projects.project-list') }}
    @inject('obj', 'App\Http\Controllers\FrontEnd\FrontEndController')
    {{-- @dd($obj->getProjects());
    @forelse ($obj->getProjects() as $project)
        <x-project-detail :id="$project->id" :bgColor="$project->country->bgColor" :logo="asset('storage/projects/' . $project->logo)" :title="$project->title" :piName="$project->details->pi"
            :coPiName="$project->details->co_pi" :projectTimeline="$project->details->timeline" :projectTeam="$project->details->project_teams" :country="$project->country->name" :organization="$project->university" :website="$project->details->url"
            :profileImage="asset('storage/projects/' . $project->details->image)" :countryFlag="asset('app-assets/images/frontend/' . $project->country->name.'.png')" :userName="$project->details->name" :aboutProject='$project->details->about_description'
            type="text" />
    @empty
    @endforelse --}}
    @php
    // Group projects by user name
    $groupedProjects = $obj->getProjects()->groupBy('details.name');
@endphp

@foreach($groupedProjects as $userName => $projects)
    @if ($projects->count() > 1)
        {{-- If user has multiple projects, display project titles as bullets --}}
        <x-project-detail :id="$projects->first()->id" 
            :bgColor="$projects->first()->country->bgColor"
            :logo="asset('storage/projects/' . $projects->first()->logo)" 
            :title="json_encode($projects->pluck('title'))" 
            :piName="$projects->first()->details->pi"
            :coPiName="$projects->first()->details->co_pi" 
            :projectTimeline="$projects->first()->details->timeline" 
            :projectTeam="$projects->first()->details->project_teams" 
            :country="$projects->first()->country->name" 
            :organization="$projects->first()->university"
            :website="$projects->first()->details->url" 
            :profileImage="asset('storage/projects/' . $projects->first()->details->image)"
            :countryFlag="asset('app-assets/images/frontend/' . $projects->first()->country->name . '.png')" 
            :userName="$projects->first()->details->name"
            :aboutProject="$projects->first()->details->about_description" 
            type="bullets" />
    @else
        {{-- If user has only one project, display it normally --}}
        <x-project-detail :id="$projects->first()->id" 
            :bgColor="$projects->first()->country->bgColor"
            :logo="asset('storage/projects/' . $projects->first()->logo)" 
            :title="$projects->first()->title" 
            :piName="$projects->first()->details->pi"
            :coPiName="$projects->first()->details->co_pi" 
            :projectTimeline="$projects->first()->details->timeline" 
            :projectTeam="$projects->first()->details->project_teams" 
            :country="$projects->first()->country->name" 
            :organization="$projects->first()->university"
            :website="$projects->first()->details->url" 
            :profileImage="asset('storage/projects/' . $projects->first()->details->image)"
            :countryFlag="asset('app-assets/images/frontend/' . $projects->first()->country->name . '.png')" 
            :userName="$projects->first()->details->name"
            :aboutProject="$projects->first()->details->about_description" 
            type="text" />
    @endif
@endforeach


@endsection

@section('custom-js')
    <script>
        function navigateToProject(projectId) {

            const targetDiv = document.getElementById(projectId);
            if (targetDiv) {
                targetDiv.scrollIntoView({
                    behavior: 'smooth'
                });
            } else {
                console.log("Target div not found:", projectId);
            }
        }
        $(document).ready(function () {
            $('.about-project').each(function() {
                $(this).find('p').addClass('fw-normal ff-main text-clr text-align-justify blue-clr');
            });
        });
    </script>
@endsection
