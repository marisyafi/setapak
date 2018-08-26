<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
     protected $table = 'jasa';

    protected $primaryKey = 'jasa_id';

    public $timestamps = false;

    protected $fillable = ['pemandu_id', 'alamatcategory_id', 'jeniscategory_id', 'nama_jasa', 'harga_jasa', 'deskripsi', 'lokasi_wisata', 'status_avail'];

    public function daftarJasa(){
        return $this->hasMany('App\TransaksiJasa', 'jasa_id', 'jasa_id');
    }

    public function pemandu(){
        return $this->belongsTo('App\Pemandu', 'pemandu_id', 'pemandu_id');
    }

    public function jenis(){
        return $this->belongsTo('App\Jenis', 'jeniscategory_id', 'jeniscategory_id');
    }
}
