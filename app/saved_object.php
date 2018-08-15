<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saved_object extends Model
{
         
    protected $table = 'saved_objects';
    
    protected $fillable = [
        'id_object',
        'id_user'
    ];

}
