<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokasi;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasi = Lokasi::get();  
        return view('lokasi.index', compact('lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kabupaten' => 'required|max:255',
            'kecamatan' => 'required|',                   
        ]);

        $lokasi = new Lokasi;
        $lokasi->provinsi = "Jawa Barat";
        $lokasi->kode_pos = NULL;
        $lokasi->kabupaten = $request->input("kabupaten");
        $lokasi->kecamatan = $request->input("kecamatan");

        $lokasi->save();

        return redirect()->route('lokasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kabupaten' => 'required|max:255',
            'kecamatan' => 'required|',                   
        ]);

        $lokasi = Lokasi::findOrFail($id);
        $lokasi->kabupaten = $request->input("kabupaten");
        $lokasi->kecamatan = $request->input("kecamatan");

        $lokasi->save();

        return redirect()->route('lokasi.index')->with('message2', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
