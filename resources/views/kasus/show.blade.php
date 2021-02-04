@extends('layouts.master')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header"><b>Show Data Kasus</b></div>
               <div class="card-body">
                  <form>
                  <div class="form-group">
                        <label for="" class="form-label">Nama Provinsi</label>
                        <input type="text" class="form-control" name="nama_provinsi" value="{{$kasus->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}}" readonly>
                     </div>
                     <div class="form-group">
                        <label for="" class="form-label">Nama Kota</label>
                        <input type="text" class="form-control" name="nama_kota" value="{{$kasus->rw->kelurahan->kecamatan->kota->nama_kota}}" readonly>
                     </div>
                     <div class="form-group">
                        <label for="" class="form-label">Nama Kecamatan</label>
                        <input type="text" class="form-control" name="nama_kecamatan" value="{{$kasus->rw->kelurahan->kecamatan->nama_kecamatan}}" readonly>
                     </div>
                     <div class="form-group">
                        <label for="" class="form-label">Nama Kelurahan</label>
                        <input type="text" class="form-control" name="nama_kelurahan" value="{{$kasus->rw->kelurahan->nama_kelurahan}}" readonly>
                     </div>
                     <div class="form-group">
                        <label for="" class="form-label">Rw</label>
                        <input type="text" class="form-control" name="id_rw" value="{{$kasus->id_rw}}" readonly>
                     </div>
                     <div class="form-group">
                        <label for="" class="form-label">Jumlah Positif</label>
                        <input type="number" class="form-control" name="jumlah_positif" value="{{$kasus->jumlah_positif}}" readonly>
                     </div>
                     <div class="form-group">
                        <label for="" class="form-label">JumlahSembuh</label>
                        <input type="number" class="form-control" name="jumlah_sembuh" value="{{$kasus->jumlah_sembuh}}" readonly>
                     </div>
                     <div class="form-group">
                        <label for="" class="form-label">Jumlah Meninggal</label>
                        <input type="number" class="form-control" name="jumlah_meninggal" value="{{$kasus->jumlah_meninggal}}" readonly>
                     </div>
                     <div class="form-group">
                        <label for="" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{$kasus->tanggal}}" readonly>
                     </div>
                     <div class="form-group">
                        <a href="{{ route('kasus.index') }}" type="submit" class="btn btn-primary">Back</a>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
