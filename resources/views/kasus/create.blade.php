@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><center><b>{{ __('Data Kasus Local') }}</b></center></div>
                <div class="card-body">

                <form action="{{route('kasus.store')}}" method="POST">
                @csrf
                    <div class="row">
                    <div class="col">
                    @livewireScripts
                    @livewire('dropdowns')
                    @livewireStyles
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="mb-3">
                        <label for="" class="form-label">Jumlah Positif</label>
                        <input type="number" name="jumlah_positif" class="form-control" id="">
                        @error('jumlah_positif')
                           <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Jumlah Sembuh</label>
                        <input type="number" name="jumlah_sembuh" class="form-control" id="">
                        @error('jumlah_sembuh')
                           <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Jumlah Meninggal</label>
                        <input type="number" name="jumlah_meninggal" class="form-control" id="">
                        @error('jumlah_meninggal')
                           <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" id="">
                    </div>
                       </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection