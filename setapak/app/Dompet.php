<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    protected $table = 'dompet';

    protected $primaryKey = 'dompet_id';


    protected $fillable = ['user_id', 'tanggal_masuk', 'tanggal_keluar', 'saldo', 'nama', 'no_rekening', 'nama_bank', 'cabang', 'status', 'updated_at'];

    public function user(){
        return $this->belongsTo('App\UserWisatawan', 'user_id', 'user_id');
    }
}
