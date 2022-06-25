@extends('layouts.dashboard')

@section('breadcrumb')
	<li class="breadcrumb-item">Dashboard</li>
	<li class="breadcrumb-item">Pemberitahuan</li>
     <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')

	<div class="row">
         <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                       <div class="card-title">{{ __('Edit') }}</div>
                     
                        <form method="post" action="{{ url('/dashboard/notif', $edit->id) }}">
                        
                           @csrf
                           @method('put')
                           
                           <div class="form-group">
                              <label>Subjek</label>
                              <input type="text" class="form-control @error('subjek') is-invalid @enderror" name="subjek" value="{{ $edit->subjek }}">
                              <span class="text-danger">@error('subjek') {{ $message }} @enderror</span>
                           </div>
                           
                           <div class="form-group">
                              <label>Body</label>
                              <input type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ $edit->body }}">
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

@endsection

@section('sweet')

function deleteData(id){
      Swal.fire({
               title: 'PERINGATAN!',
               text: "Yakin ingin menghapus data Pemberitahuan?",
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

@endsection