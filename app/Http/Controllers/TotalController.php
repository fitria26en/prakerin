<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TotalController extends Controller
{ 
    public function index(){
    $data = DB::table('rws')
    ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
    ->select('rws.nama',
    DB::raw('sum(kasuses.jumlah_positif) as jumlah_positif'),
    DB::raw('sum(kasuses.jumlah_meninggal) as jumlah_meninggal'),
    DB::raw('sum(kasuses.jumlah_sembuh) as jumlah_sembuh'))
    ->groupBy('nama')
    ->get();
    $provinsi = Provinsi::whereId($id)->first();
    
    return view('frontend.index', compact('provinsi','kasus'));
    }
}
