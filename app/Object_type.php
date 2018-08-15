<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Object_type extends Model
{

    protected $table = 'object_types';

    protected $fillable = [
        'type',
        'id_object'
    ];
}
