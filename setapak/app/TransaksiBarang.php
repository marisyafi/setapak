<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiBarang extends Model
{
    protected $table = 'transaksi_barang';

    protected $primaryKey = 'transaction_id';

    public $timestamps = false;

    protected $fillable = ['transaction_id', ' pemandu_id', 'user_id', 'barang_id', 'jumlah_barang', 'ongkos_kirim', 'total_harga', 'transaction_date', 'transaction_status', 'no_resi', 'photo_ransfer'];

    public function user(){
        return $this->belongsTo('App\UserWisatawan', 'user_id', 'user_id');
    }

    public function daftarBarang(){
        return $this->belongsTo('App\Barang', 'barang_id', 'barang_id');
    }
}
