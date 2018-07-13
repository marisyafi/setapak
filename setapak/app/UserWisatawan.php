<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWisatawan extends Model
{
    protected $table = 'user';

    protected $primaryKey = 'user_id';

    public $timestamp = false;

    protected $fillable = ['user_id', 'pemandu', 'password', 'nama', 'alamat', 'no_hp', 'role', 'photo'];

    public function jasa(){
        return $this->hasMany('App\TransaksiJasa', 'user_id', 'user_id');
    }

    public function homestay(){
        return $this->hasMany('App\TransaksiHomestay', 'user_id', 'user_id');
    }

    public function barang(){
        return $this->hasMany('App\TransaksiBarang', 'user_id', 'user_id');
    }
}
