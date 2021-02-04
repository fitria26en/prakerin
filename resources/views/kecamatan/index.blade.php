@extends('layouts.master')

@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header"><b>Data Kecamatan</b>
               <a href="{{ route('kecamatan.create') }}" class="btn btn-primary float-right">
                  Add Data
               </a>
            </div>
            <div class="card-body">
               <table class="table">
                  <thead>
                     <th>No</th>
                     <th>Nama Kecamatan</th>
                     <th>Nama Kota</th>
                     <th>Action</th>
                  </thead>
                  <tbody>
                  @php $no = 1; @endphp
                     @foreach ($kecamatan as $data)
                        <tr>
                           <td align="center">{{ $no++ }}</td>
                           <td>{{ $data->nama_kecamatan }} </td>
                           <td>{{ $data->kota->nama_kota }} </td>
                           <td align="center">
                              <form action="{{route('kecamatan.destroy', $data->id)}}" method="post">
                              @csrf
                              @method("DELETE")
                              <a class="btn btn-success" href="{{ route('kecamatan.show', $data->id) }}">Show</a>
                              <a class="btn btn-warning" href="{{ route('kecamatan.edit', $data->id) }}">Edit</a>
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
