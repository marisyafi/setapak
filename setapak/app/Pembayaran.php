<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    public $timestamp = true;

    protected $fillable = [
        'id',
        'user',
        'no_order',
        'tanggal_transaksi',
        'tanggal_pembayaran',
        'total',
        'picture',
    ];
}
