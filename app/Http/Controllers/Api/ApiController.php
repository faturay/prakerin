<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Rw;
use Carbon\Carbon;
use DB;
class ApiController extends Controller
{
    public function provinsi()
    {
        $allDay = DB::table('provinsis')
                    ->select('provinsis.nama_provinsi', 'provinsis.kode_provinsi', 
                    DB::raw('SUM(kasus2s.jumlah_positif) as jumlah_Positif'), 
                    DB::raw('SUM(kasus2s.jumlah_sembuh) as jumlah_Sembuh'), 
                    DB::raw('SUM(kasus2s.jumlah_meninggal) as jumlah_Meninggal'))
                        ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
                        ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                        ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                        ->groupBy('provinsis.id')
                        ->get();

        $today = DB::table('provinsis')
                    ->select('provinsis.nama_provinsi', 'provinsis.kode_provinsi', 
                    DB::raw('SUM(kasus2s.jumlah_positif) as jumlah_Positif'), 
                    DB::raw('SUM(kasus2s.jumlah_sembuh) as jumlah_Sembuh'), 
                    DB::raw('SUM(kasus2s.jumlah_meninggal) as jumlah_Meninggal'))
                        ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
                        ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
                        ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
                        ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
                        ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw') 
                        ->whereDate('kasus2s.tanggal', Carbon::today()) 
                        ->groupBy('provinsis.id')
                        ->get();

            $positif = DB::table('rws')->select('kasus2s.jumlah_positif', 'kasus2s.jumlah_sembuh', 'kasus2s.jumlah_meninggal')
                    ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                    ->sum('kasus2s.jumlah_positif');
            $sembuh = DB::table('rws')->select('kasus2s.jumlah_positif', 'kasus2s.jumlah_sembuh', 'kasus2s.jumlah_meninggal')
                    ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                    ->sum('kasus2s.jumlah_sembuh');
            $meninggal = DB::table('rws')->select('kasus2s.jumlah_meninggal', 'kasus2s.jumlah_sembuh', 'kasus2s.jumlah_meninggal')
                    ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                    ->sum('kasus2s.jumlah_meninggal');
            
        $data = [
                'success' => true,
                'Data' => [
                    ['Hari ini' => $today,
                    'Semua' => $allDay],
                ],
                'Total' => [
                    'Positif' => $positif,
                    'Sembuh' => $sembuh,
                    'Meninggal' => $meninggal
                ],
        ];    
        return response()->json($data, 200);        
    }


