<?php

namespace App\Http\Controllers;

use App\Absen;
use App\Siswa;
use App\Kelas;
use App\Piket;
use Illuminate\Http\Request;
use session;
class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absen = Absen::all();
        return view('absen.index',compact('absen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        $piket = Piket::all();
        return view('absen.create',compact('siswa','kelas','piket'));
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
            'siswa_id' => 'required|',
            'kelas_id' => 'required|',
            'keterangan' => 'required|',
            'alasan' => 'required|',
            'piket_id' => 'required|'
        ]);
        $absen = new Absen;
        $absen->siswa_id = $request->siswa_id;
        $absen->kelas_id = $request->kelas_id;
        $absen->keterangan = $request->keterangan;
        $absen->alasan = $request->alasan;    
        $absen->piket_id = $request->piket_id;
        $absen->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$a->nama</b>"
        ]);
        return redirect()->route('absen.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        $absen = Absen::findOrFail($id);
        return view('absen.show',compact('absen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        $absen = Absen::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        $this->validate($request,[
            'siswa_id' => 'required|',
            'kelas_id' => 'required|',
            'keterangan' => 'required|',
            'alasan' => 'required|',
            'piket_id' => 'required|'
        ]);
        $absen = new Absen;
        $absen->siswa_id = $request->siswa_id;
        $absen->kelas_id = $request->kelas_id;
        $absen->keterangan = $request->keterangan;
        $absen->alasan = $request->alasan;    
        $absen->piket_id = $request->piket_id;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$a->nama</b>"
        ]);
        return redirect()->route('absen.index');    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Absen $absen)
    {
        $absen = Absen::findOrFail($id);
        $absen->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('absen.index');
    }
}
