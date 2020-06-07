<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Beli extends Model
{
    protected $table = "beli";
    protected $fillable = ['IdBeli', 'waktu', 'Kd_Karyawan', 'IdPembeli'];
    public $timestamps = false;
}
