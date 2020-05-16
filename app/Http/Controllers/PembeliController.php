<?php

namespace App\Http\Controllers;
use App\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PembeliController extends Controller
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
        $title='pembeli';
        $pembeli=Pembeli::paginate(5);
        return view('admin.pembeli',compact('title','pembeli'));
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
        $title='Input pembeli';
        return view('admin.inputpembeli',compact('title'));
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
        'NamaPembeli' => 'required',
        'Alamat' => 'required',
        'Telp' => 'numeric',
       ],$messages);
        Pembeli::create($validasi);
        return redirect('pembeli');
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
        $title='Input pembeli';
        $pembeli=Pembeli::find($id);
        return view('admin.inputpembeli',compact('title','pembeli'));
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
        'NamaPembeli' => 'required',
        'Alamat' => 'required',
        'Telp' => 'numeric',
       ],$messages);
       Pembeli::where('Id_Pembelian',$id)->update($validasi);
        return redirect('pembeli');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembeli::where('Id_Pembelian',$id)->delete();
        return redirect('pembeli')->with('success','Data Terhapus');
    }
}
