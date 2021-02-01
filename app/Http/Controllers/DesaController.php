<?php

namespace App\Http\Controllers;

use App\Models\Desa;
use App\Models\Kecamatan;
use App\Http\Controllers\DB;    
use Illuminate\Http\Request;

class desaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $desa = desa::with('kecamatan')->get();
        return view('admin.desa.index',compact('desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kecamatan::all();
        return view('admin.desa.create',compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
    /* $request->validate([
        
        'nama_desa' => 'required|unique:desas',
    ], [
        'nama_desa.required' => 'Nama desa Wajib Di Isi ',
        'nama_desa.unique' => 'Nama desa Sudah Dipakai',
    ]);*/
        $desa= new desa();
        $desa->nama_desa = $request->nama_desa;
        $desa->id_kecamatan = $request->id_kecamatan;
        $desa->save();
        return redirect()->route('desa.index')
            ->with(['message'=>'Data Berhasil Dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $desa = desa::findOrFail($id);
        return view('admin.desa.show',compact('desa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kecamatan = Kecamatan::all();
        $desa = desa::findOrFail($id);
        return view('admin.desa.edit',compact('desa','kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $desa = desa::findOrFail($id);
        $desa->nama_desa = $request->nama_desa;
        $desa->id_kecamatan = $request->id_kecamatan;
        $desa->save();
        return redirect()->route('desa.index')
            ->with(['message'=>'Data Berhasil Diedit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $desa = desa::findOrFail($id)->delete();
        return redirect()->route('desa.index')
                        ->with(['message1'=>'Data Berhasil Dihapus']);
    }
}