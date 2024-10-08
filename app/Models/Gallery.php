<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'galleries';
    protected $fillable = 
    [
        'heading','description','banner_images','gallery_images','post_url'
    ];
    protected $casts = [
        'gallery_images'=>'array',
        'banner_images'=>'array',
    ]; 
    CONST PATH="gallery";
    public function libraryType()
    {
        return $this->belongsTo(LibraryTypes::class,'library_type_id','id');
    }

    public function highlights()
    {
        return $this->hasMany(GalleryHighlights::class);
    }
}
