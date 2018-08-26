<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiHomestay extends Model
{
    protected $table = 'transaksi_homestay';

    protected $primaryKey = 'transaction_id';

    public $timestamps = false;

    protected $fillable = ['transaction_id', ' pemandu_id', 'user_id', 'homestay_id', 'check_in', 'check_out', 'jumlah_hari', 'transaction_date', 'endtransaction_date', 'total_harga', 'photo_transfer', 'transaction_status', 'notifikasi_status'];

    public function user(){
        return $this->belongsTo('App\UserWisatawan', 'user_id', 'user_id');
    }

    public function daftar(){
        return $this->belongsTo('App\Homestay', 'homestay_id', 'homestay_id');
    }

    public function pemandu(){
        return $this->belongsTo('App\Pemandu', 'pemandu_id', 'pemandu_id');
    }
}