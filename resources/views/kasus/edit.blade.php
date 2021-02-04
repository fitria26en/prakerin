@extends('layouts.master')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header"><b>Edit Kasus</b></div>
               <div class="card-body">
                  <form action="{{ route('kasus.update', $kasus->id) }}" method="POST">
                  <input type="hidden" name="_method" value="PUT">
                  @csrf
                     <div class="mb-3">
                        <label for="" class="form-label">Positif</label>
                        <input type="number" class="form-control" name="jumlah_positif" value="{{$kasus->jumlah_positif}}" required>
                     </div>
                     <div class="mb-3">
                        <label for="" class="form-label">Sembuh</label>
                        <input type="number" class="form-control" name="jumlah_sembuh" value="{{$kasus->jumlah_sembuh}}" required>
                     </div>
                     <div class="mb-3">
                        <label for="" class="form-label">Meninggal</label>
                        <input type="number" class="form-control" name="jumlah_meninggal" value="{{$kasus->jumlah_meninggal}}" required>
                     </div>
                     <div class="mb-3">
                        <label for="" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" value="{{$kasus->tanggal}}" required>
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
