<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class axles_guiding extends Model
{
    
    protected $table = 'axles_guiding';
    
    protected $fillable = [
        'axles',
        'id_object'
    ];
    
}
