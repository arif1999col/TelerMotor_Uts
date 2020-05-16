@extends("layout/admin") 
@section('content')
<div class="page-header">
   <div class="page-header-content">
	   <div >
		   <h4 class="">
			   <i class="icon-home position-left"></i>
			   <span class="text-semibold">Daftar pembeli</span></h4>
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
			   <a href="">Daftar pembeli</a>
			   </li>
			   <li class="active"></li>
		   </ul>
	   </div>
   </div>
   <!-- /header content -->
</div>
<div class="container-fluid">
				   <h3 class="page-title">pembeli</h3>
				   <div id="toastr-demo" class="panel">
				   <div class="panel-body">
				<div class="col-lg-12">
					   <dl class="row">
						   <dt class="col-sm-3">Nama Kelompok</dt>
						   <dd class="col-sm-3">Arif Suryanto </dd>
						   <dd class="col-sm-3">Gede Edo Quardiana</dd>
						   <dd class="col-sm-3">Luh Putu Niken Ayu Lestari PK</dd>
					   </dl>
					   <dl class="row">
						   <dt class="col-sm-3">NIM</dt>
						   <dd class="col-sm-3">1815051042</dd>
						   <dd class="col-sm-3">1815051108</dd>
						   <dd class="col-sm-3"> 1815051103</dd>
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
				   <a href="{{route('pembeli.create')}}" class="btn btn-primary">Input pembeli</a>
				   <br>
				   <br>
						<table class="table table-bordered">
							<thead class="thead-dark">
								<tr><th>No</th>
								<th>Nama Pembeli</th>
								<th>Alamat</th>
								<th>Nomor Telpon</th>	
								<th>Aksi</th>								
							   </tr>
								
							</thead>
							<tbody>
								@foreach($pembeli ?? '' as $in=>$val)
							<tr><td>{{($in+1)}}</td>
									<td>{{$val->NamaPembeli}}</td>
									<td>{{$val->Alamat}}</td>
									<td>{{$val->Telp}}</td>
							<td><a href="{{route('pembeli.edit',$val->Id_Pembelian)}}" class="btn btn-primary">Update</a>
							<form action="{{route('pembeli.destroy',$val->Id_Pembelian)}}" method="POST">
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
						{{$pembeli??'' ->links()}}
				   
				   </div> 
				   </div>
</div>
@endsection