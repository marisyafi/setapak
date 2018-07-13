<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiJasa extends Model
{
    protected $table = 'transaksi_jasa';

    protected $primaryKey = 'transaction_id';

    public $timestamps = false;

    protected $fillable = ['transaction_id', ' pemandu_id', 'user_id', 'jasa_id', 'tanggal_booking', 'transaction_date', 'total_harga', 'photo_transfer', 'transaction_status'];

    public function user(){
        return $this->belongsTo('App\UserWisatawan', 'user_id', 'user_id');
    }

    public function jasa(){
        return $this->belongsTo('App\Jasa', 'jasa_id', 'jasa_id');
    }

    public function pemandu(){
        return $this->belongsTo('App\Pemandu', 'pemandu_id', 'pemandu_id');
    }
}

