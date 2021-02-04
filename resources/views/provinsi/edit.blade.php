@extends('layouts.master')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header"><b>Edit Provinsi</b></div>
               <div class="card-body">
                  <form action="{{ route('provinsi.update', $provinsi->id) }}" method="POST">
                  @csrf
                  @method("PUT")
                     <div class="mb-3">
                        <label for="" class="form-label">Kode Provinsi</label>
                        <input type="text" class="form-control" name="kode_provinsi" value="{{$provinsi->kode_provinsi}}" required>
                     </div>
                     <div class="mb-3">
                        <label for="" class="form-label">Nama Provinsi</label>
                        <input type="text" class="form-control" name="nama_provinsi" value="{{$provinsi->nama_provinsi}}" required>
                     </div>
                     <button type="submit" class="btn btn-primary">Edit Data</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
