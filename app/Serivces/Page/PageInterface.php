<?php

namespace App\Serivces\Page;

interface PageInterface
{
    public function createOrUpdatePage( $data );
    public function deletePage( $id );
}
