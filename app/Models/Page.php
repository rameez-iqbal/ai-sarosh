<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    public $table = 'pages';
    public $guarded = ['id'];

    CONST PATH='home';

    public function scopegetPagesName( )
    {
        return $this->whereNotNull('name');
    }
}
