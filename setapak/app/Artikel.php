<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{ 
    protected $table = 'artikel';

    public $timestamp = true;

    protected $fillable = ['id', 'title', 'description', 'user', 'picture', 'sumber'];

    protected $guarded = [];
}