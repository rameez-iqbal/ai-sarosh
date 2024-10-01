<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OurTeam extends Model
{
    use HasFactory;
    protected $table = 'our_teams';
    protected $guarded = ['id'];

    CONST PATH='teams';

    public function category() : BelongsTo
    {
        return $this->belongsTo(OurTeamRole::class,'our_team_roles_id','id');
    }
}
