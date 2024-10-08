<?php
namespace App\Serivces\GalleryHighlights;

use App\Models\GalleryHighlights;
use App\Trait\Image;
use Exception;
use Illuminate\Support\Facades\Log;

class GalleryHighlightsService implements GalleryHighlightsInterface
{
    use Image;
    public function createOrUpdateGalleryHighlights($data)
    {
        foreach($data['days'] as $dy)
        {
            $images_arr = [];
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
    

    public function deleteGalleryHighlights( $id )
    {
        try 
        {
            $highlight = GalleryHighlights::find($id);
            $highlight_images = json_decode($highlight->images);
            if(!is_null($highlight_images) && count($highlight_images)>0)
            {
                for($i=0;$i<count($highlight_images);$i++)
                    $this->deleteImage( $highlight_images[$i],GalleryHighlights::PATH );
            }
            $highlight->delete();
            return true;
        } 
        catch (Exception $ex) 
        {
            Log::info("Delete Gallery Highlight". $ex->getMessage() );
            return $ex->getMessage();
        }
    }

    public function updateHighlights($data)
    {
        $images_arr = [];
        $gallery_highlight = GalleryHighlights::find($data['id']);
        foreach(json_decode($gallery_highlight['images']) as $key=>$img)
            $this->deleteImage( $img,GalleryHighlights::PATH );

        foreach($data['images'] as $key=>$img)
            $images_arr[$key] = $this->storeImage($img, GalleryHighlights::PATH);
        $gallery_highlight->day = $data['day'];
        $gallery_highlight->heading = $data['heading'];
        $gallery_highlight->gallery_id = $data['gallery_id'];
        $gallery_highlight->images = $images_arr;
        $gallery_highlight->save();
        return true;
    }
}
