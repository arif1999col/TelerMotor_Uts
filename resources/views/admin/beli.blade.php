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
				   <a href="{{route('beli.create')}}" class="btn btn-primary">Input pembeli</a>
				   <br>
				   <br>
						<table class="table table-bordered">
							<thead class="thead-dark">
								<tr><th>No</th>
								<th>Kasir</th>
								<th>Pembeli</th>
								<th>Waktu</th>	
								<th>Aksi</th>								
							   </tr>
								
							</thead>
							<tbody>
								@foreach($beli ?? '' as $in=>$val)
							<tr><td>{{($in+1)}}</td>
									<td>{{$val->karyawan->Nama_Karyawan}}</td>
									<td>{{$val->pembeli->NamaPembeli}}</td>
                                    <td>{{$val->waktu}}</td>
                                    <td><a href="{{route('beli.edit',$val->IdBeli)}}" class="btn btn-primary">Update</a> | 
                                    <a href="" class="btn btn-primary">Detail</a>
                                        <form action="{{route('beli.destroy',$val->IdBeli)}}" method="POST">
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
						{{$beli??'' ->links()}}
				   
				   </div> 
				   </div>
</div>
@endsection