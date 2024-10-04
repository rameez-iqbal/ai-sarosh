<?php
namespace App\Serivces\Gallery;

use App\Models\Gallery;
use App\Models\Report;
use App\Serivces\Gallery\GalleryInterface;
use App\Trait\Image;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GalleryService implements GalleryInterface
{
    use Image;
    public function createOrUpdateGallery($data)
    {
        DB::beginTransaction();
        try 
        {
            if(array_key_exists('banner_image',$data)){
                $banner_image = $data['banner_image'];
            }
            if( array_key_exists('gallery_id',$data) && $data['gallery_id'] != 0 && !is_null( $data['gallery_id'] ))
            {
                $gallery = Gallery::find( $data['gallery_id'] );
                if(array_key_exists('banner_image',$data)){
                    $banner_image = $data['banner_image'] ?? $gallery->banner_image;
                }
                if( $gallery &&  $gallery->banner_image !=  $banner_image->getClientOriginalName())
                    $this->deleteImage( $gallery->banner_image,Gallery::PATH );

            }
            else 
            {
                $gallery = new Gallery();
                $unqiue_slug = generateSlug($gallery,array_key_exists('heading',$data) ? $data['heading'] : 'Gallery','slug');
                $gallery_imgs = [];
                foreach($data['gallery_images'] as $key=>$gallery_image)
                {
                    $gallery_imgs[$key] = $this->storeImage($gallery_image, Gallery::PATH);
                }

            }
            $gallery->heading            = $data['heading'] ?? null;
            $gallery->post_url             = $data['post_url'] ?? null;
            $gallery->description    =  $data['description'] ?? null;
            $gallery->slug    =  $unqiue_slug ?? null;
            $gallery->banner_image           = ($gallery->banner_image !=  $banner_image->getClientOriginalName()) ? $this->storeImage($banner_image, Gallery::PATH) : $gallery->banner_image;
            $gallery->gallery_images           = json_encode($gallery_imgs);
            $gallery->library_type_id = $data['library_type_id'] ?? 1;
            $gallery->save();
            DB::commit();
            return true;
        } 
        catch (Exception $ex) 
        {
            DB::rollBack();
            Log::info("Error  => ".$ex->getMessage());
            return $ex->getMessage();
        }        
    }

    public function deleteGallery( $id )
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

    public function storeGalleryImages()
    {

    }
}
