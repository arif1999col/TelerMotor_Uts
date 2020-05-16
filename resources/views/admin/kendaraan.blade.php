@extends("layout/admin") 
@section('content')
<div class="page-header">
   <div class="page-header-content">
	   <div >
		   <h4 class="">
			   <i class="icon-home position-left"></i>
			   <span class="text-semibold">Daftar Kendaraan</span></h4>
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
			   <a href="">Daftar Kendaraan</a>
			   </li>
			   <li class="active"></li>
		   </ul>
	   </div>
   </div>
   <!-- /header content -->
</div>
<div class="container-fluid">
				   <h3 class="page-title">Kendaraan</h3>
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
						   <dd class="col-sm-3"> 18150510</dd>
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
				
<br><br><br><br>
			   <div>
				   <div class="col-lg-12"> 
				   <a href="{{route('kendaraan.create')}}" class="btn btn-primary">Input Kendaraan</a>
				   <br>
				   <br>
						<table class="table table-bordered">
							<thead class="thead-dark">
								<tr><th>No</th>
								<th>Nama Motor</th>
								<th>Tahun Kendaraan</th>
								<th>DK Motor</th>
								<th>Status</th>
								<th>Harga</th>	
								<th>Aksi</th>								
							   </tr>
								
							</thead>
							<tbody>
								@foreach($kendaraan ?? '' as $in=>$val)
							<tr><td>{{($in+1)}}</td>
									<td>{{$val->NamaMotor}}</td>
									<td>{{$val->Tahun}}</td>
									<td>{{$val->DkMotor}}</td>
									<td>{{$val->Status}}</td>
									<td>{{$val->HargaMotor}}</td>
							<td><a href="{{route('kendaraan.edit',$val->ID_Kendaraan)}}" class="btn btn-primary">Update</a>
							<form action="{{route('kendaraan.destroy',$val->ID_Kendaraan)}}" method="POST">
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
						{{$kendaraan??'' ->links()}}
				   
				   </div> 
				   </div>
</div>
@endsection