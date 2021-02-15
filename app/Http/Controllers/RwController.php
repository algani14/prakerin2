<?php

namespace App\Http\Controllers;

use App\Models\Rw;
use App\Models\Desa;
use Illuminate\Http\Request;

class RwController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $rw = Rw::all();
        $desa = Desa::all();
        return view('admin.rw.index', \compact('rw'));
    }

    
    public function create()
    {
        $rw = Rw::all();
        $desa = Desa::all();
        return view('admin.rw.create', \compact('desa', 'rw'));
    }

    
    public function store(Request $request)
    {
        $rw = new Rw;
        $rw->nama_rw = $request->nama_rw;
        $rw->id_desa = $request->id_desa;
        $rw->save();
        return redirect()->route('rw.index')->with(['success' => 'Data berhasil ditambah']);
    }

   
    public function show($id)
    {
        $rw = Rw::findOrFail($id);
        $desa=Desa::all();
        return view ('admin.rw.show' , compact('desa' , 'rw'));
    }

    
    public function edit($id)
    {
        $rw = Rw::findOrFail($id);
        $desa = Desa::all();
        return view('admin.rw.edit', compact('rw', 'desa'));
    }

   
    public function update(Request $request, $id)
    {
        $rw = Rw::findOrFail($id);
        $rw->nama_rw = $request->nama_rw;
        $rw->id_desa = $request->id_desa;
        $rw->save();
        return redirect()->route('rw.index')->with(['info' => 'Data berhasil di edit']);
    }

   
    public function destroy($id)
    {
        $rw = Rw::findOrFail($id);
        $rw->delete();
        return redirect()->route('rw.index')->with(['error' => 'Data berhasil di hapus!']);
    }
}
