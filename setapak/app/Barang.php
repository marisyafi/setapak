<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
     protected $table = 'barang';

    protected $primaryKey = 'barang_id';

    public $timestamp = false;

    protected $fillable = ['barang_id', ' pemandu_id', 'nama_barang', 'harga', 'kuantitas', 'berat_gram', 'deskripsi', 'date_post'];

    public function daftarBarang(){
        return $this->hasMany('App\TransaksiBarang', 'barang_id', 'barang_id');
    }
}
