<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provinsi;
use DB;
use App\Models\Kasus;

class FrontendCobtroller extends Controller
{
    public function index()
    {  $positif = DB::table('rws')
      ->select('kasuses.jumlah_positif',
      'kasuses.jumlah_sembuh','kasuses.jumlah_meninggal')
      ->join('kasuses','rws.id','=','kasuses.id_rw')
      ->sum('kasuses.jumlah_positif');
$sembuh = DB::table('rws')
      ->select('kasuses.jumlah_positif',
      'kasuses.jumlah_sembuh','kasuses.jumlah_meninggal')
      ->join('kasuses','rws.id','=','kasuses.id_rw')
      ->sum('kasuses.jumlah_positif');
$meninggal = DB::table('rws')
      ->select('kasuses.jumlah_positif',
      'kasuses.jumlah_sembuh','kasuses.jumlah_meninggal')
      ->join('kasuses','rws.id','=','kasuses.id_rw')
      ->sum('kasuses.jumlah_positif');

      $data = Kasus::all();
        $provinsi = DB::table('provinsis')
                    ->select('provinsis.nama_provinsi',
                    DB::raw('SUM(kasuses.jumlah_positif) as Positif'),
                    DB::raw('SUM(kasuses.jumlah_sembuh) as Sembuh'),
                    DB::raw('SUM(kasuses.jumlah_meninggal) as Meninggal'))
                        ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')    
                        ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                        ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                        ->groupBy('provinsis.id')
                        ->get();
              
       return view('frontend.index', compact('provinsi','data','positif','sembuh','meninggal'));
      }

}
