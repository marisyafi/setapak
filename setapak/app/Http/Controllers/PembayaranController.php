<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\TransaksiJasa;
use App\TransaksiHomestay;
use App\TransaksiBarang;
use App\UserWisatawan;
use App\Jasa;
use App\Homestay;
use App\Barang;
use App\Pemandu;
use DB;

class PembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jasau=TransaksiJasa::where('transaction_status', 0)->orWhere('transaction_status', 1)->get();
        $jasac=TransaksiJasa::where('transaction_status', 2)
                            ->orWhere('transaction_status', 3)
                            ->orWhere('transaction_status', 4)
                            ->orWhere('transaction_status', 5)->get();
        $homestayu=TransaksiHomestay::where('transaction_status', 0)->orWhere('transaction_status', 1)->get();
        $homestayc=TransaksiHomestay::where('transaction_status', 2)
                            ->orWhere('transaction_status', 3)
                            ->orWhere('transaction_status', 4)
                            ->orWhere('transaction_status', 5)->get();   
        $barangu=TransaksiBarang::where('transaction_status', 0)->orWhere('transaction_status', 1)->get();
        $barangc=TransaksiBarang::where('transaction_status', 2)
                            ->orWhere('transaction_status', 3)
                            ->orWhere('transaction_status', 4)
                            ->orWhere('transaction_status', 5)
                            ->orWhere('transaction_status', 6)->get();  
        $user=UserWisatawan::get();
        $pemandu=Pemandu::get();
        return view('pembayaran.index', compact('jasau', 'jasac', 'homestayu', 'homestayc', 'barangu', 'barangc', 'daftarBarang','user', 'pemandu'));
    }
    public function indexHomestay()
    {
        $homestayu=TransaksiHomestay::where('transaction_status', 0)->orWhere('transaction_status', 1)->get();
        $homestayc=TransaksiHomestay::where('transaction_status', 2)
                            ->orWhere('transaction_status', 3)
                            ->orWhere('transaction_status', 4)
                            ->orWhere('transaction_status', 5)->get(); 
        $user=UserWisatawan::get();
        $pemandu=Pemandu::get();
        return view('pembayaran.homestay', compact('homestayu', 'homestayc', 'user', 'pemandu'));
    }
    public function indexBarang()
    {   
        $barangu=TransaksiBarang::where('transaction_status', 0)->orWhere('transaction_status', 1)->get();
        $barangc=TransaksiBarang::where('transaction_status', 2)
                            ->orWhere('transaction_status', 3)
                            ->orWhere('transaction_status', 4)
                            ->orWhere('transaction_status', 5)
                            ->orWhere('transaction_status', 6)->get();  
        $user=UserWisatawan::get();
        $pemandu=Pemandu::get();
        return view('pembayaran.barang', compact('barangu', 'barangc', 'user', 'pemandu'));
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
        //
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
       $barang = TransaksiBarang::findOrFail($id);
       return view('pembayaran.index', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
                'transaction_status' => 'required'
        ]);

        $jasa = TransaksiJasa::findOrFail($id);
        $jasa->transaction_status = $request->input("transaction_status");
        $jasa->save();

        return redirect()->route('pembayaran.index');
    }

    public function destroy($id)
	{
		$jasa = TransaksiJasa::findOrFail($id);
        $jasa->delete();
        $homestay = TransaksiHomestay::findOrFail($id);
        $homestay->delete();
        $barang = TransaksiBarang::findOrFail($id);
        $barang->delete();
		return redirect()->route('pembayaran.index')->with('message2', 'Item deleted successfully.');
    }

    public function destroyJasa($id)
	{
        $jasa = TransaksiJasa::findOrFail($id);
        $jasa->delete();

		return redirect()->route('pembayaran.index');
    }

    public function destroyHome($id)
	{
        $homestay = TransaksiHomestay::findOrFail($id);
        $homestay->delete();

		return redirect()->route('pembayaran.index');
    }

    public function destroyBarang($id)
	{
        $barang = TransaksiBarang::findOrFail($id);
        $barang->delete();

		return redirect()->route('pembayaran.index');
    }
    
    public function statusJasa(Request $request, $id) {
    
            $this->validate($request, [
                'transaction_status' => 'required'
            ]);
            $jasa = TransaksiJasa::findOrFail($id);
            $jasa->transaction_status = $request->input("transaction_status");
            $jasa->tanggal_transfer = now();
            $jasa->save();

            return redirect()->route('pembayaran.index')->with('message', 'Memperbaharui status berhasil.');
    }

    public function statusHomestay(Request $request, $id) {
    
            $this->validate($request, [
                'transaction_status' => 'required'
            ]);
            
            $homestay = TransaksiHomestay::findOrFail($id);
            $homestay->transaction_status = $request->input("transaction_status");
            $homestay->save();

            return redirect()->route('pembayaran.index')->with('message', 'Memperbaharui status berhasil.');
    }

    public function statusBarang(Request $request, $id) {
    
            $this->validate($request, [
                'transaction_status' => 'required'
            ]);
            $barang = TransaksiBarang::findOrFail($id);
            $barang->transaction_status = $request->input("transaction_status");
            $barang->save();

            return redirect()->route('pembayaran.index')->with('message', 'Memperbaharui status berhasil.');
    }
	
}
