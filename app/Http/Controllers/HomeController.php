<?php

namespace App\Http\Controllers;


use App\Price;
use DB;


class HomeController extends Controller {

    public function index() {
        $data = DB::table('price')->offset(45)->get(30);
        dd($data);
        return view('index');
    }

}