<?php
namespace App\Serivces\Library;

use App\Models\LibraryTypes;
use App\Trait\Image;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LibraryService implements LibraryInterface
{
    use Image;
    public function createOrUpdateLibrary($data)
    {
        DB::beginTransaction();
        try 
        {
            if(array_key_exists('image',$data)){
                $image = $data['image'];
            }

            if( array_key_exists('library_id',$data) && $data['library_id'] != 0 && !is_null( $data['library_id'] ))
            {
                $library = LibraryTypes::find( $data['library_id'] );
                $unqiue_slug = $library->slug;
                if(array_key_exists('image',$data)){
                    $image = $data['image'] ?? $library->image;
                }
                if( $library &&  $library->image !=  $image->getClientOriginalName())
                    $this->deleteImage( $library->image,LibraryTypes::PATH );
            }
            else 
            {
                $library = new LibraryTypes();
                $unqiue_slug = generateSlug($library,array_key_exists('type',$data) ? $data['type'] : 'Webinars','slug');
            }
            $library->type            = array_key_exists('type',$data) ? $data['type'] : null;
            $library->slug            = $unqiue_slug;
            $library->image           = ($library->image !=  $image->getClientOriginalName()) ? $this->storeImage($image, LibraryTypes::PATH) : $library->image;
            $library->save();
            DB::commit();
            return true;
        } 
        catch (Exception $ex) 
        {
            DB::rollBack();
            Log::info("Library => ".$ex->getMessage());
            return $ex->getMessage();
        }        
    }

    public function deleteLibrary( $id )
    {
        try 
        {
            $library = LibraryTypes::find($id);
            $this->deleteImage( $library->image,LibraryTypes::PATH );
            $library->delete();
            return true;
        } 
        catch (Exception $ex) 
        {
            Log::info("Delete Library". $ex->getMessage() );
            return $ex->getMessage();
        }
    }
}
