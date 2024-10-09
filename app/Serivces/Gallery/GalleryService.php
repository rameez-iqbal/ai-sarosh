<?php

namespace App\Serivces\Gallery;

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

class GalleryService implements GalleryInterface
{
    use Image;
    public function createOrUpdateGallery($data)
    {
        DB::beginTransaction();
        try {
            if (array_key_exists('banner_images', $data)) {
                $banner_images = $data['banner_images'];
            }
            if (array_key_exists('gallery_id', $data) && $data['gallery_id'] != 0 && !is_null($data['gallery_id'])) {
                $gallery = Gallery::find($data['gallery_id']);
                if (!is_null($gallery->banner_images)) {
                    foreach (json_decode($gallery->banner_images) as $banner_image)
                        $this->deleteImage($banner_image, Gallery::PATH);
                }
                if (!is_null($gallery->gallery_images)) {
                    foreach (json_decode($gallery->gallery_images) as $gallery_image)
                        $this->deleteImage($gallery_image, Gallery::PATH);
                }
            } else {
                $gallery = new Gallery();
                $unqiue_slug = generateSlug($gallery, array_key_exists('heading', $data) ? $data['heading'] : 'Gallery', 'slug');
            }
            $banner_imgs = [];
            $gallery_imgs = [];

            if (array_key_exists('banner_images', $data) && !is_null($data['banner_images'])) {
                foreach ($data['banner_images'] as $key => $banner_image)
                    $banner_imgs[$key] = $this->storeImage($banner_image, Gallery::PATH);
            }
            if (array_key_exists('gallery_images', $data) && !is_null($data['gallery_images'])) {
                foreach ($data['gallery_images'] as $key => $gallery_image)
                    $gallery_imgs[$key] = $this->storeImage($gallery_image, Gallery::PATH);
            }
            $gallery->type            = $data['type'] ?? null;
            $gallery->heading            = $data['heading'] ?? null;
            $gallery->post_url             = $data['post_url'] ?? null;
            $gallery->recording_url             = $data['recording_url'] ?? null;
            $gallery->description    =  $data['description'] ?? null;
            $gallery->slug    =  $unqiue_slug ?? $gallery->slug;
            $gallery->banner_images     = count($banner_imgs) > 0 ?  json_encode($banner_imgs) : null;
            $gallery->gallery_images    = count($gallery_imgs) > 0 ? json_encode($gallery_imgs) : null;
            $gallery->library_type_id = $data['library_type_id'] ?? 1;
            $gallery->save();
            DB::commit();
            return true;
        } catch (Exception $ex) {
            DB::rollBack();
            Log::info("Error  => " . $ex->getMessage());
            return $ex->getMessage();
        }
    }

    public function deleteGallery($id)
    {
        DB::beginTransaction();
        try {
            $gallery = Gallery::with('highlights')->find($id);
            if (count($gallery->highlights)>0) {
                foreach ($gallery?->highlights as $highlight) {
                    $highlight_images = json_decode($highlight['images']);
                    for ($i = 0; $i < count($highlight_images); $i++)
                        $this->deleteImage($highlight_images[$i], GalleryHighlights::PATH);
                    $highlight->delete();
                }
            }
            if(!is_null($gallery->banner_images)) {
                $banner_images = json_decode($gallery->banner_images);
                if (!is_null($banner_images) && count($banner_images) > 0) {
                    for ($i = 0; $i < count($banner_images); $i++)
                        $this->deleteImage($banner_images[$i], Gallery::PATH);
                }
            }
            if(!is_null($gallery->gallery_images)) {
                $gallery_images = json_decode($gallery->gallery_images);
                if (!is_null($gallery_images) && count($gallery_images) > 0) {
                    for ($i = 0; $i < count($gallery_images); $i++)
                        $this->deleteImage($gallery_images[$i], Gallery::PATH);
                }
            }
            $gallery->delete();
            DB::commit();
            return true;
        } catch (Exception $ex) {
            DB::rollBack();
            Log::info("Delete Gallery" . $ex->getMessage());
            return $ex->getMessage();
        }
    }

    public function storeGalleryImages() {}
}