    public function showProvinsi($id)
    {   
        $show = DB::table('provinsis')
        ->select('provinsis.nama_provinsi', 'provinsis.kode_provinsi', 
        DB::raw('SUM(kasus2s.jumlah_positif) as jumlah_positif'), 
        DB::raw('SUM(kasus2s.jumlah_sembuh) as jumlah_sembuh'), 
        DB::raw('SUM(kasus2s.jumlah_meninggal) as jumlah_meninggal'))
            ->join('kotas', 'provinsis.id', '=', 'kotas.id_provinsi')
            ->join('kecamatans', 'kotas.id', '=', 'kecamatans.id_kota')
            ->join('kelurahans', 'kecamatans.id', '=', 'kelurahans.id_kecamatan')
            ->join('rws', 'kelurahans.id', '=', 'rws.id_kelurahan')
            ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
            ->where('provinsis.id', $id)
            ->groupBy('provinsis.id')
            ->get();
            if ($show) {
                return response()->json([
                    'success' => true,
                    'data'    => $show
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Tidak Ditemukan!',
                ], 404);
            }
    }
    public function kotas()
    {
        //Data Kota 
        $data = DB::table('kotas')
        ->join('kecamatans','kecamatans.id_kota', '=', 'kotas.id')
        ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
        ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
        ->join('kasus2s','kasus2s.id_rw', '=', 'rws.id')
        ->select('nama_kota',
        DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
        DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'),
        DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'))
        ->groupBy('nama_kota')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }

    public function kecamatans()
    {
        //Data Kota 
        $data = DB::table('kecamatans')
        ->join('kelurahans','kelurahans.id_kecamatan', '=', 'kecamatans.id')
        ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
        ->join('kasus2s','kasus2s.id_rw', '=', 'rws.id')
        ->select('nama_kecamatan',
        DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
        DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'),
        DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'))
        ->groupBy('nama_kecamatan')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }

    public function kelurahans()
    {
        //Data Kota 
        $data = DB::table('kelurahans')
        ->join('rws','rws.id_kelurahan', '=', 'kelurahans.id')
        ->join('kasus2s','kasus2s.id_rw', '=', 'rws.id')
        ->select('nama_kelurahan',
        DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
        DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'),
        DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'))
        ->groupBy('nama_kelurahan')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }
    public function rws()
    {
        //Data Kota 
        $data = DB::table('rws')
        ->join('kasus2s','kasus2s.id_rw', '=', 'rws.id')
        ->select('rws.nama_rw',
        DB::raw('sum(kasus2s.jumlah_positif) as jumlah_positif'),
        DB::raw('sum(kasus2s.jumlah_meninggal) as jumlah_meninggal'),
        DB::raw('sum(kasus2s.jumlah_sembuh) as jumlah_sembuh'))
        ->groupBy('nama_rw')
        ->get();
                $res = [
                    'succsess' => true,
                    'Data' => $data,
                    'message' => 'Data Kasus Di Tampilkan'
                ];
                return response()->json($res,200);
    }
    

    public function indonesia()
    {
        $positif = DB::table('rws')->select('kasus2s.jumlah_positif', 'kasus2s.jumlah_sembuh', 'kasus2s.jumlah_meninggal')
                    ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                    ->sum('kasus2s.jumlah_positif');
        $sembuh = DB::table('rws')->select('kasus2s.jumlah_sembuh', 'kasus2s.jumlah_sembuh', 'kasus2s.jumlah_meninggal')
                    ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                    ->sum('kasus2s.jumlah_sembuh');
        $meninggal = DB::table('rws')->select('kasus2s.jumlah_meninggal', 'kasus2s.jumlah_sembuh', 'kasus2s.jumlah_meninggal')
                    ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                    ->sum('kasus2s.jumlah_meninggal');

        $indonesia = [
            'success' => true,
            'data' => [
                'name' => 'Indonesia',
                'positif' => $positif,
                'sembuh' => $sembuh,
                'meninggal' => $meninggal
            ],
            'message' => 'Berhasil',
        ];
        return response()->json($indonesia, 200);
    }

    public function positif()
    {
        $positif = DB::table('rws')->select('kasus2s.jumlah_positif', 'kasus2s.jumlah_sembuh', 'kasus2s.jumlah_meninggal')
                    ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                    ->sum('kasus2s.jumlah_positif');
        $indonesia = [
            'success' => true,
            'data' => [
                    'name' => 'Jumlah Positif',
                    'value' => $positif
                ],
                    'message' => 'Berhasil',
            ];
            return response()->json($indonesia, 200);            
    }

    public function sembuh()
    {
        $sembuh = DB::table('rws')->select('kasus2s.jumlah_sembuh', 'kasus2s.jumlah_sembuh', 'kasus2s.jumlah_meninggal')
                    ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                    ->sum('kasus2s.jumlah_sembuh');
        $indonesia = [
            'success' => true,
            'data' => [
                    'name' => 'Jumlah Sembuh',
                    'value' => $sembuh
                ],
                    'message' => 'Berhasil',
            ];
            return response()->json($indonesia, 200);            
    }

    public function meninggal()
    {
        $meninggal = DB::table('rws')->select('kasus2s.jumlah_meninggal', 'kasus2s.jumlah_sembuh', 'kasus2s.jumlah_meninggal')
                    ->join('kasus2s', 'rws.id', '=', 'kasus2s.id_rw')
                    ->sum('kasus2s.jumlah_meninggal');
        $indonesia = [
            'success' => true,
            'data' => [
                    'name' => 'Jumlah Meninggal',
                    'value' => $meninggal
                ],
                    'message' => 'Berhasil',
            ];
            return response()->json($indonesia, 200);            
    }
}