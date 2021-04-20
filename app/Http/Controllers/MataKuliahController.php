<?php

namespace App\Http\Controllers;

use App\mata_kuliah;
use Illuminate\Http\Request;
use App\dosen;
use App\matkul_pilihan_mahasiswa;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mata_kuliah = mata_kuliah::all();
        return view('matakuliah-list',compact(['mata_kuliah']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosen = dosen::all();
        return view('matakuliah-new',compact(['dosen']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mata_kuliah = new mata_kuliah;
        $mata_kuliah->timestamps = false;
        $mata_kuliah->nama_mata_kuliah = $request->nama_mata_kuliah;
        $mata_kuliah->SKS = $request->sks;
        $mata_kuliah->hari = $request->hari;
        $mata_kuliah->jam_mulai = $request->jam_mulai;
        $mata_kuliah->jam_akhir = $request->jam_akhir;
        $mata_kuliah->id_dosen = $request->dosen_pengampu;
        $mata_kuliah->save();
        return redirect('/matakuliah')->with('message', 'Data Mata Kuliah Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mata_kuliah  $mata_kuliah
     * @return \Illuminate\Http\Response
     */
    public function show(mata_kuliah $matakuliah)
    {
        $dosen = dosen::all();
        return view('matakuliah-view',compact(['matakuliah','dosen']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mata_kuliah  $mata_kuliah
     * @return \Illuminate\Http\Response
     */
    public function edit(mata_kuliah $matakuliah)
    {
        $dosen = dosen::all();
        return view('matakuliah-edit',compact(['matakuliah','dosen']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mata_kuliah  $mata_kuliah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mata_kuliah $matakuliah)
    {
        $matakuliah->timestamps = false;
        $matakuliah->nama_mata_kuliah = $request->nama_mata_kuliah;
        $matakuliah->SKS = $request->sks;
        $matakuliah->hari = $request->hari;
        $matakuliah->jam_mulai = $request->jam_mulai;
        $matakuliah->jam_akhir = $request->jam_akhir;
        $matakuliah->id_dosen = $request->dosen_pengampu;
        $matakuliah->save();
        return redirect('/matakuliah')->with('message', 'Data Mata Kuliah Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mata_kuliah  $mata_kuliah
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(matkul_pilihan_mahasiswa::where('mata_kuliah_id',$id)->exists()){
            return redirect('/matakuliah')->with('message', 'Data Mata Kuliah Tidak Dapat Dihapus karena Mata Kuliah Telah Dipilih Mahasiswa');
        }
        mata_kuliah::where('id',$id)->delete();
        return redirect('/matakuliah')->with('message', 'Data Mata Kuliah Berhasil Dihapus');
    }
}
