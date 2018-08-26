<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokasi;
use App\Alamat;

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
        $alamat = Alamat::get();  
        return view('lokasi.index', compact('lokasi', 'alamat'));
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
            'nama_wisata' => 'required|max:255',                   
        ]);

        $lokasi = new Lokasi;
        $lokasi->alamatcategory_id = $request->input("kecamatan");
        $lokasi->nama_wisata = $request->input("nama_wisata");

        dd($request);
        $lokasi->save();

        return redirect()->back();
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
        $lokasi = Lokasi::findOrFail($id);
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
            'kecamatan' => 'required|max:255',
            'nama_wisata' => 'required|',                   
        ]);
        
        $lokasi = Lokasi::findOrFail($request->wisata_id);
        $lokasi->alamatcategory_id = $request->input("kecamatan");
        $lokasi->nama_wisata = $request->input("nama_wisata");

        $lokasi->save();

        return redirect()->back();
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
