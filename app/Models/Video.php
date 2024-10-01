<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';
    protected $guarded = ['id'];

    CONST PATH='videos';
    public function libraryType()
    {
        return $this->belongsTo(LibraryTypes::class,'library_type_id','id');
    }
}
