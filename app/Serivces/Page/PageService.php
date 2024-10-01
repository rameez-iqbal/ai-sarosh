<?php

namespace App\Serivces\Page;

use App\Models\Page;
use App\Trait\Image;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PageService implements PageInterface
{
    use Image;
    public function createOrUpdatePage($data)
    {
        $unqiue_slug = null;
        DB::beginTransaction();
        try 
        {
            if(array_key_exists('image',$data)){
                $image = $data['image'];
            }
            if(array_key_exists('section_image',$data)) {
                $image = $data['section_image'];
            }
            if( array_key_exists('page_id',$data) && $data['page_id'] != 0 && !is_null( $data['page_id'] ))
            {
                $page = Page::find( $data['page_id'] );
                if(!is_null($page->page)) {
                    if(array_key_exists('image',$data)){
                        $image = $data['image'] ?? $page->image;
                    }
                    if(array_key_exists('section_image',$data)) {
                        $image = $data['section_image'] ?? $page->image;
                    }
                    if( $page &&  $page->image !=  $image->getClientOriginalName())
                        $this->deleteImage( $page->image,Page::PATH );
                }
            }
            else 
            {
                $page = new Page();
                $unqiue_slug = generateSlug($page,array_key_exists('page',$data) ? $data['page'] : $data['heading'],'slug');
            }
            $page->name             = array_key_exists('page',$data) ? $data['page'] : null;
            $page->heading          = array_key_exists('heading',$data) ? $data['heading'] : null;
            $page->sub_heading      = array_key_exists('sub_heading',$data) ? $data['sub_heading'] : null;
            $page->description      = array_key_exists('description',$data) ? $data['description'] : null;
            $page->type             = $data['type'];
            $page->slug             = !is_null($unqiue_slug) ? $unqiue_slug : $page->slug;
            $page->image            = !is_null($page->image) ? (($page->image !=  $image->getClientOriginalName()) ? $this->storeImage($image, 'home') : $page->image ): null;
            $page->user_id          = auth()->user()->id;
            $page->save();
            DB::commit();
            return $page->type;
        } 
        catch (Exception $ex) 
        {
            DB::rollBack();
            Log::info("Page Create=> ".$ex->getMessage());
            return $ex->getMessage();
        }        
    }

    public function deletePage( $id )
    {
        try 
        {
            $page = Page::find($id);
            $this->deleteImage( $page->image,Page::PATH );
            $page->delete();
            return true;
        } 
        catch (Exception $ex) 
        {
            Log::info("Delete Page". $ex->getMessage() );
            return $ex->getMessage();
        }
    }
}
