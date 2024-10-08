<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = 
    [
        'title','university','logo','image','country_id'
    ];
    CONST PATH="projects";

    public function details()
    {
        return $this->hasOne(ProjectDetail::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id','id');

    }
}
