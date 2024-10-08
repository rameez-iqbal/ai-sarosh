@extends('frontend.layout.master')
@section('page-title', 'Projects')
@section('content')
    <div class="container">
        {{ view('frontend.components.social-links') }}
        <x-breadcrumb :backLink="$backLink" homeText="Home" :breadcrumbItems="$breadcrumbItems" />
        {{ view('frontend.components.banner') }}
    </div>
    {{ view('frontend.projects.project-list') }}
    @inject('obj', 'App\Http\Controllers\FrontEnd\FrontEndController')

    @forelse ($obj->getProjects() as $project)
        <x-project-detail :id="$project->id" :bgColor="$project->country->bgColor" :logo="asset('storage/projects/' . $project->logo)" :title="$project->title" :piName="$project->pi"
            :coPiName="$project->details->co_pi" :projectTimeline="$project->details->timeline" :projectTeam="$project->details->project_teams" :country="$project->country->name" :organization="$project->university" :website="$project->details->url"
            :profileImage="asset('storage/projects/' . $project->details->image)" countryFlag="app-assets/images/frontend/bangladesh.svg" :userName="$project->details->name" :aboutProject='$project->details->about_description'
            type="text" />
    @empty
        <h3>No Project Found</h3>
    @endforelse

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
    </script>
@endsection
