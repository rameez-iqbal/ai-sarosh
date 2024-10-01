<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    public $table = 'settings';
    public $guarded = ['id'];

    CONST PATH='setting';
}
