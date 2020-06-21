<?php

namespace App\Http\Controllers;
use App\Karyawan;
use App\Beli;
use App\Kendaraan;
use App\Pembeli;
use Illuminate\Http\Request;

class BeliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title='Beli';
        $beli=Beli::paginate(5);
        return view('admin.beli',compact('title','beli'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Input Beli';
        $pembeli = Pembeli::get();
        $karyawan = Karyawan::get();
        return view('admin.inputbeli',compact('title','pembeli'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'requieed'=> 'Kolom: Huruf Harus lengkap',
            'date'=>'Kolom Tanggal Harus Lengkap',
            'numeric'=>'Kolom harus Nomor',
        ];
       $validasi = $request->validate([
        'Kd_Karyawan' => 'required',
        'Id_Pembelian' => 'required',
        'waktu' =>'required'
       ],$messages);
        Beli::create($validasi);
        return redirect('beli');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title='Input beli';
        $pembeli = Pembeli::get();
        $beli=Beli::find($id);
        return view('admin.inputbeli',compact('title','beli','pembeli'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'requieed'=> 'Kolom: Huruf Harus lengkap',
            'date'=>'Kolom Tanggal Harus Lengkap',
            'numeric'=>'Kolom harus Nomor',
        ];
       $validasi = $request->validate([
        'Kd_Karyawan' => 'required',
        'Id_Pembelian' => 'required',
       ],$messages);
       Beli::where('IdBeli',$id)->update($validasi);
        return redirect('beli');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Beli::where('IdBeli',$id)->delete();
        return redirect('beli')->with('success','Data Terhapus');
    }
}
