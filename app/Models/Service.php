<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'thematic_services'; // should be a string
    protected $primaryKey = 'id';

    CONST PATH='services';
}
