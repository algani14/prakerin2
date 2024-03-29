<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $positif = DB::table('rws')
            ->select('kasuses.positif',
            'kasuses.sembuh', 'kasuses.meninggal')
            ->join('kasuses','rws.id','=','kasuses.id_rw')
            ->sum('kasuses.positif'); 
        $sembuh = DB::table('rws')
            ->select('kasuses.positif',
            'kasuses.sembuh','kasuses.meninggal')
            ->join('kasuses','rws.id','=','kasuses.id_rw')
            ->sum('kasuses.sembuh');
        $meninggal = DB::table('rws')
            ->select('kasuses.positif',
            'kasuses.sembuh','kasuses.meninggal')
            ->join('kasuses','rws.id','=','kasuses.id_rw')
            ->sum('kasuses.meninggal');
        $global = file_get_contents('https://api.kawalcorona.com/positif');
        $posglobal = json_decode($global, TRUE);

        // Date
        $tanggal = Carbon::now()->format('D d-M-Y H:i:s' );

        // Table Provinsi
        $tampil = DB::table('provinsis')
                  ->join('kotas','kotas.id_provinsi','=','provinsis.id')
                  ->join('kecamatans','kecamatans.id_kota','=','kotas.id')
                  ->join('desas','desas.id_kecamatan','=','kecamatans.id')
                  ->join('rws','rws.id_desa','=','desas.id')
                  ->join('kasuses','kasuses.id_rw','=','rws.id')
                  ->select('nama_provinsi',
                          DB::raw('SUM(kasuses.positif) as Positif'),
                          DB::raw('SUM(kasuses.sembuh) as Sembuh'),
                          DB::raw('SUM(kasuses.meninggal) as Meninggal'))
                  ->groupBy('nama_provinsi')->orderBy('nama_provinsi','ASC')
                  ->get();

        // Table Global
        $datadunia= file_get_contents("https://api.kawalcorona.com/");
        $dunia = json_decode($datadunia, TRUE);
            
        return view('home',compact('positif','sembuh','meninggal', 'tanggal','tampil','posglobal','dunia'));
    }

    }
   