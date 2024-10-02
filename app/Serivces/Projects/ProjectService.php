<?php
namespace App\Serivces\Projects;

use App\Models\Project;
use App\Models\ProjectDetail;
use App\Models\Report;
use App\Trait\Image;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectService implements ProjectInterface
{
    use Image;
    public function createOrUpdateProject($data)
    {   
        $start_time = strtotime($data['start_time']);
        $end_time = strtotime($data['end_time']);
        $converted_start_time = monthYearConversion($start_time);
        $converted_end_time = monthYearConversion($end_time);
        DB::beginTransaction();
        try 
        {
            if($data['image'])
                $image = $data['image'];
            if($data['detail_image'])
                $detail_image = $data['detail_image'];
            if($data['logo'])
                $logo = $data['logo'];
            if( !is_null($data['project_id']))
            {
                $project = Project::find( $data['project_id'] );
                if($data['image'])
                    $image = $data['image'] ?? $project->image;
                if($data['detail_image'])
                    $detail_image = $data['detail_image'] ?? $project->detail_image;
                if($data['logo'])
                    $logo = $data['logo'] ?? $project->logo;
                if( $image &&  $project->image !=  $image->getClientOriginalName())
                    $this->deleteImage( $project->image,Project::PATH );
                if( $detail_image &&  $project->detail_image !=  $detail_image->getClientOriginalName())
                    $this->deleteImage( $project->detail_image,Project::PATH );
                if( $logo &&  $project->logo !=  $logo->getClientOriginalName())
                    $this->deleteImage( $project->logo,Project::PATH );
            }
            else 
                $project = new Project();
            $project->title            = $data['title'] ?? null;
            $project->university    =  $data['university'] ?? null;
            $project->logo           = ($project->logo !=  $logo->getClientOriginalName()) ? $this->storeImage($logo, Project::PATH) : $project->logo;
            $project->image           = ($project->image !=  $image->getClientOriginalName()) ? $this->storeImage($image, Project::PATH) : $project->image;
            $project->country_id    =  $data['country_id'] ?? null;
            $project->save();

            $project_detail = new ProjectDetail();
            $project_detail->pi = $data['pi'] ?? null;
            $project_detail->co_pi = $data['co_pi'] ?? null;
            $project_detail->timeline = $converted_start_time.'-'.$converted_end_time ?? null;
            $project_detail->project_teams = $data['project_team'] ?? null;
            $project_detail->url = $data['url'] ?? null;
            $project_detail->about_description = $data['description'] ?? null;
            $project_detail->project_id = $project->id ?? null;
            $project_detail->save();
            DB::commit();
            return true;
        } 
        catch (Exception $ex) 
        {
            DB::rollBack();
            Log::info("Video  => ".$ex->getMessage());
            return $ex->getMessage();
        }        
    }

    public function deleteProject( $id )
    {
        try 
        {
            $report = Report::find($id);
            $this->deleteImage( $report->image,Report::PATH );
            $this->deleteImage( $report->report_file,Report::PATH );
            $report->delete();
            return true;
        } 
        catch (Exception $ex) 
        {
            Log::info("Delete Report". $ex->getMessage() );
            return $ex->getMessage();
        }
    }
}
