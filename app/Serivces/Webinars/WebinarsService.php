<?php
namespace App\Serivces\Webinars;

use App\Models\Webinar;
use App\Serivces\Webinars\WebinarsInterface;
use App\Trait\Image;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WebinarsService implements WebinarsInterface
{
    use Image;
    public function createOrUpdateWebinars($data)
    {
        DB::beginTransaction();
        try 
        {
            if(array_key_exists('image',$data)){
                $image = $data['image'];
            }

            if( array_key_exists('webinar_id',$data) && $data['webinar_id'] != 0 && !is_null( $data['webinar_id'] ))
            {
                $webinar = Webinar::find( $data['webinar_id'] );
                if(array_key_exists('image',$data)){
                    $image = $data['image'] ?? $webinar->image;
                }
                if( $webinar &&  $webinar->image !=  $image->getClientOriginalName())
                    $this->deleteImage( $webinar->image,Webinar::PATH );
            }
            else 
                $webinar = new Webinar();
            $webinar->title            = array_key_exists('title',$data) ? $data['title'] : null;
            $webinar->library_type_id = array_key_exists('library_type_id',$data) ? $data['library_type_id'] : 1;
            $webinar->webinar_date = array_key_exists('webinar_date',$data) ? $data['webinar_date'] : Carbon::now()->format('Y-m-d');
            $webinar->redirect_url     = array_key_exists('redirect_url',$data) ? $data['redirect_url'] : null;
            $webinar->image           = ($webinar->image !=  $image->getClientOriginalName()) ? $this->storeImage($image, Webinar::PATH) : $webinar->image;
            $webinar->save();
            DB::commit();
            return true;
        } 
        catch (Exception $ex) 
        {
            DB::rollBack();
            Log::info("Webinar => ".$ex->getMessage());
            return $ex->getMessage();
        }        
    }

    public function deleteWebinars( $id )
    {
        try 
        {
            $webinar = Webinar::find($id);
            $this->deleteImage( $webinar->image,Webinar::PATH );
            $webinar->delete();
            return true;
        } 
        catch (Exception $ex) 
        {
            Log::info("Delete Webinar". $ex->getMessage() );
            return $ex->getMessage();
        }
    }
}
