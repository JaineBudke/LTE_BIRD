<?php

namespace BIRD;

use Illuminate\Database\Eloquent\Model;

class Age_range extends Model
{

    protected $table = 'age_range';

    protected $fillable = [
        'age',
        'id_object'
    ];
}
