<?php

namespace App\Http\Controllers;
use App\Models\Provinsi;    
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
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
        $pesan=[
            'nama_provinsi.required' => 'provinsi Harus Diisi',
            'nama_provinsi.max' => 'provinsi sudah Maximal',
        
        ];
        $this->validate($request,[
          
            'nama_provinsi' => 'required|max:50'
        ],$pesan);
        $provinsi = new Provinsi();
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi')
                ->with(['succes'=>'provinsi berhasil dibuat']);



        $provinsi = new Provinsi();
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')
               ->with(['succes' => 'Data <b> ',$provinsi->nama_provinsi,
                '</b> berhasil di input']);
    }

    public function show ($id)
    {
        $provinsi = provinsi::findOrFail($id);
        return view('admin.provinsi.show', compact('provinsi'));
    }

    public function edit($id)
    {
        $provinsi = provinsi::findOrFail($id);
        return view('admin.provinsi.edit', compact('provinsi'));
    }

    public function update(Request $request, $id)
    {
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')
          ->with(['succes'=>'Data <b>' ,$provinsi->nama_provinsi,
          '</b> berhasil di edit']);    
    }

    public function destroy($id)
    {
            $provinsi = provinsi::findOrfail($id);
            $provinsi->delete();
            return redirect()->route('provinsi.index')
            ->with(['success'=>'Data <b>', $provinsi->nama_provinsi,
            '<b> berhasil dihapus']);
   }
}       
