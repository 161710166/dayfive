<?php

namespace App\Http\Controllers;

use App\Siswa;
use App\Kelas;
use Illuminate\Http\Request;
use session;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siswa = Siswa::with('kelas')->get();
        return view('siswa.index',compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        $Siswa = Siswa::all();
        return view('siswa.create',compact('siswa','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nis' => 'required|',
            'nama' => 'required|',
            'jk' => 'required|',
            'tanggal_lahir' => 'required|',
            'alamat' => 'required|',
            'kelas_id' => 'required|'
        ]);
        $siswa = new Siswa;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->jk = $request->jk;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->alamat = $request->alamat;
        $siswa->kelas_id = $request->kelas_id;        
        $siswa->save();
        return redirect()->route('siswa.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Siswa $siswa)
    {
        $siswa = Siswa::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siswa $siswa)
    {
        $this->validate($request,[
            'nis' => 'required|',
            'nama' => 'required|',
            'jk' => 'required|',
            'tanggal_lahir' => 'required|',
            'alamat' => 'required|',
            'kelas_id' => 'required|'
        ]);
        $siswa = Siswa::findOrFail($id);
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->jk = $request->jk;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->alamat = $request->alamat;
        $siswa->kelas_id = $request->kelas_id;        
        $siswa->save();Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$siswa->nama</b>"
        ]);
        return redirect()->route('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();
        return redirect()->route('siswa.index');
    }
}
