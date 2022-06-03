@extends('layouts.dashboard')

@section('breadcrumb')
	<li class="breadcrumb-item">Dashboard</li>
	<li class="breadcrumb-item">SPP</li>
     <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
   <div class="row">
         <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                       <div class="card-title">{{ __('Edit SPP') }}</div>
                     
                        <form method="post" action="{{ url('/dashboard/data-spp', $edit->id) }}">
                           @csrf
                           @method('put')
                           
                           <div class="form-group">
                              <label>Tahun</label>
                              <input type="number" class="form-control @error('tahun') is-invalid @enderror" name="tahun" value="{{ $edit->tahun }}">
                              <span class="text-danger">@error('tahun') {{ $message }} @enderror</span>
                           </div>

                        <div class="input-group mb-3">									
                        <div class="input-group-prepend">										
                           <label class="input-group-text">										 	
                              Bulan	
                           </label>
                        </div>
                        <select class="custom-select @error('bulan') is-invalid @enderror" name="bulan">								
                              <option value="">Silahkan Pilih</option>											
                                 <option value="januari" {{ $edit->bulan == 'januari' ? 'selected' : '' }}>Januari</option>
                                 <option value="februari" {{ $edit->bulan == 'februari' ? 'selected' : '' }}>Februari</option>
                                 <option value="maret" {{ $edit->bulan == 'maret' ? 'selected' : '' }}>Maret</option>
                                 <option value="april" {{ $edit->bulan == 'april' ? 'selected' : '' }}>April</option>
                                 <option value="mei" {{ $edit->bulan == 'mei' ? 'selected' : '' }}>Mei</option>
                                 <option value="juni" {{ $edit->bulan == 'juni' ? 'selected' : '' }}>Juni</option>
                                 <option value="juli" {{ $edit->bulan == 'juli' ? 'selected' : '' }}>Juli</option>
                                 <option value="agustus" {{ $edit->bulan == 'agustus' ? 'selected' : '' }}>Agustus</option>
                                 <option value="september" {{ $edit->bulan == 'september' ? 'selected' : '' }}>September</option>
                                 <option value="oktober" {{ $edit->bulan == 'oktober' ? 'selected' : '' }}>Oktober</option>
                                 <option value="november" {{ $edit->bulan == 'november' ? 'selected' : '' }}>November</option>
                                 <option value="desember" {{ $edit->bulan == 'desember' ? 'selected' : '' }}>Desember</option>
                       </select>
                     </div>
                     <span class="text-danger">@error('bulan') {{ $message }} @enderror</span>
                           
                           <div class="form-group">
                              <label>Nominal</label>
                              <input type="text" class="form-control @error('nominal') is-invalid @enderror" name="nominal" value="{{ $edit->nominal }}">
                              <span class="text-danger">@error('nominal') {{ $message }} @enderror</span>
                           </div>
                           
                           <a href="{{ url('dashboard/data-spp') }}" class="btn btn-primary btn-rounded">
                              <i class="mdi mdi-chevron-left"></i> Kembali
                           </a>
                           
                           <button type="submit" class="btn btn-success btn-rounded  float-right">
                                 <i class="mdi mdi-check"></i> Simpan
                           </button>
                        
                        </form>
                  </div>
              </div>     
            </div>
            
	</div>
@endsection