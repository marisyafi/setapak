<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemandu extends Model
{
    protected $table = 'pemandu';

    protected $primaryKey = 'pemandu_id';

    public $timestamp = true;

    protected $fillable = ['pemandu_id', 'nama_company', 'alamat', 'deskripsi', 'pemandu_status', 'pemandu_verifikasi' ];

    public function jasa(){
        return $this->hasMany('App\TransaksiJasa', 'pemandu_id', 'pemandu_id');
    }
    
}
