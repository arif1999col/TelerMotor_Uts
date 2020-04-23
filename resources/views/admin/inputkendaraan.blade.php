@extends("layout/admin") 
@section('content')
<div class="page-header">
   <div class="page-header-content">
       <div >
           <h4 class="">
               <i class="icon-home position-left"></i>
               <span class="text-semibold">Daftar kendaraan</span></h4>
           <a class="heading-elements-toggle">
               <i class="icon-more"></i>
           </a>
       </div>
       <div class="heading-elements">
           <ul class="breadcrumb position-right">
               <li>
               <a href="{{route('karyawan.index')}}">Home</a>
               </li>
               <li>
               <a href="">Input Menu</a>
               </li>
               <li class="active"></li>
           </ul>
       </div>
   </div>
   <!-- /header content -->
</div>
<div class="container-fluid">
<h3 class="page-title">Input Menu</h3>
    <div id="toastr-demo" class="panel">
    <form action="{{(isset($kendaraan))?route('kendaraan.update',$kendaraan->ID_Kendaraan):route('kendaraan.store')}}" method="POST">
        @csrf
        @if(isset($kendaraan))?@method('PUT')@endif

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">

                    <!-- Horizontal form -->
                        <div class="card-body">
                            <form action="#">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" required="required">Nama kendaraan</label>
                                    <div class="col-lg-12">
                                    <input type="text"  value="{{(isset($kendaraan))?$kendaraan->NamaMotor:old('NamaMotor')}}" name="NamaMotor" class="form-control">
                                    @error('NamaMotor')<small style="color:red">{{$message}}</small>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" required="required">Status</label>
                                    <div class="col-lg-9">
                                        <select name="Status" class="form-control">
                                            <option value="Terjual">Terjual</option>
                                            <option value="Belum">Belum Terjual</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" required="required">Tahun kendaraan</label>
                                    <div class="col-lg-12">
                                    <input type="text"  value="{{(isset($kendaraan))?$kendaraan->Tahun:old('Tahun')}}" name="Tahun" class="form-control">
                                    @error('Tahun')<small style="color:red">{{$message}}</small>@enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" required="required">DkMotor kendaraan</label>
                                    <div class="col-lg-12">
                                    <input type="text"  value="{{(isset($kendaraan))?$kendaraan->DkMotor:old('DkMotor')}}" name="DkMotor" class="form-control">
                                    @error('DkMotor')<small style="color:red">{{$message}}</small>@enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" required="required">Harga</label>
                                    <div class="col-lg-12">
                                    <input type="text"  value="{{(isset($kendaraan))?$kendaraan->HargaMotor:old('HargaMotor')}}" name="HargaMotor" class="form-control">
                                    @error('HargaMotor')<small style="color:red">{{$message}}</small>@enderror
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">SIMPAN <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /horizotal form -->
                </div>
            </div>
    </form>
                </div>
            </div> 
        </div>
    </div>
@endsection