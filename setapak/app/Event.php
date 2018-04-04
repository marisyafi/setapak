<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Event extends Model
{
    use Sluggable;
 
    protected $table = 'event';

    public $timestamp = true;

    protected $fillable = [
        'id',
        'title',
        'description',
        'tanggal',
        'user',
        'picture',
        'slug'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $guarded = [];
}
