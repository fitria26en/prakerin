@extends('layouts.master')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header"><b>Data Kasus</b>
               <a href="{{ route('kasus.create') }}" class="btn btn-primary float-right">
                  Add Data
               </a>
            </div>
            <div class="card-body">
               <table class="table">
                  <thead>
                     <th>No</th>
                     <th>Lokasi</th>
                     <th>Rw</th>
                     <th>Jumlah Positif</th>
                     <th>Jumlah Sembuh</th>
                     <th>Jumlah Meninggal</th>
                     <th>Tanggal</th>
                     <th>Action</th>
                  </thead>
                  <tbody>
                  @php $no = 1; @endphp
                     @foreach ($kasus as $data)
                        <tr>
                           <td align="center">{{ $no++ }}</td>
                           <td><center><b>Provinsi : {{$data->rw->kelurahan->kecamatan->kota->provinsi->nama_provinsi}}<br>
                                          Kota : {{$data->rw->kelurahan->kecamatan->kota->nama_kota}}<br>
                                          Kecamatan : {{$data->rw->kelurahan->kecamatan->nama_kecamatan}}<br>
                                          Kelurahan : {{$data->rw->kelurahan->nama_kelurahan}}<br></b></center></td>
                           <td>{{ $data->rw->nama }} </td>
                           <td>{{ $data->jumlah_positif }} </td>
                           <td>{{ $data->jumlah_sembuh }} </td>
                           <td>{{ $data->jumlah_meninggal }} </td>
                           <td>{{ $data->tanggal }} </td>
                           <td align="center">
                              <form action="{{route('kasus.destroy', $data->id)}}" method="post">
                              @csrf
                              @method("DELETE")
                              <a class="btn btn-success" href="{{ route('kasus.show', $data->id) }}">Show</a>
                              <a class="btn btn-warning" href="{{ route('kasus.edit', $data->id) }}">Edit</a>
                              <button class="btn btn-danger" type="submit">Delete</button>
                              </form>
                           </td>
                        </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
