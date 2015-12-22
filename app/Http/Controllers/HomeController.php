<?php

namespace App\Http\Controllers;

use Input;
use App\Price;
use DB;


class HomeController extends Controller {

    public function index() {


        /*        $test = Price::where('id' < 48)->get();
                dd($test);*/
        //$data = DB::table('price')->where('created_at', '<', '2015-12-19 10:55:01')->get(288);
        //$data = DB::table('price')->orderBy('id', 'desc')->take(288)->get();
        //dd($data);
        return view('index');
    }

    public function getData()
    {
        $data = Input::get('time');
        $data_exploded = explode(' ', $data);
        $day = array_pull($data_exploded, '2');
        $year = array_pull($data_exploded, '3');
        $month = array_pull($data_exploded, '1');
        switch ($month) {
            case 'Jan':
                $month = 1;
                break;

            case 'Feb':
                $month = 2;
                break;

            case 'Mar':
                $month = 3;
                break;

            case 'Apr':
                $month = 4;
                break;

            case 'May':
                $month = 5;
                break;

            case 'Jun':
                $month = 6;
                break;

            case 'Jul':
                $month = 7;
                break;

            case 'Aug':
                $month = 8;
                break;

            case 'Sep':
                $month = 9;
                break;

            case 'Oct':
                $month = 10;
                break;

            case 'Nov':
                $month = 11;
                break;

            case 'Dec':
                $month = 12;
                break;

            default:
                abort(404);
        }
        $hour = array_pull($data_exploded, '4');
        $time = "$year-$month-$day $hour";
        dd($time);

    }

}

//2015-12-22 00:24:19"
//2015-12-19 23:50:01
//2015-Dec-22 00:22:22
//"Mon Dec 21 2015 23:50:16 GMT+1300 (NZDT)"