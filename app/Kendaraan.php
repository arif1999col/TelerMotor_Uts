<?php
namespace App;
use DB;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    //
    protected $table = "kendaraan";
    protected $primaryKey = 'ID_Kendaraan';
    protected $fillable = ['NamaMotor', 'HargaMotor','DkMotor' ,'Tahun','Status'];
    public $timestamps = false;


    public function sum(){
        $total = 0;
        foreach($this-> $kendaraan as $kendaraan){
            $total = $total + $kendaraan->pivot->HargaMotor;
        }
        return $total;
    }


    public function detailpembeli()
    {
        return $this->hasMany('App\Detailpembeli', 'ID_Kendaraan', 'ID_Kendaraan');
    }
}

