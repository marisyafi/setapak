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

    public function homestay(){
        return $this->hasMany('App\TransaksiHomestay', 'pemandu_id', 'pemandu_id');
    }

    public function barang(){
        return $this->hasMany('App\TransaksiBarang', 'pemandu_id', 'pemandu_id');
    }

    public function user(){
        return $this->belongsTo('App\UserWisatawan', 'user_id', 'user_id');
    }
    
}
