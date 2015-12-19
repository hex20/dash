<?php

namespace App\Http\Controllers;


use App\Price;


class HomeController extends Controller {

    public function index() {
        return view('index');
    }

}