<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Beli extends Model
{
    protected $table = "beli";
    protected $primaryKey = 'IdBeli';
    protected $fillable = ['waktu', 'Kd_Karyawan', 'Id_Pembelian'];
    public $timestamps = false;

    public function karyawan(){ 
            return $this->belongsTo('App\Karyawan', 'Kd_Karyawan', 'Kd_Karyawan');
    }

    public function pembeli(){ 
        return $this->belongsTo('App\Pembeli', 'Id_Pembelian', 'Id_Pembelian');
    }

    public function detailpembeli()
    {
        return $this->hasMany('App\Detailpembeli', 'IdBeli', 'IdBeli');
    }
    
}
