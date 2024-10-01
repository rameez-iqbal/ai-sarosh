<?php

namespace App\Serivces\Webinars;

interface WebinarsInterface
{
    public function createOrUpdateWebinars( $data );
    public function deleteWebinars( $id );
}
