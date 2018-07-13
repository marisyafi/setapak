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
        $jasa=TransaksiJasa::get();
        $homestay=TransaksiHomestay::get();
        $daftar=Homestay::get();
        $barang=TransaksiBarang::get();
        $user=UserWisatawan::get();
        $pemandu=Pemandu::get();
        return view('pembayaran.index', compact('jasa', 'homestay', 'daftar', 'barang', 'daftarBarang','user', 'pemandu'));
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
        $jasa = TransaksiJasa::findOrFail($id);
        $homestay = TransaksiHomestay::findOrFail($id);
        $barang = TransaksiBarang::findOrFail($id);
		return view('pembayaran.show', compact('jasa', 'homestay', 'barang'));
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
        
        
        // $barang = TransaksiBarang::findOrFail($id);
        // if($barang->transaction_status==0)
        //     $barang->transaction_status = 1;
        // else
        //     $barang->transaction_status = 0;
        // $barang->save();

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

   	// public function approvehtml($d){
        // if($d->status==0) 
        //     return 
        //     '<form action="/pembayaranstatus/'.$d->id.'" method="POST" style="display: inline;" onsubmit="if(confirm("Publsih? Are you sure?")) { return true } else {return false };">
        //         <input type="hidden" name="_method" value="POST">
        //         <input type="hidden" name="status" value="1">
        //         <input type="hidden" name="_token" value="'.csrf_token().'">
        //         <button type="submit" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-ok"></i> Approve</button>
        //     </form>';
        // else
        //      return
        //     '<form action="/pembayaranstatus/'.$d->id.'" method="POST" style="display: inline;" onsubmit="if(confirm("Unpublish ID ? Are you sure?")) { return true } else {return false };">
        //         <input type="hidden" name="_method" value="POST">
        //         <input type="hidden" name="status" value="0">
        //         <input type="hidden" name="_token" value="'.csrf_token().'">
        //         <button type="submit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-remove"></i> Reject</button>
        //     </form>';
        
    // }
    
    public function statusJasa(Request $request, $id) {
    
            $this->validate($request, [
                'transaction_status' => 'required'
            ]);
            
            $jasa = TransaksiJasa::findOrFail($id);
            $jasa->transaction_status = $request->input("transaction_status");
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
