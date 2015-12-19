<?php

namespace App\Http\Controllers;


use App\Price;


class HomeController extends Controller {

    public function index() {
 /*       $getData = json_decode(file_get_contents('http://pubapi.cryptsy.com/api.php?method=singlemarketdata&marketid=213'), true);
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
        $price->save();*/
        return view('index');
    }

}