<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'alamatcategory';

    protected $primaryKey = 'alamatcategory_id';

    public $timestamps = false;

    protected $fillable = ['provinsi', 'kabupaten', 'kecamatan', 'kode_pos'];
}
