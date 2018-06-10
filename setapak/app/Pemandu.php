<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemandu extends Model
{
    protected $table = 'pemandu';

    protected $primaryKey = 'pemandu_id';

    public $timestamp = true;

    protected $fillable = [
        'nama_company',
        'alamat',
        'deskripsi',
        'pemandu_status',
        'pemandu_verifikasi',
    ];
    
}
