<?php

namespace App\Serivces\Projects;

use App\Models\Project;
use App\Models\ProjectDetail;
use App\Models\Report;
use App\Trait\Image;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ProjectService implements ProjectInterface
{
    use Image;
    public function createOrUpdateProject($data)
    {
        $start_time = strtotime($data['start_date']);
        $end_time = strtotime($data['end_date']);
        $converted_start_date = monthYearConversion($start_time);
        $converted_end_date = monthYearConversion($end_time);
        DB::beginTransaction();
        try {
            if ($data['image'])
                $image = $data['image'];
            if ($data['detail_image'])
                $detail_image = $data['detail_image'];
            if ($data['logo'])
                $logo = $data['logo'];
            if (!is_null($data['project_id'])) {
                $project = Project::with('details')->find($data['project_id']);
                $project_detail = ProjectDetail::where('project_id',$project->id)->firstOrFail();
                if ($data['image'])
                    $image = $data['image'] ?? $project->image;
                if ($data['detail_image'])
                    $detail_image = $data['detail_image'] ?? $project?->details?->image;
                if ($data['logo'])
                    $logo = $data['logo'] ?? $project->logo;
                if ($image &&  $project->image !=  $image->getClientOriginalName())
                    $this->deleteImage($project->image, Project::PATH);
                if ($logo &&  $project->logo !=  $logo->getClientOriginalName())
                    $this->deleteImage($project->logo, Project::PATH);
                if ($detail_image &&  $project?->details?->image !=  $detail_image->getClientOriginalName())
                    $this->deleteImage($project?->details?->image, Project::PATH);
            } else
            {
                $project = new Project();
                $project_detail = new ProjectDetail();
            }
            $project->title            = $data['title'] ?? null;
            $project->university    =  $data['university'] ?? null;
            $project->logo           = ($project->logo !=  $logo->getClientOriginalName()) ? $this->storeImage($logo, Project::PATH) : $project->logo;
            $project->image           = ($project->image !=  $image->getClientOriginalName()) ? $this->storeImage($image, Project::PATH) : $project->image;
            $project->country_id    =  $data['country_id'] ?? null;
            $project->save();

            $project_detail->name = $data['name'] ?? null;
            $project_detail->pi = $data['pi'] ?? null;
            $project_detail->co_pi = $data['co_pi'] ?? null;
            $project_detail->start_date = $data['start_date'] ?? null;
            $project_detail->end_date = $data['end_date'] ?? null;
            $project_detail->timeline = $converted_start_date . ' - ' . $converted_end_date ?? null;
            $project_detail->project_teams = $data['project_teams'] ?? null;
            $project_detail->url = $data['url'] ?? null;
            $project_detail->about_description = $data['about_description'] ?? null;
            $project_detail->image  = ($project_detail->image !=  $detail_image->getClientOriginalName()) ? $this->storeImage($detail_image, Project::PATH) : $project?->details?->image;
            $project_detail->project_id = $project->id ?? null;
            $project_detail->save();
            DB::commit();
            return true;
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error("Project Error: " . $ex->getMessage() .
                " in file " . $ex->getFile() .
                " on line " . $ex->getLine());
            Log::error("Stack trace: " . $ex->getTraceAsString());
            Log::error("Message => " . $ex->getMessage());
            return $ex->getMessage();
        }
    }

    public function deleteProject($id)
    {
        try {
            $project = Project::with('details')->find($id);
            if (Storage::disk('public')->exists('projects/' . $project->image)) 
                $this->deleteImage($project->image, Project::PATH);
            if(Storage::disk('public')->exists('projects/'.$project->logo))
                $this->deleteImage($project->logo, Project::PATH);
            if(Storage::disk('public')->exists('projects/'.$project?->details?->image))
                $this->deleteImage($project?->details?->image, Project::PATH);
            $project?->details?->delete();
            $project->delete();
            return true;
        } catch (Exception $ex) {
            Log::info("Delete Report" . $ex->getMessage());
            return false;
        }
    }
}
