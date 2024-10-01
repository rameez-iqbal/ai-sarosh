<?php
namespace App\Serivces\Reports;

use App\Models\Report;
use App\Models\Video;
use App\Serivces\Reports\ReportInterface;
use App\Trait\Image;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ReportService implements ReportInterface
{
    use Image;
    public function createOrUpdateReport($data)
    {   
        DB::beginTransaction();
        try 
        {
            if(array_key_exists('image',$data)){
                $image = $data['image'];
            }
            if(array_key_exists('report_file',$data)){
                $report_file = $data['report_file'];
            }
            if( array_key_exists('report_id',$data) && $data['report_id'] != 0 && !is_null( $data['report_id'] ))
            {
                $report = Report::find( $data['report_id'] );
                if(array_key_exists('image',$data)){
                    $image = $data['image'] ?? $report->image;
                }
                if( $report &&  $report->image !=  $image->getClientOriginalName())
                    $this->deleteImage( $report->image,Report::PATH );

                if(array_key_exists('report_file',$data))
                    $this->deleteImage( $report->report_file,Report::PATH );
            }
            else 
                $report = new Report();
            $report->title            = $data['title'] ?? null;
            $report->organization    =  $data['organization'] ?? null;
            $report->description    =  $data['description'] ?? null;
            $report->report_file       = array_key_exists('report_file',$data) ? $this->storeImage($report_file, Report::PATH) : $report->report_file;
            $report->image           = ($report->image !=  $image->getClientOriginalName()) ? $this->storeImage($image, report::PATH) : $report->image;
            $report->library_type_id = $data['library_type_id'] ?? 1;
            $report->save();
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

    public function deleteReport( $id )
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
