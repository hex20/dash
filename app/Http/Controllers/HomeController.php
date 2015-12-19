<?php

namespace App\Http\Controllers;


use App\Price;
use DB;


class HomeController extends Controller {

    public function index() {
        $data = DB::table('price')->orderBy('created_at', 'asc')->get();
        dd($data);
        return view('index');
    }

}