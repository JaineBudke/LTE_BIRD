<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thematic_unit extends Model
{
    protected $table = 'thematic_unit';
    
    protected $fillable = [
        'thematic',
        'id_object'
    ];
}
