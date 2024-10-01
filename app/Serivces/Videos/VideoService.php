<?php
namespace App\Serivces\Videos;

use App\Models\Article;
use App\Models\Video;
use App\Models\Webinar;
use App\Serivces\Articles\ArticlesInterface;
use App\Trait\Image;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VideoService implements VideoInterface
{
    use Image;
    public function createOrUpdateVideo($data)
    {   
        DB::beginTransaction();
        try 
        {
            if(array_key_exists('image',$data)){
                $image = $data['image'];
            }
            if(array_key_exists('video',$data)){
                $video_url = $data['video'];
            }

            if( array_key_exists('video_id',$data) && $data['video_id'] != 0 && !is_null( $data['video_id'] ))
            {
                $video = Video::find( $data['video_id'] );
                if(array_key_exists('image',$data)){
                    $image = $data['image'] ?? $video->image;
                }
                if( $video &&  $video->image !=  $image->getClientOriginalName())
                    $this->deleteImage( $video->image,Video::PATH );

                if(array_key_exists('video',$data))
                    $this->deleteImage( $video->video_link,Video::PATH );
            }
            else 
                $video = new Video();
            $video->title            = $data['title'] ?? null;
            $video->name            =  $data['name'] ?? null;
            $video->organization    =  $data['organization'] ?? null;
            $video->library_type_id = $data['library_type_id'] ?? 1;
            $video->iframe_url     =  null;
            $video->image           = ($video->image !=  $image->getClientOriginalName()) ? $this->storeImage($image, Video::PATH) : $video->image;
            $video->video_link       = array_key_exists('video',$data) ? $this->storeImage($video_url, Video::PATH) : $video->video_url;
            $video->save();
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

    public function deleteVideo( $id )
    {
        try 
        {
            $video = Video::find($id);
            $this->deleteImage( $video->image,Video::PATH );
            $video->delete();
            return true;
        } 
        catch (Exception $ex) 
        {
            Log::info("Delete Article". $ex->getMessage() );
            return $ex->getMessage();
        }
    }
}
