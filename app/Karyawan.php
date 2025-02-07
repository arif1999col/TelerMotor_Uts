<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = "karyawan";
    protected $primaryKey = 'Kd_Karyawan';
    protected $fillable = ['Nama_Karyawan', 'JenisKelamin','Umur' ,'Alamat'];
    public $timestamps = false;

    public function beli(){ 
        return $this->hasMany('App\Beli', 'Kd_Karyawan', 'Kd_Karyawan');
    }
}
