<?php

namespace BIRD;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{

    protected $table = 'objects';

    protected $fillable = [
        'title',
        'image',
        'link',
        'description',
        'educationLevel',
        'acessLevel',
        'evaluation',
        'numberEvaluations',
        'requested',
        'status',
        'id_user'
    ];
    
}
