<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurClient extends Model
{
    use HasFactory;
    public $table = 'our_clients';
    public $guarded = ['id'];

    CONST PATH='ourclients';
}
