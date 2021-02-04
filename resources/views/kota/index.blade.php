@extends('layouts.master')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-10">
         <div class="card">
            <div class="card-header"><b>Data Kota</b>
               <a href="{{ route('kota.create') }}" class="btn btn-primary float-right">
                  Add Data
               </a>
            </div>
            <div class="card-body">
               <table class="table">
                  <thead>
                     <th>No</th>
                     <th>Kode Kota</th>
                     <th>Nama Kota</th>
                     <th>Nama Provinsi</th>
                     <th>Action</th>
                  </thead>
                  <tbody>
                  @php $no = 1; @endphp
                     @foreach ($kota as $data) 
                        <tr>
                           <td align="center">{{ $no++ }}</td>
                           <td>{{ $data->kode_kota }} </td>
                           <td>{{ $data->nama_kota }} </td>
                           <td>{{ $data->provinsi->nama_provinsi }} </td>
                           <td align="center">
                              <form action="{{route('kota.destroy', $data->id)}}" method="post">
                              @csrf
                              @method("DELETE")
                              <a class="btn btn-success" href="{{ route('kota.show', $data->id) }}">Show</a>
                              <a class="btn btn-warning" href="{{ route('kota.edit', $data->id) }}">Edit</a>
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
