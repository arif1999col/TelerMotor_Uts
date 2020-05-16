@extends("layout/admin") 
 @section('content')
 <div class="page-header">
    <div class="page-header-content">
        <div >
            <h4 class="">
                <i class="icon-home position-left"></i>
                <span class="text-semibold">Tentang Kami</span></h4>
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
                <a href="">Tentang Kami</a>
                </li>
                <li class="active"></li>
            </ul>
        </div>
    </div>
    <!-- /header content -->
</div>
 <div class="container-fluid">
    <div class="col-lg-12">
        <dl class="row">
            <dt class="col-sm-3">Nama Kelompok</dt>
            <dd class="col-sm-3">Arif Suryanto </dd>
            <dd class="col-sm-3">Gede Edo Quardiana</dd>
            <dd class="col-sm-3">Niken</dd>
        </dl>
        <dl class="row">
            <dt class="col-sm-3">NIM</dt>
            <dd class="col-sm-3">1815051042</dd>
            <dd class="col-sm-3">1815051108</dd>
            <dd class="col-sm-3">18150510</dd>
        </dl>
        <dl class="row">
            <dt class="col-sm-3">Prodi</dt>
            <dd class="col-sm-3">Pendidikan Teknik Informatika</dd>
        </dl>
 </div>
 <br>
 <br>
 <div class="col-lg-12">
     <dl class="row">
         <dt class="col-sm-3"><b>Studi Kasus</b></dt>
         <dd class="col-sm-3"> Menejemen Teler Motor</dd>
     </dl>
     <dl class="row">
         <dt class="col-sm-3"><b>Penjelasan</b></dt>
         <dd class="col-sm-3">Sistem ini dibuat untuk menejemen teler motor, yang akan mempermudah pendataan serta laporan anda</dd>
     </dl>
</div>
 </div>
 @endsection
