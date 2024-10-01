<?php

namespace App\Serivces\Reports;

interface ReportInterface
{
    public function createOrUpdateReport( $data );
    public function deleteReport( $id );
}
