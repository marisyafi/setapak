<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiJasa;
use App\TransaksiHomestay;
use App\TransaksiBarang;
use App\PembayaranPemandu;
use Carbon\Carbon;

class PembayaranPemanduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jasa=TransaksiJasa::where('transaction_status', 4)
                            ->orWhere('transaction_status', 5)
                            ->orderBy('tanggal_transfer','desc')
                            ->get();
        $homestay=TransaksiHomestay::where('transaction_status', 4)
                                    ->orWhere('transaction_status', 5)
                                    ->orderBy('tanggal_transfer', 'desc')
                                    ->get();   
        $barang=TransaksiBarang::where('transaction_status', 5)
                                    ->orWhere('transaction_status', 6)
                                    ->orderBy('tanggal_transfer','desc')
                                    ->get();

        $cekPemandu = 0;
        $cekBulan = "1-2-2000";
        $unix = strtotime($cekBulan);
        $cekBulan = date("nY", $unix);
        $counterJasa = 1;
        $counterHomestay = 1;
        $counterBarang = 1;
        $totalHarga = array_fill(0, 100, 0);
        $totalHargaHomestay = array_fill(0, 100, 0);
        $totalHargaBarang = array_fill(0, 100, 0); 
        $jasaBaru = collect();
        foreach ($jasa as $key => $jas) {
            $unix = strtotime($jas->tanggal_transfer);
            $bulan = date('nY', $unix);
            $bul = date('n', $unix);
            if (isset($cekarray[$jas->pemandu_id][$bulan])) {
                continue;
            }
            $cekarray[$jas->pemandu_id][$bulan] = 1;
            $pemandu = TransaksiJasa::where('pemandu_id',$jas->pemandu_id)->whereMonth('tanggal_transfer','=',$bul)->where('transaction_status',4)->get();
            foreach ($pemandu as $peman) {
                $totalHarga[$key] += $peman->total_harga;
            }
            $jasaBaru[$counterJasa++] = (object) array('id'=>$jas->pemandu_id,
                                                        'nama_pemandu'=>$jas->pemandu->nama_company , 
                                                        'bulan'=>date('F Y', strtotime($jas->tanggal_transfer)),
                                                        'tanggal'=>$jas->tanggal_transfer,  
                                                        'total_harga'=>$totalHarga[$key], 'hidden'=>date('nY', strtotime($jas->tanggal_transfer)),
                                                        'no_rekening'=>$jas->pemandu->no_rekening, 
                                                        'nama_rekening'=>$jas->pemandu->nama_rekening, 
                                                        'bank'=>$jas->pemandu->nama_bank);
        } 
        
        $homestayBaru = collect();
        foreach ($homestay as $key => $home) {
            $unix = strtotime($home->tanggal_transfer);
            $bulan = date('nY', $unix);
            $bul = date('n', $unix);
            if (isset($cekarrayhomestay[$home->pemandu_id][$bulan])) {
                continue;
            }
            $cekarrayhomestay[$home->pemandu_id][$bulan] = 1;
            $pemandu = TransaksiHomestay::where('pemandu_id',$home->pemandu_id)->whereMonth('tanggal_transfer','=',$bul)->where('transaction_status',4)->get();
            foreach ($pemandu as $peman) {
                $totalHargaHomestay[$key] += $peman->total_harga;
            }
            $homestayBaru[$counterHomestay++] = (object) array('id'=>$home->pemandu_id,
                                                        'nama_pemandu'=>$home->pemandu->nama_company , 
                                                        'bulan'=>date('F Y', strtotime($home->tanggal_transfer)), 
                                                        'tanggal'=>$home->tanggal_transfer, 
                                                        'total_harga'=>$totalHargaHomestay[$key], 'hidden'=>date('nY', strtotime($home->tanggal_transfer)),
                                                        'no_rekening'=>$home->pemandu->no_rekening, 
                                                        'nama_rekening'=>$home->pemandu->nama_rekening, 
                                                        'bank'=>$home->pemandu->nama_bank);
        }
        $barangBaru = collect();
        foreach ($barang as $key => $bar) {
            $unix = strtotime($bar->tanggal_transfer);
            $bulan = date('nY', $unix);
            $bul = date('n', $unix);
            if (isset($cekarraybarang[$bar->pemandu_id][$bulan])) {
                continue;
            }
            $cekarraybarang[$bar->pemandu_id][$bulan] = 1;
            $pemandu = TransaksiBarang::where('pemandu_id',$bar->pemandu_id)->whereMonth('tanggal_transfer','=',$bul)->where('transaction_status',5)->get();
            foreach ($pemandu as $peman) {
                $totalHargaBarang[$key] += $peman->total_harga;
            }
            $barangBaru[$counterBarang++] = (object) array('id'=>$bar->pemandu_id,
                                                        'nama_pemandu'=>$bar->pemandu->nama_company , 
                                                        'status'=>$bar->transaction_status, 
                                                        'bulan'=>date('F Y', strtotime($bar->tanggal_transfer)),
                                                        'tanggal'=>$bar->tanggal_transfer, 
                                                        'total_harga'=>$totalHargaBarang[$key], 'hidden'=>date('nY', strtotime($bar->tanggal_transfer)),
                                                        'no_rekening'=>$bar->pemandu->no_rekening, 
                                                        'nama_rekening'=>$bar->pemandu->nama_rekening, 
                                                        'bank'=>$bar->pemandu->nama_bank);
        }
        return view('pemanduPembayaran.index', compact('jasa', 'homestay', 'barang', 'totalHarga', 'jasaBaru','homestayBaru', 'barangBaru'));
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
        $pembayaran = new PembayaranPemandu;
        $pembayaran->pemandu_id = $request->input('id');
        $pembayaran->tanggal_transfer = $request->input('tanggal_transfer');
        $pembayaran->total = $request->input('total');
        $pembayaran->bulan = $request->input('bulan');
        $pembayaran->jenis = $request->input('jenis');

        $pembayaran->save();

        $unix = strtotime($request->input('tanggal'));
        $bulan = date('n', $unix);
        $tahun = date('Y', $unix);
        if ($request->input('jenis') == 'barang'){
            $transaksi = TransaksiBarang::where('pemandu_id',$request->input('id'))->whereMonth('tanggal_transfer', $bulan)->whereYear('tanggal_transfer', $tahun)->where('transaction_status', '5')->get();
            foreach ($transaksi as $trans){
                $transaksitarget = TransaksiBarang::find($trans->transaction_id);
                $transaksitarget->transaction_status = '6';
                $transaksitarget->save();
            }
        }
        elseif ($request->input('jenis') == 'homestay'){
            $transaksi = TransaksiHomestay::where('pemandu_id',$request->input('id'))->whereMonth('tanggal_transfer', $bulan)->whereYear('tanggal_transfer', $tahun)->where('transaction_status', '4')->get();
            foreach ($transaksi as $trans){
                $transaksitarget = TransaksiHomestay::find($trans->transaction_id);
                $transaksitarget->transaction_status = '5';
                $transaksitarget->save();
            }
        }
        elseif ($request->input('jenis') == 'jasa'){
            $transaksi = TransaksiJasa::where('pemandu_id',$request->input('id'))->whereMonth('tanggal_transfer', $bulan)->whereYear('tanggal_transfer', $tahun)->where('transaction_status', '4')->get();
            foreach ($transaksi as $trans){
                $transaksitarget = TransaksiJasa::find($trans->transaction_id);
                $transaksitarget->transaction_status = '5';
                $transaksitarget->save();
            }
        }

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
        //
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

    public function ship(Request $request, $orderId)
    {
        // $ = Order::findOrFail($orderId);

        Mail::to($request->user())->send(new OrderShipped($order));
    }
}
