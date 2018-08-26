<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'wisatacategory';

    protected $primaryKey = 'wisatacategory_id';

    public $timestamps = false;

    protected $fillable = ['alamatcategory_id', 'nama_wisata'];

    public function alamat(){
        return $this->belongsTo('App\Alamat', 'alamatcategory_id', 'alamatcategory_id');
    }

    public function daftarHomestay(){
        return $this->hasMany('App\Homestay', 'wisatacategory_id', 'wisatacategory_id');
    }
}
