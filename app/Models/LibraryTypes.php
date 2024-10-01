<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryTypes extends Model
{
    use HasFactory;
    protected $table = 'library_types';
    protected $guarded = ['id'];
    CONST PATH='library';

    public static function getIdBySlug( $slug )
    {
        return LibraryTypes::where('slug',$slug)->value('id');
    }
}
