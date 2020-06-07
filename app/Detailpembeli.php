<?php

namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Detailpembeli extends Model
{
    protected $table = "detailpembeli";
    protected $primaryKey = 'Id_detail';
    protected $fillable = ['IdBeli', 'ID_Kendaraan'];
    public $timestamps = false;

    public function beli()
    {
        return $this->belongsTo('App\Beli', 'IdBeli', 'IdBeli');
    }

    public function kendaraan()
    {
        return $this->belongsTo('App\Kendaraan', 'ID_Kendaraan', 'ID_Kendaraan');
    }
}
