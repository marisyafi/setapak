<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Artikel extends Model
{
    use Sluggable;
 
    protected $table = 'artikel';

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
