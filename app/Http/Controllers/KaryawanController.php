<?php

namespace App\Http\Controllers;
use App\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class KaryawanController extends Controller
{     public function __construct()
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('Admin')) return $next($request);
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
        $title='karyawan';
        $karyawan=Karyawan::paginate(5);
        return view('admin.karyawan',compact('title','karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $this->middleware(function($request, $next){
            if(Gate::allows('Menejer')) return $next($request);
            abort(403,'Anda Tidak Memiliki Hak Akses!!!');
        });
    
        $this->middleware(function($request, $next){
            if(Gate::allows('Bos')) return $next($request);
            if(Gate::allows('Menejer')) return $next($request);
            abort(403,'Anda Tidak Memiliki Hak Akses!!!');
        });
        $title='Input karyawan';
        return view('admin.inputkaryawan',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware(function($request, $next){
            if(Gate::allows('Bos')) return $next($request);
            if(Gate::allows('Menejer')) return $next($request);
            abort(403,'Anda Tidak Memiliki Hak Akses!!!');
        });
        $messages = [
            'requieed'=> 'Kolom: Huruf Harus lengkap',
            'date'=>'Kolom Tanggal Harus Lengkap',
            'numeric'=>'Kolom harus Nomor',
        ];
       $validasi = $request->validate([
        'Nama_Karyawan' => 'required',
        'JenisKelamin' => 'required',
        'Umur' => 'numeric',
        'Alamat' => 'required',
        
       ],$messages);
        Karyawan::create($validasi);
        return redirect('karyawan');
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
        $title='Input karyawan';
        $karyawan=Karyawan::find($id);
        return view('admin.inputkaryawan',compact('title','karyawan'));
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
        'Nama_Karyawan' => 'required',
        'JenisKelamin' => 'required',
        'Umur' => 'numeric',
        'Alamat' => 'required',
       ],$messages);
        Karyawan::where('Kd_Karyawan',$id)->update($validasi);
        return redirect('karyawan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karyawan::where('Kd_Karyawan',$id)->delete();
        return redirect('karyawan')->with('success','Data Terhapus');
    }
}
