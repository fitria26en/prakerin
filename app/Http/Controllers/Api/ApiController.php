<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Provinsi;

use App\Models\Kasus;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positif = DB::table('rws')
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

        $res= [
            'success' => true,
            'Data' => 'Data Kasus Indonesia',
            'jumlah positif' => $positif,
            'jumlah sembuh' => $sembuh,
            'jumlah meninggal' => $meninggal,
            'message' => 'Data Kasus Ditampilkan'
        ];
        return response()->json($res,200);
    }

    public function provinsi($id)
    {

        $tampil = DB::table('provinsis')
        ->join('kotas','kotas.id_provinsi','=','provinsis.id')
        ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasuses','kasuses.id_rw','=','rws.id')
        ->where('provinsis.id',$id)
        ->select('nama_provinsi',
                DB::raw('sum(kasuses.jumlah_positif) as jumlah_positif'),
                DB::raw('sum(kasuses.jumlah_sembuh) as jumlah_sembuh'),
                DB::raw('sum(kasuses.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_provinsi')
                ->get();

                $res = [
                    'success'  => true,
                    'provinsi'=> $tampil,
                    'message' => 'Data Provinsi Ditampilkan'
                ];
                return response()->json($res,200);
    }

    public function indonesia()
    {

        $tampil = DB::table('provinsis')
        ->join('kotas','kotas.id_provinsi','=','provinsis.id')
        ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasuses','kasuses.id_rw','=','rws.id')
        ->select('nama_provinsi',
                DB::raw('sum(kasuses.jumlah_positif) as jumlah_positif'),
                DB::raw('sum(kasuses.jumlah_sembuh) as jumlah_sembuh'),
                DB::raw('sum(kasuses.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_provinsi')
                ->get();

                $res = [
                    'success'  => true,
                    'provinsi'=> $tampil,
                    'message' => 'Data Provinsi Ditampilkan'
                ];
                return response()->json($res,200);
    }
    public function kota()
    {

        $tampil = DB::table('kotas')
       
        ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasuses','kasuses.id_rw','=','rws.id')
        ->select('nama_kota',
                DB::raw('sum(kasuses.jumlah_positif) as jumlah_positif'),
                DB::raw('sum(kasuses.jumlah_sembuh) as jumlah_sembuh'),
                DB::raw('sum(kasuses.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_kota')
                ->get();

                $res = [
                    'success'  => true,
                    'provinsi'=> $tampil,
                    'message' => 'Data kota Ditampilkan'
                ];
                return response()->json($res,200);
    }
    public function kecamatan()
    {

        $tampil = DB::table('kecamatans')
       
       
        ->join('kelurahans','kelurahans.id_kecamatan','=','kecamatans.id')
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasuses','kasuses.id_rw','=','rws.id')
        ->select('nama_kecamatan',
                DB::raw('sum(kasuses.jumlah_positif) as jumlah_positif'),
                DB::raw('sum(kasuses.jumlah_sembuh) as jumlah_sembuh'),
                DB::raw('sum(kasuses.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_kecamatan')
                ->get();

                $res = [
                    'success'  => true,
                    'provinsi'=> $tampil,
                    'message' => 'Data kecamatan Ditampilkan'
                ];
                return response()->json($res,200);
    }
    public function kelurahan()
    {

        $tampil = DB::table('kelurahans')
       
       
        
        ->join('rws','rws.id_kelurahan','=','kelurahans.id')
        ->join('kasuses','kasuses.id_rw','=','rws.id')
        ->select('nama_kelurahan',
                DB::raw('sum(kasuses.jumlah_positif) as jumlah_positif'),
                DB::raw('sum(kasuses.jumlah_sembuh) as jumlah_sembuh'),
                DB::raw('sum(kasuses.jumlah_meninggal) as jumlah_meninggal'))
                ->groupBy('nama_kelurahan')
                ->get();

                $res = [
                    'success'  => true,
                    'provinsi'=> $tampil,
                    'message' => 'Data kelurahan Ditampilkan'
                ];
                return response()->json($res,200);
    }
    public function rw()
    {
        //Data Kota 
        $data = DB::table('rws')
        ->join('kasuses','kasuses.id_rw', '=', 'rws.id')
        ->select('rws.nama',
        DB::raw('sum(kasuses.jumlah_positif) as jumlah_positif'),
        DB::raw('sum(kasuses.jumlah_meninggal) as jumlah_meninggal'),
        DB::raw('sum(kasuses.jumlah_sembuh) as jumlah_sembuh'))
        ->groupBy('nama')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }
public function hari(){
    $provinsi = DB::table('kasuses')->select('provinsis.nama_provinsi')->
    join('provinsis','kasuses.id','=','provinsis.id')->get('kasuses.nama_provisi');
    $rw =DB::table('kasuses')->select([
            DB::raw('SUM(jumlah_positif) as jumlah_Positif'),
            DB::raw('SUM(jumlah_sembuh) as jumlah_Sembuh'),
            DB::raw('SUM(jumlah_meninggal) as jumlah_Meninggal'),
    ])->groupBy('tanggal')->get();
    $kasus = kasus::get('created_at')->last();
    $jumlah_positif = kasus::where('tanggal', date('Y-m-d'))->sum('jumlah_positif');
    $jumlah_sembuh = kasus::where('tanggal', date('Y-m-d'))->sum('jumlah_sembuh');
    $jumlah_meninggal = kasus::where('tanggal', date('Y-m-d'))->sum('jumlah_meninggal');

    $join = DB::table('kasuses')
                    ->select('jumlah_positif','jumlah_sembuh','jumlah_meninggal')
                    ->join('rws','kasuses.id_rw','=','id_rw')
                    ->get();
       
    $arr2 =[
        'Data'=>'DATA KASUS HARI INI',
        
        'jumlah_positif'=>$jumlah_positif,
        'jumlah_sembuh'=>$jumlah_sembuh,
        'jumlah_meninggal'=>$jumlah_meninggal,
    ];  
    return response([
            'success' => true,
            'data' => [ 
                        'Hari Ini' => $arr2,
                        'total' =>$rw
            //  'Total' =>[ //'provinsi'=>$provinsi, 
            //             'Data'=>'Data kasus seluruh indonesia',
            //             'jumlah_Positif' => $positif,
            //             'jumlah_Sembuh' => $jumlah_sembuh,
            //             'jumlah_Meninggal' => $jumlah_meninggal,
                     ],
                    'message' => ' Berhasil!',
                
        ]);
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
