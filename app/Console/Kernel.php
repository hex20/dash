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
            $getData = json_decode(file_get_contents('//coinmarketcap.northpole.ro/api/v5/DASH.json'), true);
            $items = (array)$getData;
            $priceArray = (array)$items['price'];
            $volumeArray = (array)$items['volume24'];
            $lastPrice = array_pull($priceArray, 'usd');
            $lastTime = array_pull($items, 'timestamp');
            $volume = array_pull($volumeArray, 'usd');
            $price = new Price;
            $price->price = $lastPrice;
            $price->time = $lastTime;
            $price->volume = $volume;
            $price->save();
        })->everyFiveMinutes();
    }
}
