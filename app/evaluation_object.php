<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class evaluation_object extends Model
{
    protected $table = 'object_evaluation';
    
    protected $fillable = [
        'evaluation',
        'id_user',
        'id_object'
    ];
}
