<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $fillable = 
    [
        'title',
        'organization',
        'description',
        'report_file',
        'image'
    ];
    CONST PATH='reports';
    
    public function libraryType()
    {
        return $this->belongsTo(LibraryTypes::class,'library_type_id','id');
    }
}
