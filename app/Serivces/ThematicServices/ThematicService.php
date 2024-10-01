<?php

namespace App\Serivces\ThematicServices;

use App\Models\Page;
use App\Models\Section;
use App\Models\Service;
use App\Trait\Image;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ThematicService implements ThematicInterface
{
    use Image;
    public function createOrUpdateService($data)
    {
        $unqiue_slug = null;
        DB::beginTransaction();
        try 
        {
            if(array_key_exists('image',$data)){
                $image = $data['image'];
            }
            $unqiue_slug = null;

            if( array_key_exists('service_id',$data) && $data['service_id'] != 0 && !is_null( $data['service_id'] ))
            {
                $service = Service::find( $data['service_id'] );
                if(array_key_exists('image',$data)){
                    $image = $data['image'] ?? $service->image;
                }
                if( $service &&  $service->image !=  $image->getClientOriginalName())
                    $this->deleteImage( $service->image,Service::PATH );
            }
            else 
            {
                $service = new Service();
                $unqiue_slug = generateSlug($service, $data['title'],'slug');
            }
            $service->title            = array_key_exists('title',$data) ? $data['title'] : null;
            $service->description      = array_key_exists('description',$data) ? $data['description'] : null;
            $service->type             = array_key_exists('name',$data) ? $data['name'] : null;
            $service->slug             = !is_null($unqiue_slug) ? $unqiue_slug : $service->slug;
            $service->image            = ($service->image !=  $image->getClientOriginalName()) ? $this->storeImage($image, Service::PATH) : $service->image;
            $service->user_id          = 1;
            $service->save();
            DB::commit();
            return $service->type;
        } 
        catch (Exception $ex) 
        {
            DB::rollBack();
            Log::info("Service Create=> ".$ex->getMessage());
            return $ex->getMessage();
        }        
    }

    public function deleteService( $id )
    {
        try 
        {
            $service = Service::find($id);
            $this->deleteImage( $service->image,Service::PATH );
            $service->delete();
            return true;
        } 
        catch (Exception $ex) 
        {
            Log::info("Delete Service". $ex->getMessage() );
            return $ex->getMessage();
        }
    }
}
