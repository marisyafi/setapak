<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table = 'alamatcategory';

    protected $primaryKey = 'alamatcategory_id';

    public $timestamps = false;

    protected $fillable = ['provinsi', 'kabupaten', 'kecamatan', 'kode_pos'];

    public function lokasi(){
        return $this->hasMany('App\Lokasi', 'alamatcategory_id', 'alamatcategory_id');
    }

    public function daftarHomestay(){
        return $this->hasMany('App\Homestay', 'alamatcategory_id', 'alamatcategory_id');
    }
}
