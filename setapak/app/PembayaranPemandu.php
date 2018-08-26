<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranPemandu extends Model
{
    protected $table = 'pembayaran_pemandu';

    protected $primaryKey = 'pembayaran_id';

    public $timestamps = false;

    protected $fillable = ['pemandu_id', 'tanggal_transfer', 'total', 'bulan', 'jenis'];
}
