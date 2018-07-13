<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TransaksiJasa;
use App\TransaksiHomestay;
use App\TransaksiBarang;
use App\Pemandu;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //line chart
        $data = array();
        $jasa = TransaksiJasa::get();
        $bulan3 = date('m');
        $tahun = date('Y');
        for ($i=0 ;$i<7;$i++){
            $bulan = $bulan3 - $i;
            if ($bulan == 0){
                $bulan = 12;
                $tahun --;
            }
            if ($bulan==1){
                $bulan2 = "Januari";
            }else if ($bulan==2){
                $bulan2 = "Februari";
            }else if ($bulan==3){
                $bulan2 = "Maret";
            }else if ($bulan==4){
                $bulan2 = "April";
            }else if ($bulan==5){
                $bulan2 = "Mei";
            }else if ($bulan==6){
                $bulan2 = "Juni";
            }else if ($bulan==7){
                $bulan2 = "Juli";
            }else if ($bulan==8){
                $bulan2 = "Agustus";
            }else if ($bulan==9){
                $bulan2 = "September";
            }else if ($bulan==10){
                $bulan2 = "Oktober";
            }else if ($bulan==11){
                $bulan2 = "November";
            }else if ($bulan==12){
                $bulan2 = "Desember";
            }
            $counter_jasa = TransaksiJasa::whereMonth('tanggal_booking',$bulan)->whereYear('tanggal_booking',$tahun)->count();
            $counter_homestay = TransaksiHomestay::whereMonth('check_in',$bulan)->whereYear('check_in',$tahun)->count();
            $counter_barang = TransaksiBarang::whereMonth('transaction_date',$bulan)->whereYear('transaction_date',$tahun)->count();
            $temp = array(
                'bulan'=>$bulan2,
                'jasa'=>$counter_jasa,
                'homestay'=>$counter_homestay,
                'barang'=>$counter_barang
            );
            $data [] = $temp;
        }
        // dd($data);
        
        //barchart
        $data_pemanduJasa = array();
        $data_pemanduHomestay = array();
        $data_pemanduBarang = array();
        $pemandu = Pemandu::get();
        foreach ($pemandu as $peman) {
            $counter = TransaksiJasa::where('pemandu_id', $peman->pemandu_id)->count();
            $temp = array(
                'nama'=>$peman->nama_company,
                'nilai'=>$counter,
            );
            $data_pemanduJasa[]=$temp;

            $counter = TransaksiHomestay::where('pemandu_id', $peman->pemandu_id)->count();
            $temp = array(
                'nama'=>$peman->nama_company,
                'nilai'=>$counter,
            );
            $data_pemanduHomestay[]=$temp;

            $counter = TransaksiBarang::where('pemandu_id', $peman->pemandu_id)->count();
            $temp = array(
                'nama'=>$peman->nama_company,
                'nilai'=>$counter,
            );
            $data_pemanduBarang[]=$temp;
        }
        usort($data_pemanduJasa,function($a,$b){
			if($a['nilai'] == $b['nilai']) return 0;
			return ($a['nilai'] > $b['nilai']) ? -1 : 1;
        });
        usort($data_pemanduHomestay,function($a,$b){
			if($a['nilai'] == $b['nilai']) return 0;
			return ($a['nilai'] > $b['nilai']) ? -1 : 1;
        });
        usort($data_pemanduBarang,function($a,$b){
			if($a['nilai'] == $b['nilai']) return 0;
			return ($a['nilai'] > $b['nilai']) ? -1 : 1;
        });
        // dd($data_pemanduJasa);


        $chartjs = app()->chartjs
        ->name('lineChartTest')
        ->type('line')
        ->size(['width' => 400, 'height' => 200])
        ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July'])
        ->datasets([
            [
                "label" => "My First dataset",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [65, 59, 80, 81, 56, 55, 40],
            ],
            [
                "label" => "My Second dataset",
                'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                'borderColor' => "rgba(38, 185, 154, 0.7)",
                "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                "pointHoverBackgroundColor" => "#fff",
                "pointHoverBorderColor" => "rgba(220,220,220,1)",
                'data' => [12, 33, 44, 44, 55, 23, 40],
            ]
        ])
        ->options([]);
        // dd($chartjs);
        return view('home', compact('data','data_pemanduJasa','data_pemanduHomestay','data_pemanduBarang', 'chartjs'));
    }
}
