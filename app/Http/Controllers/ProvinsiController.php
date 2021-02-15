<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index()
    {
        $provinsi = Provinsi::all();
        return view('admin.provinsi.index',compact('provinsi'));
    }

    public function create()
    {
        return view('admin.provinsi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_provinsi' => 'required|unique:provinsis|max:255',
            'nama_provinsi' => 'required|unique:provinsis|max:255',
        ]);

        $provinsi = new Provinsi();
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')
        ->with(['success' => 'Data berhasil di input!']);
    }

    
    public function show($id)
    {
        $provinsi = Provinsi::findOrfail($id);
        return view('admin.provinsi.show',compact('provinsi'));

    }

    
    public function edit($id)
    {
        $provinsi = Provinsi::findOrfail($id);
        return view('admin.provinsi.edit',compact('provinsi'));
        $this->validate($request,[
            'kode_provinsi' => 'required|unique:provinsis|max:255',
            'nama_provinsi' => 'required|unique:provinsis|max:255',
            
         ]);
    }


    public function update(Request $request, $id)
    {
        $provinsi = Provinsi::findOrfail($id);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')
        ->with(['info' => 'Data berhasil di Edit!']);
    }

    
    public function destroy($id)
    {
        $provinsi = Provinsi::findOrfail($id);
        $provinsi->delete();
        return redirect()->route('provinsi.index')
        ->with(['error' => 'Data berhasil di hapus!']);
    }
}
