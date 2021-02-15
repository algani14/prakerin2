<?php

namespace App\Http\Controllers;

use App\Models\Kota;
use App\Models\Provinsi;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class KotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


        $kota = Kota::with('provinsi')->get();
        return view('admin.kota.index',compact('kota'));
    }

   
    public function create()
    {
        $provinsi=Provinsi::all();
        return view('admin.kota.create', compact('provinsi'));
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kota' => 'required|unique:kotas|max:255',
            'nama_kota' => 'required|unique:kotas|max:255',
           
        ]);

        $kota = new Kota();
        $kota->id_provinsi =$request->id_provinsi;
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index')
        ->with(['success' => 'Data berhasil di input!']);
    }

   
    public function show( $id)
    {
        

        $kota = Kota::findOrFail($id);
        $provinsi=Provinsi::all();
        return view ('admin.kota.show' , compact('kota' , 'provinsi'));
    }

    
    public function edit( $id)
    {

        $kota = Kota::findOrfail($id);
        $provinsi = Provinsi::all();
        return view('admin.kota.edit',compact('provinsi' , 'kota'));
    }

    
    public function update(Request $request, $id)
    {
        $kota = Kota::findOrfail($id);
        $kota->id_provinsi = $request->id_provinsi;
        $kota->kode_kota = $request->kode_kota;
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index')
        ->with(['info' => 'Data berhasil di Edit!']);
    }

    
    public function destroy( $id)
    {
        $data = Kota::findOrFail($id);
        $data->delete();
        return redirect()->route('kota.index')->with(['error' => 'Data berhasil di hapus!']);
    }
}
