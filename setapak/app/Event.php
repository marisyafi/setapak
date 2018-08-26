<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';

    public $timestamp = true;

    protected $fillable = ['title', 'description', 'tanggalpelaksanan', 'link', 'user', 'picture', 'status'];

    protected $guarded = [];
}
