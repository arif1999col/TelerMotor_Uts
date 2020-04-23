<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    //
    protected $table = "karyawan";
    protected $primaryKey = 'Kd_Karyawan';
    protected $fillable = ['Nama_Karyawan', 'JenisKelamin','Umur' ,'Alamat'];
    public $timestamps = false;
}
