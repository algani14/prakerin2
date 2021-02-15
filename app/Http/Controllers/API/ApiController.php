<?php

namespace App\Http\Controllers\API;
use Illuminate\Support\Facades\Http;
use App\Models\Provinsi;
use App\Models\Kota;
use App\Models\Kasus;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Carbon\Carbon;
use GuzzleHttp\Client;


class ApiController extends Controller
{
    public $data = [];
    public function global()
    {
        
        $response = Http::get( 'https://api.kawalcorona.com/global/' )->json();
        foreach ($response as $data => $val){
            $raw =$val['attributes'];
            $res = [
                'Negara' => $raw['Country_Region'],
                'Positif' => $raw ['Confirmed'],
                'Sembuh' => $raw ['Recovered'],
                'meninggal' => $raw ['Deaths']
            ];
            array_push($this->data, $res);
         }
            $data = [
                'success' => true,
                'data' => $this->data,
                'message' => 'berhasil'
            ];
            return response()->json($data,200);

    }
    
    public function provinsi()
    {
        $allDay = DB::table('provinsis')
          ->select('provinsis.nama_provinsi','provinsis.kode_provinsi',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('kotas','provinsis.id','=','kotas.id_provinsi')
              ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
              ->join('desas','kecamatans.id','=','desas.id_kecamatan')
              ->join('rws','desas.id','=','rws.id_desa')
              ->join('kasuses','rws.id','=','kasuses.id_rw')               
          ->groupBy('provinsis.id')->get();

          $toDay = DB::table('provinsis')
          ->select('provinsis.nama_provinsi','provinsis.kode_provinsi',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('kotas','provinsis.id','=','kotas.id_provinsi')
              ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
              ->join('desas','kecamatans.id','=','desas.id_kecamatan')
              ->join('rws','desas.id','=','rws.id_desa')
              ->join('kasuses','rws.id','=','kasuses.id_rw')
              ->whereDate('kasuses.tanggal',Carbon::today())
          ->groupBy('provinsis.id')->get();  
        
          
          
       
          $positif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $reaktif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $sembuh = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => [
                        'Hari Ini' => $toDay,
                        'Semua' => $allDay,
                        ],
            'message' => 'berhasil'
        ]);

    }

