<?php

namespace App\Http\Controllers;
use App\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class KendaraanController extends Controller
{


  public function __construct()
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('Admin')) return $next($request);
            if(Gate::allows('Bos')) return $next($request);
            if(Gate::allows('Menejer')) return $next($request);
            abort(403,'Anda Tidak Memiliki Hak Akses!!!');
        });
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $title='Kendaraan';
        $kendaraan=Kendaraan::paginate(5);
        return view('admin.kendaraan',compact('title','kendaraan'));
}


    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title='Input kendaraan';
        return view('admin.inputkendaraan',compact('title'));
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
        'NamaMotor' => 'required',
        'HargaMotor' => 'required',
        'Tahun' => 'numeric',
        'DkMotor' => '',
        'Status' => 'required',
       ],$messages);
        Kendaraan::create($validasi);
        return redirect('kendaraan');
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
        $title='Input kendaraan';
        $kendaraan=Kendaraan::find($id);
        return view('admin.inputkendaraan',compact('title','kendaraan'));
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
        'NamaMotor' => 'required',
        'HargaMotor' => 'required',
        'Tahun' => 'numeric',
        'DkMotor' => 'required',
        'Status' => 'required',
       ],$messages);
        Kendaraan::where('ID_Kendaraan',$id)->update($validasi);
        return redirect('kendaraan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kendaraan::where('ID_Kendaraan',$id)->delete();
        return redirect('kendaraan')->with('success','Data Terhapus');
    }
}
