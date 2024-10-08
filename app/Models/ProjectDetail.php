<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDetail extends Model
{
    use HasFactory;
    protected $table = 'project_details';
    protected $fillable = 
    [
        'pi','co_pi','start_date','end_date','timeline','project_teams','url','about_description','image','project_id'
    ];
    CONST PATH="project_details";

    public function details()
    {
        return $this->belongsTo(Project::class,'project_id','id');
    }
}
