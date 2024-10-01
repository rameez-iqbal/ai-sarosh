<?php

namespace App\Serivces\Videos;

interface VideoInterface
{
    public function createOrUpdatevideo( $data );
    public function deleteVideo( $id );
}
