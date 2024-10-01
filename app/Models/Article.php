<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table='articles';
    protected $guarded = ['id'];
    CONST PATH='articles';

    public function libraryType()
    {
        return $this->belongsTo(LibraryTypes::class,'library_type_id','id');
    }
}
