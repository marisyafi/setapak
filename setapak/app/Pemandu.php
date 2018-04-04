<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemandu extends Model
{
    protected $table = 'pemandu';

    public $timestamp = true;

    protected $fillable = [
        'id',
        'username',
        'name',
        'password',
        'email',
        'no_telp',
        'picture',
    ];
}
