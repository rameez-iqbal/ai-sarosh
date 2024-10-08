<?php

namespace App\Serivces\Gallery;

interface GalleryInterface
{
    public function createOrUpdateGallery( $data );
    public function deleteGallery( $id );
}
