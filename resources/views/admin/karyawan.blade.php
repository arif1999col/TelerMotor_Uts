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
                <a href="">Daftar Karyawan</a>
                </li>
                <li class="active"></li>
            </ul>
        </div>
    </div>
    <!-- /header content -->
</div>
 <div class="container-fluid">
					<h3 class="page-title">Karyawan</h3>
					<div id="toastr-demo" class="panel">
					<div class="panel-body">
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
								<dd class="col-sm-3">1815051</dd>
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

				<div>
					<div class="col-lg-12"> 
					<a href="{{route('karyawan.create')}}" class="btn btn-primary">Input karyawan</a>
					<br>
					<br>
 						<table class="table table-bordered">
 							<thead class="thead-dark">
 								<tr><th>No</th>
								 <th>Nama</th>
								 <th>Jenis Kelamin</th>
								 <th>Umur</th>
								 <th>Alamat</th>
								 <th>Aksi</th>								
								</tr>
								 
							 </thead>
							 <tbody>
 								@foreach($karyawan ?? '' as $in=>$val)
							 <tr><td>{{($in+1)}}</td>
									 <td>{{$val->Nama_Karyawan}}</td>
									 <td>{{$val->JenisKelamin}}</td>
									 <td>{{$val->Umur}}</td>
									 <td>{{$val->Alamat}}</td>
							 <td><a href="{{route('karyawan.edit',$val->Kd_Karyawan)}}" class="btn btn-primary">Update</a>
							 <form action="{{route('karyawan.destroy',$val->Kd_Karyawan)}}" method="POST">
								@csrf
								@method('DELETE')
								<p></p>
								<button type="submit" class="btn btn-danger">Hapus</button>
							</form>
							</td>
									 </tr>
								 @endforeach
							 </tbody>
						 </table>
						 {{$karyawan ?? ''->links()}}
					
					</div> 
					</div>
</div>
@endsection