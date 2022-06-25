@extends('layouts.dashboard')

@section('breadcrumb')
   <li class="breadcrumb-item">Dashboard</li>
	<li class="breadcrumb-item active">Pemberitahuan</li>
@endsection

@section('content')

	<div class="row">
         <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                       <div class="card-title">{{ __('Tambah') }}</div>
                     
                        <form method="post" action="{{ url('/dashboard/notif') }}">
                           @csrf
                           
                           <div class="form-group">
                              <label>Subjek</label>
                              <input type="text" class="form-control @error('subjek') is-invalid @enderror" name="subjek" value="{{ old('subjek') }}">
                              <span class="text-danger">@error('subjek') {{ $message }} @enderror</span>
                           </div>
                           
                           <div class="form-group">
                              <label>Body</label>
                              <textarea class="form-control @error('body') is-invalid @enderror" rows="5" name="body">{{ old('body') }}</textarea>
                              <span class="text-danger">@error('body') {{ $message }} @enderror</span>
                           </div>
                           
                           <button type="submit" class="btn btn-success btn-rounded">
                                 <i class="mdi mdi-check"></i> Simpan
                           </button>
                        
                        </form>
                  </div>
              </div>     
            </div>
            
	</div>
     <div class="row">
           <div class="col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="card-title">Data  Pemberitahuan</div>
                              
						<div class="table-responsive mb-3">
                                <table class="table">
                                    <thead>
                                    <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">SUBJEK</th>
								    <th scope="col">BODY</th>
                                            <th scope="col">DIBUAT</th>
								    <th scope="col"></th>                                        
                                        </tr>
                                    </thead>
                                    <tbody>
								@php 
								$i=1;
								@endphp
								@foreach($notif as $value)
                                        <tr>					    
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $value->subjek }}</td>
								                     <td>{{ $value->body }}</td>
                                            <td>{{ $value->created_at->format('d M, Y') }}</td>
					
                                            <td>										                           
                               	 		  <div class="hide-menu">
                                    			<a href="javascript:void(0)" class="text-dark" id="actiondd" role="button" data-toggle="dropdown">
                                       				<i class="mdi mdi-dots-vertical"></i>
                                    			</a>
                                    				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="actiondd">
                                        			<a class="dropdown-item" href="{{ url('dashboard/notif/'.$value->id.'/edit') }}"><i class="ti-pencil"></i> Edit </a>
											<form method="post" action="{{ url('dashboard/notif', $value->id) }}" id="delete{{ $value->id }}">
												@csrf
												@method('delete')
												
												<button type="button" class="dropdown-item" onclick="deleteData({{ $value->id }})">
													<i class="ti-trash"></i> Hapus
												</button>	
											
											</form>																																																
                                        			                    							                                                                            
                                				</div>
                            				</div>								
								    </td>					
                                        </tr>
								@php
								$i++;
								@endphp
								@endforeach                                  
                                    </tbody>
                                </table>
                            </div>

					  <!-- Pagination -->
					@if($notif->lastPage() != 1)
						<div class="btn-group float-right">		
						   <a href="{{ $notif->previousPageUrl() }}" class="btn btn-success">
								<i class="mdi mdi-chevron-left"></i>
						    </a>
						    @for($i = 1; $i <= $notif->lastPage(); $i++)
								<a class="btn btn-success {{ $i == $notif->currentPage() ? 'active' : '' }}" href="{{ $notif->url($i) }}">{{ $i }}</a>
						    @endfor
					        <a href="{{ $notif->nextPageUrl() }}" class="btn btn-success">
								<i class="mdi mdi-chevron-right"></i>
							</a>
					   </div>
					@endif
					<!-- End Pagination -->
					
					   @if(count($notif) == 0)
				  			<div class="text-center"> Tidak ada data!</div>
					   @endif
				</div>
			</div>
		</div>
     </div>

@endsection

@section('sweet')

   function deleteData(id){
      Swal.fire({
               title: 'PERINGATAN!',
               text: "Yakin ingin menghapus data notif?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin',
                cancelButtonText: 'Batal',
            }).then((result) => {
               if (result.value) {
                     $('#delete'+id).submit();
                  }
               })
   }
   
@endsection