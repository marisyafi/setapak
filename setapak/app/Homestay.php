<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
     protected $table = 'homestay';

    protected $primaryKey = 'homestay_id';

    public $timestamp = false;

    protected $fillable = ['homestay_id', ' pemandu_id', 'fasilitas_id', 'alamatcategory_id', 'nama_homestay', 'harga_perhari', 'tanggal_startavail', 'tanggal_stopavail', 'deskripsi', 'alamat'];

    public function daftar(){
        return $this->hasMany('App\TransaksiHomestay', 'homestay_id', 'homestay_id');
    }
}
