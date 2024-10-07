<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryHighlights extends Model
{
    use HasFactory;
    protected $table = 'gallery_highlights';
    protected $fillable = 
    [
        'day','heading','images'
    ];
    CONST PATH='highlights';
    public function gallery() :BelongsTo
    {
        return $this->belongsTo(Gallery::class,'gallery_id','id');
    }
}
