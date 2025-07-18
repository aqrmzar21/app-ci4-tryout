<?php

namespace App\Controllers;

use App\Models\KategoriData;

class Pages extends BaseController
{

  protected $plgGtlo;
  protected $vaGtlo;
  protected $kwhGtlo;
  public function __construct()
  {
    $this->plgGtlo = new KategoriData();
    $this->vaGtlo = new KategoriData();
    $this->kwhGtlo = new KategoriData();
  }

  public function index()
  {
    $data = [
      'judul' => 'Home | SIMPLEN'
    ];
    return view('beranda', $data);
  }
  public function dataplg()
  {
    // $plg = $this->plgGtlo->findAll();
    // Menggunakan join untuk menggabungkan tabel-tabel yang terkait
    $plg = $this->plgGtlo
      ->join('klasifikasi', 'kategori.klasifikasi_id = klasifikasi.klasifikasi_id')
      ->join('jenis', 'klasifikasi.data_id = jenis.data_id')
      ->join('cabang', 'jenis.cabang_id = cabang.cabang_id')
      ->where('jenis.data_id', '1')
      ->findAll();

    $data = [
      'judul' => 'Data Jumlah Pelanggan | SIMPLEN',
      'plgUP3' => $plg
    ];

    // INI SECARA MANUAL
    // $db = \Config\Database::connect();
    // $kt = $db->query("SELECT * FROM kategori");
    // foreach ($kt->getResultArray() as $row) {
    //   d($row);
    // }
    // dd($kt);

    // INI SECARA MODELS
    // $plg = new KategoriData();
    // $plgGtlo = $plg->findAll();

    return view('pages/_plg', $data);
  }
  public function datava()
  {
    // $va = $this->vaGtlo->findAll();
    $va = $this->vaGtlo
      ->join('klasifikasi', 'kategori.klasifikasi_id = klasifikasi.klasifikasi_id')
      ->join('jenis', 'klasifikasi.data_id = jenis.data_id')
      ->join('cabang', 'jenis.cabang_id = cabang.cabang_id')
      // ->where('jenis.nama_data', 'Data VA')
      ->where('jenis.data_id', '2')
      ->findAll();

    $data = [
      'judul' => 'Data Daya Terpasang | SIMPLEN',
      'vaUP3' => $va
    ];
    return view('pages/_va', $data);
  }
  public function datakwh()
  {
    $kwh = $this->kwhGtlo
      ->join('klasifikasi', 'kategori.klasifikasi_id = klasifikasi.klasifikasi_id')
      ->join('jenis', 'klasifikasi.data_id = jenis.data_id')
      ->join('cabang', 'jenis.cabang_id = cabang.cabang_id')
      ->where('jenis.data_id', '3')
      ->findAll();
    $data = [
      'judul' => 'Data Penjualan Listrik | SIMPLEN',
      'kwhUP3' => $kwh,
    ];
    return view('pages/_kwh', $data);
  }
}
