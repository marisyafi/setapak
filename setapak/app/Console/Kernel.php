<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\TransaksiJasa;
use App\TransaksiHomestay;
use App\TransaksiBarang;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        $schedule->call(function () {
            $jasas = TransaksiJasa::where('transaction_status', 0)->get();
            $homestays = TransaksiHomestay::where('transaction_status', 0)->get();
            $barangs = TransaksiBarang::where('transaction_status', 0)->get();

            foreach ($jasas as $key => $jasa) {
                $batasWaktu = new Carbon($jasa->transaction_date);
                $batasWaktu = $batasWaktu->addHours(24);

                $waktuSekarang = Carbon::now();

                if ($waktuSekarang->gte($batasWaktu)) {
                    $jasaTarget = TransaksiJasa::find($jasa->transaction_id);
                    $jasaTarget->transaction_status = 9;
                    $jasaTarget->save();
                }
            }

            foreach ($homestays as $key => $home) {
                $batasWaktuHome = new Carbon($home->transaction_date);
                $batasWaktuHome = $batasWaktuHome->addHours(24);

                $waktuSekarangHome = Carbon::now();

                if ($waktuSekarangHome->gte($batasWaktuHome)) {
                    $homestayTarget = TransaksiHomestay::find($home->transaction_id);
                    $homestayTarget->transaction_status = 9;
                    $homestayTarget->save();
                }
            }

            foreach ($barangs as $key => $barang) {
                $batasWaktuBarang = new Carbon($barang->transaction_date);
                $batasWaktuBarang = $batasWaktuHome->addHours(24);

                $waktuSekarangBarang = Carbon::now();

                if ($waktuSekarangBarang->gte($batasWaktuHome)) {
                    $barangTarget = TransaksiBarang::find($barang->transaction_id);
                    $barangTarget->transaction_status = 9;
                    $barangTarget->save();
                }
            }

        })->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
