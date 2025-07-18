<?php

namespace App\Controllers;


class Home extends BaseController
{
    public function index()
    {
        // cara konek database tanpa Model
        // $db = \Config\Database::connect();
        // $komik = $db->query("SELECT * FROM komik");
        // cara pecahin agar bisa di baca isi database nya
        // foreach ($komik->getResultArray() as $row);
        // dd($komik);

        $komikModel = new \App\Models\KomikModel;
        $data = [
            'title' => 'Beranda | TT',
            'komik' => $komikModel->findAll(),
        ];
        return view('pages/home.php', $data);
        // return view('welcome_message');
        // echo "Hello Worlf";

    }
    public function about()
    {
        $data = [
            'title' => 'Tentang | TT',
        ];
        return view('pages/about.php', $data);
    }
    // tidak terpakai lagi
    public function contact()
    {
        $komikModel = new \App\Models\KomikModel;
        $data = [
            'title' => 'Layanan | TT',
            'komik' => $komikModel->findAll(),
        ];
        return view('pages/contact.php', $data);
    }
    // karena sudah pindah controller

}
