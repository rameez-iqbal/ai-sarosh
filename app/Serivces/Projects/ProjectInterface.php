<?php

namespace App\Serivces\Projects;

interface ProjectInterface
{
    public function createOrUpdateProject( $data );
    public function deleteProject( $id );
}
