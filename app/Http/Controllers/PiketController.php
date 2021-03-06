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
            'hari' => 'required|'
        ]);
        $piket = new Piket;
        $piket->nama_guru_piket = $request->nama_guru_piket;
        $piket->hari = $request->hari;
        $piket->save();
        return redirect()->route('piket.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Piket  $piket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piket $piket)
    {
        $this->validate($request,[
            'nama_guru_piket' => 'required|',
            'hari' => 'required'
        ]);
        $piket = Piket::findOrFail($id);
        $piket->nama_guru_piket = $request->nama_guru_piket;
        $piket->hari = $request->hari;
        $piket->save();
        return redirect()->route('piket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Piket  $piket
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $piket = Piket::findOrFail($id);
        $piket->delete();
        return redirect()->route('piket.index');
    }
}
