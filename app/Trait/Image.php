<?php

namespace App\Trait;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait Image
{
    public function storeImage($file,$folder='images')
    {
        if (is_file($file)) 
        {
            try {
                $this->makeFolderInPublicIfNotExists($folder);
                $path = $file->store($folder, 'public');
                $filename = basename($path);
                return $filename; 
            } catch (Exception $ex) {
                Log::info('Error on file uploading'.$ex->getMessage());
                return false;
            }
        }
    }

    public function makeFolderInPublicIfNotExists( $folder )
    {
        $folder_name = Storage::disk('public')->exists( $folder );
        if( !$folder_name )
            Storage::disk('public')->makeDirectory( $folder );
        else
            $folder_name;

        return $folder_name;
    }

    public function deleteImage( $image , $folder )
    {
        $image_exists = Storage::disk('public')->exists($folder.'/' . $image);
        if( !is_null( $image_exists ) )
            return Storage::disk('public')->delete($folder.'/' . $image);
        else
            return false;
    }
}
