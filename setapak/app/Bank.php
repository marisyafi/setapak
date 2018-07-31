<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';

    protected $primaryKey = 'bank_id';

    public $timestamp = false;

    protected $fillable = ['nama_bank', 'no_rekening', 'photo', 'updated_at', 'created_at'];
}
