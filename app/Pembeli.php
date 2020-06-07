<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    //
    protected $table = "pembeli";
    protected $primaryKey = 'Id_Pembelian';
    protected $fillable = ['NamaPembeli', 'Alamat','Telp'];
    public $timestamps = false;

    public function beli(){ 
        return $this->hasMany('App\Beli', 'Id_Pembelian', 'Id_Pembelian');
}
}
