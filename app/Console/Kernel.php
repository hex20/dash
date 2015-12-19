<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Price;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $getData = json_decode(file_get_contents('http://pubapi.cryptsy.com/api.php?method=singlemarketdata&marketid=213'), true);
            $items = (array) $getData['return'];
            $next = (array) $items['markets'];
            $nextNext = (array) $next['DRK'];
            $lastPrice = array_pull($nextNext, 'lasttradeprice');
            $lastTime = array_pull($nextNext, 'lasttradetime');
            $volume = array_pull($nextNext, 'volume');
            $price = new Price;
            $price->price = $lastPrice;
            $price->time = $lastTime;
            $price->volume = $volume;
            $price->save();
        })->everyFiveMinutes();
    }
}
