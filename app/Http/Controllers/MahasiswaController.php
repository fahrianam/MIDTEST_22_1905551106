<?php

namespace App\Http\Controllers;

use App\mahasiswa;
use Illuminate\Http\Request;
use App\dosen;
use App\mata_kuliah;
use App\matkul_pilihan_mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = mahasiswa::all();
        return view('mahasiswa-list',compact(['mahasiswa']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosen = dosen::all();
        $mata_kuliah = mata_kuliah::all();
        return view('mahasiswa-new',compact(['dosen','mata_kuliah']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mahasiswa = new mahasiswa;
        $mahasiswa->timestamps = false;
        $mahasiswa->nama_mahasiswa = $request->nama;
        $mahasiswa->NIM = $request->nim;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->no_telp = $request->telepon;
        $mahasiswa->email = $request->email;
        $mahasiswa->dosen_id = $request->dosen_pembimbing;
        $mahasiswa->save();
        // tambah data di tabel matkul_pilihan_mahasiswa
        if (is_array($request->mata_kuliah_id) || is_object($request->mata_kuliah_id)){
        foreach($request->mata_kuliah_id as $mata_kuliah_id){
            $matkul_pilihan_mahasiswa = new matkul_pilihan_mahasiswa;
            $matkul_pilihan_mahasiswa->timestamps = false;
            $matkul_pilihan_mahasiswa->mahasiswa_id = $mahasiswa->id;
            $matkul_pilihan_mahasiswa->mata_kuliah_id = $mata_kuliah_id;
            $matkul_pilihan_mahasiswa->save();
        }
        }
        return redirect('/mahasiswa')->with('message', 'Data Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(mahasiswa $mahasiswa)
    {
        $dosen = dosen::all();
        $mata_kuliah = mata_kuliah::all();
        $matkul_pilihan_mahasiswa  = matkul_pilihan_mahasiswa::where('mahasiswa_id',$mahasiswa->id)->pluck('mata_kuliah_id')->toArray();
        return view('mahasiswa-view',compact(['mahasiswa','dosen','mata_kuliah','matkul_pilihan_mahasiswa']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(mahasiswa $mahasiswa)
    {
        $dosen = dosen::all();
        $mata_kuliah = mata_kuliah::all();
        $matkul_pilihan_mahasiswa  = matkul_pilihan_mahasiswa::where('mahasiswa_id',$mahasiswa->id)->pluck('mata_kuliah_id')->toArray();
        return view('mahasiswa-edit',compact(['mahasiswa','dosen','mata_kuliah','matkul_pilihan_mahasiswa']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        $mahasiswa->timestamps = false;
        $mahasiswa->nama_mahasiswa = $request->nama;
        $mahasiswa->NIM = $request->nim;
        $mahasiswa->jenis_kelamin = $request->jenis_kelamin;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->no_telp = $request->telepon;
        $mahasiswa->email = $request->email;
        $mahasiswa->dosen_id = $request->dosen_pembimbing;
        $mahasiswa->save();

        //hapus terlebih dahulu hobby orang yang sedang kita edit
        matkul_pilihan_mahasiswa::where('mahasiswa_id',$mahasiswa->id)->delete();
        if(!empty($request->mata_kuliah_id)){
        foreach($request->mata_kuliah_id as $mata_kuliah_id){
            $matkul_pilihan_mahasiswa = new matkul_pilihan_mahasiswa;
            $matkul_pilihan_mahasiswa->timestamps = false;
            $matkul_pilihan_mahasiswa->mahasiswa_id = $mahasiswa->id;
            $matkul_pilihan_mahasiswa->mata_kuliah_id = $mata_kuliah_id;
            $matkul_pilihan_mahasiswa->save();
        }
    }
    return redirect('/mahasiswa')->with('message', 'Data Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        matkul_pilihan_mahasiswa::where('mahasiswa_id',$id)->delete();
        mahasiswa::where('id',$id)->delete();
        return redirect('/mahasiswa')->with('message', 'Data Mahasiswa Berhasil Dihapus');
    }
}
