<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
     protected $table = 'jasa';

    protected $primaryKey = 'jasa_id';

    public $timestamp = false;

    protected $fillable = ['jasa_id', ' pemandu_id', 'alamatcategory_id', 'nama_jasa', 'harga_jasa', 'deskripsi', 'lokasi_wisata', 'status_avail'];

    public function daftarJasa(){
        return $this->hasMany('App\TransaksiJasa', 'jasa_id', 'jasa_id');
    }
}
