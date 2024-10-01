<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeamRole extends Model
{
    use HasFactory;
    protected $table = 'our_team_roles';
    protected $guarded = ['id'];
}
