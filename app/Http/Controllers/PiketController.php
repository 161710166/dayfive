<?php

namespace App\Http\Controllers;

use App\Piket;
use Illuminate\Http\Request;
use session;
class PiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $piket = Piket::all();
        return view('piket.index',compact('piket'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('piket.create');
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
            'nama_guru_piket' => 'required|',
            'hari' => 'required|unique:pikets'
        ]);
        $piket = new Piket;
        $piket->nama_guru_piket = $request->nama_guru_piket;
        $piket->hari = $request->hari;
        $piket->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$a->nama</b>"
        ]);
        return redirect()->route('piket.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Piket  $piket
     * @return \Illuminate\Http\Response
     */
    public function show(Piket $piket)
    {
        $piket = Piket::findOrFail($id);
        return view('piket.show',compact('piket'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Piket  $piket
     * @return \Illuminate\Http\Response
     */
    public function edit(Piket $piket)
    {
        $piket = Piket::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Piket  $piket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piket $piket)
    {
        $this->validate($request,[
            'nama_guru_piket' => 'required|',
            'hari' => 'required'
        ]);
        $a = Piket::findOrFail($id);
        $a->nama_guru_piket = $request->nama_guru_piket;
        $a->hari = $request->hari;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$a->nama_guru_piket</b>"
        ]);
        return redirect()->route('piket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Piket  $piket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piket $piket)
    {
        $piket = Piket::findOrFail($id);
        $piket->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('piket.index');
    }
}
