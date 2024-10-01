<?php

namespace App\Serivces\ThematicServices;

interface ThematicInterface
{
    public function createOrUpdateService( $data );
    public function deleteService( $id );
}
