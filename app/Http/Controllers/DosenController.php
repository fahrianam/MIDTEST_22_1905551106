<?php

namespace App\Http\Controllers;

use App\dosen;
use Illuminate\Http\Request;
use App\mahasiswa;
use App\mata_kuliah;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = dosen::all();
        return view('dosen-list',compact(['dosen']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen-new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dosen = new dosen;
        $dosen->timestamps = false;
        $dosen->nama_dosen = $request->nama;
        $dosen->NIK = $request->nik;
        $dosen->jenis_kelamin = $request->jenis_kelamin;
        $dosen->tanggal_lahir = $request->tanggal_lahir;
        $dosen->alamat = $request->alamat;
        $dosen->no_telp = $request->telepon;
        $dosen->email = $request->email;
        $dosen->save();
        return redirect('/dosen')->with('message', 'Data Dosen Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function show(dosen $dosen)
    {
        return view('dosen-view',compact(['dosen']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function edit(dosen $dosen)
    {
        return view('dosen-edit',compact(['dosen']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dosen $dosen)
    {
        $dosen->timestamps = false;
        $dosen->nama_dosen = $request->nama;
        $dosen->NIK = $request->nik;
        $dosen->jenis_kelamin = $request->jenis_kelamin;
        $dosen->tanggal_lahir = $request->tanggal_lahir;
        $dosen->alamat = $request->alamat;
        $dosen->no_telp = $request->telepon;
        $dosen->email = $request->email;
        $dosen->save();
        return redirect('/dosen')->with('message', 'Data Dosen Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dosen  $dosen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(mahasiswa::where('dosen_id',$id)->exists()){
            return redirect('/dosen')->with('message', 'Data Dosen Tidak Dapat Dihapus karena Data Sedang Terpakai Sebagai Pembimbing Akademik');
        }
        else if(mata_kuliah::where('id_dosen',$id)->exists()){
            return redirect('/dosen')->with('message', 'Data Dosen Tidak Dapat Dihapus karena Data Sedang Terpakai Sebagai Dosen Pengampu');
        }
        dosen::where('id',$id)->delete();
        return redirect('/dosen')->with('message', 'Data Dosen Berhasil Dihapus');
    }
}
