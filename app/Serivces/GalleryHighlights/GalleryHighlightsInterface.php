<?php

namespace App\Serivces\GalleryHighlights;

interface GalleryHighlightsInterface
{
    public function createOrUpdateGalleryHighlights( $data );
    public function updateHighlights( $data );
    public function deleteGalleryHighlights( $id );
}
