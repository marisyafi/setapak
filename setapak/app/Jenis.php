<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jeniscategory';

    protected $primaryKey = 'jeniscategory_id';

    public $timestamps = false;

    protected $fillable = ['nama_jeniscategory'];

    public function daftarJasa(){
        return $this->hasMany('App\Jasa', 'jeniscategory_id', 'jeniscategory_id');
    }
    
}
