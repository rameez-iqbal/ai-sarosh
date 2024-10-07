<?php
namespace App\Serivces\GalleryHighlights;

use App\Models\Gallery;
use App\Models\GalleryHighlights;
use App\Models\Report;
use App\Serivces\Gallery\GalleryInterface;
use App\Trait\Image;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\File\File;

class GalleryHighlightsService implements GalleryHighlightsInterface
{
    use Image;
    public function createOrUpdateGalleryHighlights($data)
    {
        $images_arr = array();
        foreach($data['days'] as $dy)
        {
            $gallery_highlight = new GalleryHighlights();
            $gallery_highlight->day  = $dy['day'];
            $gallery_highlight->heading  = $dy['heading'];
            $gallery_highlight->gallery_id  = $dy['id'];
            foreach($dy['images'] as $key=>$img)
                $images_arr[$key] = $this->storeImage($img, GalleryHighlights::PATH);
            $gallery_highlight->images = json_encode($images_arr);
            $gallery_highlight->save();
        }
        return true;
    }
    // public function createOrUpdateGalleryHighlights($data)
    // {
    //     DB::beginTransaction();
    //     try 
    //     {
    //         if(array_key_exists('banner_images',$data)){
    //             $banner_images = $data['banner_images'];
    //         }
    //         if( array_key_exists('gallery_id',$data) && $data['gallery_id'] != 0 && !is_null( $data['gallery_id'] ))
    //         {
    //             $gallery = Gallery::find( $data['gallery_id'] );
    //             if(array_key_exists('banner_images',$data)){
    //                 $banner_images = $data['banner_images'] ?? $gallery->banner_images;
    //             }
    //             if( $gallery &&  $gallery->banner_images !=  $banner_images->getClientOriginalName())
    //                 $this->deleteImage( $gallery->banner_images,Gallery::PATH );

    //         }
    //         else 
    //         {
    //             $gallery = new Gallery();
    //             $unqiue_slug = generateSlug($gallery,array_key_exists('heading',$data) ? $data['heading'] : 'Gallery','slug');
    //             $banner_imgs = [];
    //             $gallery_imgs = [];
    //             if(array_key_exists('banner_images',$data) && count($data['banner_images'])>0)
    //             {
    //                 foreach($data['banner_images'] as $key=>$banner_image)
    //                     $banner_imgs[$key] = $this->storeImage($banner_image, Gallery::PATH);
    //             }
    //             if(array_key_exists('gallery_images',$data) && count($data['gallery_images'])>0)
    //             {
    //                 foreach($data['gallery_images'] as $key=>$gallery_image)
    //                     $gallery_imgs[$key] = $this->storeImage($gallery_image, Gallery::PATH);
    //             }

    //         }
    //         $gallery->type            = $data['type'] ?? null;
    //         $gallery->heading            = $data['heading'] ?? null;
    //         $gallery->post_url             = $data['post_url'] ?? null;
    //         $gallery->recording_url             = $data['recording_url'] ?? null;
    //         $gallery->description    =  $data['description'] ?? null;
    //         $gallery->slug    =  $unqiue_slug ?? null;
    //         $gallery->banner_images     = count($banner_imgs) > 0 ?  json_encode($banner_imgs) : null;
    //         $gallery->gallery_images    = count($gallery_imgs) > 0 ? json_encode($gallery_imgs) : null;
    //         $gallery->library_type_id = $data['library_type_id'] ?? 1;
    //         $gallery->save();
    //         DB::commit();
    //         return true;
    //     } 
    //     catch (Exception $ex) 
    //     {
    //         DB::rollBack();
    //         Log::info("Error  => ".$ex->getMessage());
    //         return $ex->getMessage();
    //     }        
    // }

    public function deleteGalleryHighlights( $id )
    {
        try 
        {
            $gallery = Gallery::find($id);
            $banner_images = json_decode($gallery->banner_images);
            $gallery_images = json_decode($gallery->gallery_images);
            if(count($gallery_images)>0)
            {
                for($i=0;$i<count($gallery_images);$i++)
                    $this->deleteImage( $gallery_images[$i],Gallery::PATH );
            }
            if(count($banner_images)>0)
            {
                for($i=0;$i<count($banner_images);$i++)
                    $this->deleteImage( $banner_images[$i],Gallery::PATH );
            }
            $gallery->delete();
            return true;
        } 
        catch (Exception $ex) 
        {
            Log::info("Delete Video". $ex->getMessage() );
            return $ex->getMessage();
        }
    }

    public function storeGalleryImages()
    {

    }
}
