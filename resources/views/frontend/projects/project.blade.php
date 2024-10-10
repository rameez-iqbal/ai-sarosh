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

    @forelse ($obj->getProjects() as $project)
        <x-project-detail :id="$project->id" :bgColor="$project->country->bgColor" :logo="asset('storage/projects/' . $project->logo)" :title="$project->title" :piName="$project->pi"
            :coPiName="$project->details->co_pi" :projectTimeline="$project->details->timeline" :projectTeam="$project->details->project_teams" :country="$project->country->name" :organization="$project->university" :website="$project->details->url"
            :profileImage="asset('storage/projects/' . $project->details->image)" countryFlag="app-assets/images/frontend/bangladesh.svg" :userName="$project->details->name" :aboutProject='$project->details->about_description'
            type="text" />
    @empty
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
        $(document).ready(function () {
            $('.about-project').each(function() {
                $(this).find('p').addClass('fw-normal ff-main text-clr text-align-justify blue-clr');
            });
        });
    </script>
@endsection
