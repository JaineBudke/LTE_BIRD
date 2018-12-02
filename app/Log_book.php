<?php

namespace BIRD;

use Illuminate\Database\Eloquent\Model;

class Log_book extends Model
{
    protected $table = 'log_book';
    
    protected $fillable = [
        'event',
        'id_user',
        'id_object'
    ];
}
