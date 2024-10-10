<input type="hidden" name="project_id" value="{{ isset($project) && !is_null($project) ? $project->id : null }}">
<div class="project-listing">
    <h4 class="text-center">
        Project
    </h4>
    <div class="row mt-3">
        <div class="col-md-6">
            <label for="">Title </label>
            {{-- <textarea class="" id="title" name="title" placeholder="Description" rows="2">{{ !is_null($project) ? $project?->title : '' }}</textarea> --}}

            <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                value="{{ !is_null($project) ? $project->title : '' }}">
        </div>
        <div class="col-md-6">
            <label for="">University </label>
            <input type="text" class="form-control" name="university" id="university" placeholder="University"
                value="{{ !is_null($project) ? $project->university : '' }}">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-6">
            <label class="" for="Image">Logo</label>
            <input type="file" class="filepond" name="logo" id="logo"
                accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
        </div>
        <div class="col-md-6">
            <label class="" for="Image">Image</label>
            <input type="file" class="filepond" name="image" id="image"
                accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
        </div>
    </div>

</div>
<h4 class="text-center mt-3">
    Details
</h4>
<div class="row mt-3">
    <div class="col-md-6">
        <label class="form-label" for="">Project Lead</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Project Lead"
            value="{{ !is_null($project) ? $project?->details?->name : '' }}">
    </div>
    <div class="col-md-6">
        <label class="form-label" for="">Country</label>
        <select name="country_id" id="country_id" class="form-control">
            @forelse ($countries as $country)
                <option value="{{ $country->id }}" {{ $project?->country_id == $country->id ? 'selected' : '' }}>
                    {{ $country->name }}</option>
            @empty
                <option value="">--No Country Exists--</option>
            @endforelse
        </select>
    </div>

</div>
<div class="row mt-3">
    <div class="col-md-6">
        <label for="">PI </label>
        <input type="text" class="form-control" name="pi" id="pi" placeholder="PI"
            value="{{ !is_null($project) ? $project?->details->pi : '' }}">
    </div>
    <div class="col-md-6">
        <label for="">CO PI </label>
        <input type="text" class="form-control" name="co_pi" id="co_pi" placeholder="CO PI"
            value="{{ !is_null($project) ? $project?->details->co_pi : '' }}">
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <label for="">Start Date </label>
        <input type="text" class="form-control start_date" name="start_date" id="start_date" placeholder="Start Date"
            value="{{ !is_null($project) ? $project?->details?->start_date : '' }}">
    </div>
    <div class="col-md-6">
        <label for="">End Date </label>
        <input type="text" class="form-control end_date" name="end_date" id="end_date" placeholder="End Time"
            value="{{ !is_null($project) ? $project?->details?->end_date : '' }}">
    </div>

</div>
<div class="row mt-3">
    <div class="col-md-6">
        <label class="form-label" for="">Website Url</label>
        <input type="text" class="form-control" name="url" id="url" placeholder="Website Url"
            value="{{ !is_null($project) ? $project?->details?->url : '' }}">
    </div>
    <div class="col-md-6">
        <label class="" for="Image">Image</label>
        <input type="file" class="filepond" name="detail_image" id="detail_image"
            accept="image/png, image/jpeg, image/jpg, image/svg+xml, image/webp" />
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-6">
        <label for="">About Description</label>
        <textarea class="description" id="about_description" name="description" placeholder="Description" rows="2">{{ !is_null($project) ? $project?->details?->about_description : '' }}</textarea>
    </div>
    <div class="col-md-6">
        <label for="">Project Team</label>
        <textarea class="project_team" id="project_team" name="project_team" placeholder="Project Team" rows="2">{{ !is_null($project) ? $project?->details?->project_teams : '' }}</textarea>
    </div>

</div>
