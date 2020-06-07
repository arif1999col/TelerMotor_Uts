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