    public function provinsishow($id)
    {
        $provinsi = DB::table('provinsis')
          ->select('provinsis.nama_provinsi','provinsis.kode_provinsi',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('kotas','provinsis.id','=','kotas.id_provinsi')
              ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
              ->join('desas','kecamatans.id','=','desas.id_kecamatan')
              ->join('rws','desas.id','=','rws.id_desa')
              ->join('kasuses','rws.id','=','kasuses.id_rw')
            //   ->whereDate('kasuses.tanggal',Carbon::today())
            ->where('provinsis.id', $id)
            ->groupBy('provinsis.id')
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => [
                'hari_ini' => $provinsi
            ]
            ], 200);

    }

    public function kota()
    {
        $allDay = DB::table('kotas')
          ->select('kotas.nama_kota','kotas.kode_kota',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
              ->join('desas','kecamatans.id','=','desas.id_kecamatan')
              ->join('rws','desas.id','=','rws.id_desa')
              ->join('kasuses','rws.id','=','kasuses.id_rw')
          ->groupBy('kotas.id')->get();

          $toDay = DB::table('kotas')
          ->select('kotas.nama_kota','kotas.kode_kota',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
              ->join('desas','kecamatans.id','=','desas.id_kecamatan')
              ->join('rws','desas.id','=','rws.id_desa')
              ->join('kasuses','rws.id','=','kasuses.id_rw')
              ->whereDate('kasuses.tanggal',Carbon::today())
          ->groupBy('kotas.id')->get();  
       
          $positif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $reaktif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $sembuh = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($provinsi);
        return response([
            'success' => true,
            'data' => [
                        'Hari Ini' => $toDay,
                        'Semua' => $allDay

                        ],
            'message' => 'berhasil'
        ]);

    }

    public function kotashow($id)
    {
        $kota = DB::table('kotas')
          ->select('kotas.nama_kota','kotas.kode_kota',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('kecamatans','kotas.id','=','kecamatans.id_kota')
              ->join('desas','kecamatans.id','=','desas.id_kecamatan')
              ->join('rws','desas.id','=','rws.id_desa')
              ->join('kasuses','rws.id','=','kasuses.id_rw')
            //   ->whereDate('kasuses.tanggal',Carbon::today())
            ->where('kotas.id', $id)
            ->groupBy('kotas.id')
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => [
                'hari_ini' => $kota
            ]
            ], 200);

    }

    public function kecamatan()
    {
        $allDay = DB::table('kecamatans')
          ->select('kecamatans.nama_kecamatan',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('desas','kecamatans.id','=','desas.id_kecamatan')
              ->join('rws','desas.id','=','rws.id_desa')
              ->join('kasuses','rws.id','=','kasuses.id_rw')
          ->groupBy('kecamatans.id')->get();

          $toDay = DB::table('kecamatans')
          ->select('kecamatans.nama_kecamatan',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('desas','kecamatans.id','=','desas.id_kecamatan')
              ->join('rws','desas.id','=','rws.id_desa')
              ->join('kasuses','rws.id','=','kasuses.id_rw')
              ->whereDate('kasuses.tanggal',Carbon::today())
          ->groupBy('kecamatans.id')->get();
       
          $positif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $reaktif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $sembuh = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($kecamatan);
        return response([
            'success' => true,
            'data' => [
                        'Hari Ini' => $toDay,
                        'Semua' =>$allDay
                        ],
            'message' => 'berhasil'
        ]);

    }

    public function kecamatanshow($id)
    {
        $kecamatan = DB::table('kecamatans')
          ->select('kecamatans.nama_kecamatan',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('desas','kecamatans.id','=','desas.id_kecamatan')
              ->join('rws','desas.id','=','rws.id_desa')
              ->join('kasuses','rws.id','=','kasuses.id_rw')
            //   ->whereDate('kasuses.tanggal',Carbon::today())
            ->where('kecamatans.id', $id)
            ->groupBy('kecamatans.id')
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => [
                'hari_ini' => $kecamatan
            ]
            ], 200);

    }

    public function desa()
    {
        $allDay = DB::table('desas')
          ->select('desas.nama_desa',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('rws','desas.id','=','rws.id_desa')
              ->join('kasuses','rws.id','=','kasuses.id_rw')
          ->groupBy('desas.id')->get();

          $toDay = DB::table('desas')
          ->select('desas.nama_desa',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('rws','desas.id','=','rws.id_desa')
              ->join('kasuses','rws.id','=','kasuses.id_rw')
              ->whereDate('kasuses.tanggal',Carbon::today())
          ->groupBy('desas.id')->get();
       
          $positif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $reaktif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $sembuh = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($desa);
        return response([
            'success' => true,
            'data' => [
                        'Hari Ini' => $toDay,
                        'Semua' => $allDay
                        ],
            'message' => 'berhasil'
        ]);

    }

    public function desashow($id)
    {
        $desa = DB::table('desas')
          ->select('desas.nama_desa',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('rws','desas.id','=','rws.id_desa')
              ->join('kasuses','rws.id','=','kasuses.id_rw')
            //   ->whereDate('kasuses.tanggal',Carbon::today())
            ->where('desas.id', $id)
            ->groupBy('desas.id')
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => [
                'hari_ini' => $desa
            ]
            ], 200);

    }

    public function rw()
    {
        $allDay = DB::table('rws')
          ->select('rws.nama_rw',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('kasuses','rws.id','=','kasuses.id_rw')
          ->groupBy('rws.id')->get();

          $toDay = DB::table('rws')
          ->select('rws.nama_rw',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('kasuses','rws.id','=','kasuses.id_rw')
              ->whereDate('kasuses.tanggal',Carbon::today())
          ->groupBy('rws.id')->get();
       
          $positif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
            $reaktif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
            $sembuh = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
            $meninggal = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
        // dd($rw);
        return response([
            'success' => true,
            'data' => [
                        'Hari Ini' => $toDay,
                        'Semua' => $allDay
                        ],
            'message' => 'berhasil'
        ]);

    }

    public function rwshow($id)
    {
        $rw = DB::table('rws')
          ->select('rws.nama_rw',
          DB::raw('SUM(kasuses.reaktif) as Reaktif'),
          DB::raw('SUM(kasuses.positif) as Positif'),
          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
              ->join('kasuses','rws.id','=','kasuses.id_rw')
            //   ->whereDate('kasuses.tanggal',Carbon::today())
            ->where('rws.id', $id)
            ->groupBy('rws.id')
            ->get();
        
        return response()->json([
            'success' => true,
            'data' => [
                'hari_ini' => $rw
            ]
            ], 200);

    }

    public function positif()
    {
      $positif = DB::table('kasuses')
          ->select('kasuses.positif')
          ->sum ('kasuses.positif');
          
        return response([
            'success' => true,
            'data' => ['name' => 'total positif',
            'value' => $positif,
                    ],       
            'message' => 'Berhasil'
        ], 200);
    }      
      
    public function sembuh()
    {
      $sembuh = DB::table('kasuses')
          ->select('kasuses.sembuh')
          ->sum ('kasuses.sembuh');
          
          return response([
            'success' => true,
            'data' => ['name' => 'total sembuh',
            'value' => $sembuh,
                    ],       
            'message' => 'Berhasil'
        ], 200);
    }
    
    public function meninggal()
    {
      $meninggal = DB::table('kasuses')
          ->select('kasuses.meninggal')
          ->sum ('kasuses.meninggal');
          
          return response([
            'success' => true,
            'data' => ['name' => 'total meninggal',
            'value' => $meninggal,
                    ],       
            'message' => 'Berhasil'
        ], 200);
    }
    public function indonesia()
    {
        $positif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.positif');
        $reaktif = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.reaktif');
        $sembuh = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.sembuh');
        $meninggal = DB::table('rws')->select('kasuses.positif','kasuses.reaktif'.'kasuses.sembuh','kasuses.meninggal')->join('kasuses','rws.id','=','kasuses.id_rw')->sum('kasuses.meninggal');
    // dd($provinsi);
    return response([
        'success' => true,
        
        'Total' =>[
                    'Jumlah Reaktif' => $reaktif,
                    'Jumlah Positif' => $positif,
                    'Jumlah Sembuh' => $sembuh,
                    'Jumlah Meninggal' => $meninggal,
                ],
    ]);
    }
}
  







