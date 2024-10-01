<?php

namespace App\Serivces\OurTeam;

interface OurTeamInterface
{
    public function createOrUpdateTeam( $data );
    public function deleteTeam( $id );
}
