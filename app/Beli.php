<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beli extends Model
{
    protected $table = 'beli';
    protected $primaryKey = 'IdBeli';
    protected $fillable = ['waktu', 'tanggal','Kd_Karyawan' ,'IdPembeli'];
    public $timestamps = false;


    public function karyawan(){
        return $this->hasMany(Karyawan::class);
    }

    public function pembeli(){
        return $this->belongsTo(Pembeli::class);
    }
}
