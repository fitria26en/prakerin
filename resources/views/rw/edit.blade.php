@extends('layouts.master')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header"><b>Edit Data RW</b></div>
               <div class="card-body">
                  <form action="{{ route('rw.update', $rw->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                     <div class="form-group">
                        <label for="" class="form-label">Nama RW</label>
                        <input type="text" class="form-control" name="nama" value="{{$rw->nama}}" required>
                     </div>
                     <div class="form-group">
                        <label for="" class="form-label">Nama Kelurahan</label>
                        <select class="form-control" name="id_kelurahan">
                        @foreach($kelurahan as $data)
                        <option value="{{$data->id}}"
                           {{$data->id == $rw->id_kelurahan ? "selected":""}}>{{$data->nama_kelurahan}}</option>
                        @endforeach
                        </select>
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
