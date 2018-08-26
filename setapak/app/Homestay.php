<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homestay extends Model
{
    protected $table = 'homestay';

    protected $primaryKey = 'homestay_id';

    public $timestamp = false;

    protected $fillable = [' pemandu_id', 'fasilitas_id', 'alamatcategory_id', 'wisatacategory_id', 'nama_homestay',                             'harga_perhari', 'deskripsi', 'alamat', 'status_avail', 'mainphoto'];

    public function daftar(){
        return $this->hasMany('App\TransaksiHomestay', 'homestay_id', 'homestay_id');
    }

    public function alamat(){
        return $this->belongsTo('App\Alamat', 'alamatcategory_id', 'alamatcategory_id');
    }

    public function lokasi(){
        return $this->belongsTo('App\Lokasi', 'wisatacategory_id', 'wisatacategory_id');
    }
}
