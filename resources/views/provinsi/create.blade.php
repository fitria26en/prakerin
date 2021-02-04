@extends('layouts.master')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header"><b>Tambah Data provinsi</b></div>
               <div class="card-body">
                  <form action="{{ route('provinsi.store') }}" method="POST">
                  @csrf
                     <div class="form-group">
                        <label for="" class="form-label">Kode Provinsi</label>
                        <input type="text" class="form-control" name="kode_provinsi" id="exampleInputKode" aria-describedby="kodeHelp">
                        @error('kode_provinsi')
                           <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="" class="form-label">Nama Provinsi</label>
                        <input type="text" class="form-control" name="nama_provinsi" id="exampleInputProvinsi">
                        @error('nama_provinsi')
                           <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Data</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
