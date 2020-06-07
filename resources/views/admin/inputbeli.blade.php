@extends("layout/admin") 
@section('content')
<div class="page-header">
   <div class="page-header-content">
       <div >
           <h4 class="">
               <i class="icon-home position-left"></i>
               <span class="text-semibold">Daftar Karyawan</span></h4>
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
    <form action="{{(isset($beli))?route('beli.update',$beli->IdBeli):route('beli.store')}}" method="POST">
        @csrf
        @if(isset($beli))?@method('PUT')@endif

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">

                    <!-- Horizontal form -->
                        <div class="card-body">
                            <form action="#">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" required="required">Nama karyawan</label>
                                    <div class="col-lg-12">
                                    <input type="text"  value="{{(isset($beli))?$beli->karyawan->Nama_Karyawan:old('Nama_Karyawan')}}" name="Kd_Karyawan" class="form-control">
                                    @error('Kd_Karyawan')<small style="color:red">{{$message}}</small>@enderror
                                    </div>
                                </div>

                

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" required="required">Pembeli</label>
                                    <div class="col-lg-12">
                                    <input type="text"  value="{{(isset($beli))?$beli->Id_Pembelian:old('Pembeli')}}" name="Id_Pembelian" class="form-control">
                                    @error('Id_Pembelian')<small style="color:red">{{$message}}</small>@enderror
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