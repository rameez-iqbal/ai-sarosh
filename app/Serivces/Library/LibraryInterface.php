<?php

namespace App\Serivces\Library;

interface LibraryInterface
{
    public function createOrUpdateLibrary( $data );
    public function deleteLibrary( $id );
}
