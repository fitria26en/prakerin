<?php

namespace App\Http\Controllers\Api;
use App\Models\Kasus;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kelurahan;
use App\Models\kecamatan;
use App\Models\Rw;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
public function index(){
    $jumlah_positif = DB::table('rws')
                ->select('kasuses.jumlah_positif',
                'kasuses.jumlah_sembuh', 'kasuses.jumlah_meninggal')
                ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                ->sum('kasuses.jumlah_positif');
    
    $jumlah_sembuh = DB::table('rws')
                ->select('kasuses.jumlah_positif',
                'kasuses.jumlah_sembuh', 'kasuses.jumlah_meninggal')
                ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                ->sum('kasuses.jumlah_sembuh');

    $jumlah_meninggal = DB::table('rws')
                ->select('kasuses.jumlah_positif',
                'kasuses.jumlah_sembuh', 'kasuses.jumlah_meninggal')
                ->join('kasuses', 'rws.id', '=', 'kasuses.id_rw')
                ->sum('kasuses.jumlah_meninggal');


    $res = [
        'success' => true,
        'data' => 'Data Kasus Indonesia',
        'jumlah_positif' => $jumlah_positif,
        'jumlah_sembuh' => $jumlah_sembuh,
        'jumlah_meninggal' => $jumlah_meninggal,
        'message' => 'Data Kasus Ditampilkan'
    ];
    return response()->json($res,200);
}
  public function provinsi($id){
    $jumlah_positif = DB::table('provinsis')
    ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
    ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
    ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
    ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
    ->join('kasuses', 'kasuses.id_rw', '=', 'rws.id')
    ->select('kasuses.jumlah_positif')
    ->where('provinsis.id',$id)
    ->sum('kasuses.jumlah_positif');

     $jumlah_sembuh = DB::table('provinsis')
     ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
     ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
     ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
     ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
     ->join('kasuses', 'kasuses.id_rw', '=', 'rws.id')
     ->select('kasuses.jumlah_sembuh')
     ->where('provinsis.id',$id)
     ->sum('kasuses.jumlah_sembuh');

     $jumlah_meninggal = DB::table('provinsis')
     ->join('kotas', 'kotas.id_provinsi', '=', 'provinsis.id')
     ->join('kecamatans', 'kecamatans.id_kota', '=', 'kotas.id')
     ->join('kelurahans', 'kelurahans.id_kecamatan', '=', 'kecamatans.id')
     ->join('rws', 'rws.id_kelurahan', '=', 'kelurahans.id')
     ->join('kasuses', 'kasuses.id_rw', '=', 'rws.id')
     ->select('kasuses.jumlah_meninggal')
     ->where('provinsis.id',$id)
     ->sum('kasuses.jumlah_meninggal');

     $provinsi = Provinsi::whereId($id)->first();

    $res = [
        'success' => true,
        'nama_provinsi' => $provinsi['nama_provinsi'],
        'jumlah_positif' => $jumlah_positif,
        'jumlah_sembuh' => $jumlah_sembuh,
        'jumlah_meninggal' => $jumlah_meninggal,
        'message' => 'Data Berhasil DItampilkan'
    ];
    return response()->json($res, 200);
}

public function provinsikasus(){
    $provinsi = DB::table('provinsis')->select('provinsis.kode_provinsi','provinsis.nama_provinsi', DB::raw('SUM(kasuses.jumlah_positif) as positif'),
    DB::raw('SUM(kasuses.jumlah_sembuh) as sembuh'),DB::raw('SUM(kasuses.jumlah_meninggal) as meninggal'))
    ->join('kotas','provinsis.id','=','kotas.provinsi_id')
    ->join('kecamatans','kotas.id','=','kecamatans.kota_id')
    ->join('kelurahans','kecamatans.id','=','kelurahans.kecamatan_id')
    ->join('rwss','kelurahans.id','=','rwss.kelurahan_id')
    ->join('kasuses','rwss.id','=','kasuses.rws_id')
    ->groupBy('provinsis.id')
    ->get();

$data = [
    'status' => true,
    'message' => 'Menampilkan Provinsi',
    'data' => $provinsi,
];

return response()->json($data, 200);
}
}