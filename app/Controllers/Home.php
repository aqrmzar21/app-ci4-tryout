<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('beranda');
        // return view('welcome_message');
    }
    public function main()
    {
        // return view('layout/default');
        return view('layout/main');
    }
}
