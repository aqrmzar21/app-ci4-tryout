<?php

namespace App\Controllers;

use App\Models\KategoriData;

class UP3 extends BaseController
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
    return view('index');
  }
  public function dataplg()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $selectedMonth = $this->request->getVar('selectedMonth');
      $selectedMonth = date('m', strtotime($selectedMonth));
    } else {
      $selectedMonth = date('m');
    }

    $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $namaBulan = $bulan[(int)$selectedMonth];

    $yearf = $this->request->getVar('tahun') ?? date('Y');

    $plg = $this->plgGtlo
      ->join('klasifikasi', 'kategori.klasifikasi_id = klasifikasi.klasifikasi_id')
      ->join('jenis', 'klasifikasi.data_id = jenis.data_id')
      ->join('cabang', 'jenis.cabang_id = cabang.cabang_id')
      ->where('jenis.data_id', '1')
      ->where('YEAR(kategori.bulan)', $yearf)
      ->orderBy('kategori_id')
      ->findAll();

    $plgUP = $this->plgGtlo
      ->select('bulan, klasifikasi_id, SUM(tarif_s) as tarif_s, SUM(tarif_r) as tarif_r, SUM(tarif_b) as tarif_b, SUM(tarif_i) as tarif_i, SUM(tarif_p) as tarif_p')
      ->where('MONTH(kategori.bulan)', $selectedMonth)
      ->whereIN('klasifikasi_id', ['1', '2'])
      ->where('YEAR(kategori.bulan)', $yearf)
      ->groupBy(['bulan', 'klasifikasi_id'])
      ->orderBy('bulan', 'DESC')
      ->limit(2)
      ->find();

    // Hitung total untuk masing-masing tarif
    $total_s = 0;
    $total_r = 0;
    $total_b = 0;
    $total_i = 0;
    $total_p = 0;


    // Jumlahkan total untuk masing-masing tarif
    foreach ($plgUP as $row) {
      $row['bulan'] = $selectedMonth;
      $total_s += $row['tarif_s'];
      $total_r += $row['tarif_r'];
      $total_b += $row['tarif_b'];
      $total_i += $row['tarif_i'];
      $total_p += $row['tarif_p'];
    }

    // d($plg);
    // d($plgUP);
    // dd($total_s);

    $data = [
      'yearFilter' => $yearf,
      'uniqueYears' => $this->getUniqueYears($yearf),
      'selectedMonth' => $selectedMonth,
      'uniqueMonths' => $this->getUniqueMonths($yearf),
      'namaBulan' => $namaBulan,
      'total_s' => $total_s,
      'total_r' => $total_r,
      'total_b' => $total_b,
      'total_i' => $total_i,
      'total_p' => $total_p,
      'judul' => 'Data Jumlah Pelanggan | SIMPLEN',
      'plgUP3' => $plg
    ];

    // jika tidak adadi tabel 
    if (empty($data['plgUP3'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
    }

    return view('up3/dataplg', $data);
  }
  public function tambahplg()
  {
    $plg = $this->plgGtlo
      ->join('klasifikasi', 'kategori.klasifikasi_id = klasifikasi.klasifikasi_id')
      ->join('jenis', 'klasifikasi.data_id = jenis.data_id')
      ->join('cabang', 'jenis.cabang_id = cabang.cabang_id')
      ->where('jenis.data_id', '1')
      ->findAll();
    $data = [
      'judul' => 'Tambah Data Baru | UP3',
      'plgUP3' => $plg
    ];
    // dd($data);
    return view('up3/tambahplg', $data);
  }

  public function saveplg()
  {
    // validasi input 
    // if (!$this->validate([
    //   'bulan' => 'required[kategori.bulan]',
    //   'klasifikasi_id' => 'numeric|required[kategori.klasfikasi.id]'
    // ])) {
    // $validation = \Config\Services::validation();
    //   return redirect()->to('up3/tambahplg')->withInput()->with('validation', $validation);
    // }

    // $this->request->getVar()
    // dd($this->request->getVar());

    $bulan = $this->request->getVar('bulan');
    $bulan_db = date('Y-m-d', strtotime($bulan));
    $total_plgUP3 = $this->request->getVar('tarif_s') + $this->request->getVar('tarif_r') + $this->request->getVar('tarif_b') + $this->request->getVar('tarif_i') + $this->request->getVar('tarif_p');

    $klasifikasi_id = $this->request->getVar('klasifikasi_id');
    // Cek apakah data dengan klasifikasi dan bulan yang sama sudah ada
    $data_exist = $this->plgGtlo->where('bulan', $bulan_db)->where('klasifikasi_id', $klasifikasi_id)->first();

    if ($data_exist) {
      session()->setFlashdata('pesan', 'Data dengan klasifikasi dan bulan yang sama sudah ada');
      return redirect()->to('up3/tambahplg');
    }

    $this->plgGtlo->save(
      [
        'bulan' => $bulan_db,
        'klasifikasi_id' => $this->request->getVar('klasifikasi_id'),
        'tarif_s' => $this->request->getVar('tarif_s'),
        'tarif_r' => $this->request->getVar('tarif_r'),
        'tarif_b' => $this->request->getVar('tarif_b'),
        'tarif_i' => $this->request->getVar('tarif_i'),
        'tarif_p' => $this->request->getVar('tarif_p'),
        'tarif_total' => $total_plgUP3
      ]
    );

    session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');
    return redirect()->to('up3/dataplg');
  }

  public function delete($id)
  {
    $this->plgGtlo->delete($id);
    session()->setFlashdata('pesan', 'Data Berhasil di hapus');

    return redirect()->to('up3/dataplg');
  }

  public function editplg($id)
  {
    $plg = $this->plgGtlo
      ->join('klasifikasi', 'kategori.klasifikasi_id = klasifikasi.klasifikasi_id')
      ->join('jenis', 'klasifikasi.data_id = jenis.data_id')
      ->join('cabang', 'jenis.cabang_id = cabang.cabang_id')
      ->where('kategori.kategori_id', $id)
      ->findAll();
    $data = [
      'judul' => 'Edit Data Jumlah Pelanggan | UP3',
      'plgUP3' => $plg
    ];
    return view('up3/editplg', $data);
  }

  public function updateplg($id)
  {

    $bulan = $this->request->getVar('bulan');
    $bulan_db = date('Y-m-d', strtotime($bulan));
    $total_plgUP3 = $this->request->getVar('tarif_s') + $this->request->getVar('tarif_r') + $this->request->getVar('tarif_b') + $this->request->getVar('tarif_i') + $this->request->getVar('tarif_p');


    $this->plgGtlo->save(
      [
        'kategori_id' => $id,
        'bulan' => $bulan_db,
        'klasifikasi_id' => $this->request->getVar('klasifikasi_id'),
        'tarif_s' => $this->request->getVar('tarif_s'),
        'tarif_r' => $this->request->getVar('tarif_r'),
        'tarif_b' => $this->request->getVar('tarif_b'),
        'tarif_i' => $this->request->getVar('tarif_i'),
        'tarif_p' => $this->request->getVar('tarif_p'),
        'tarif_total' => $total_plgUP3
      ]
    );

    session()->setFlashdata('pesan', 'Perubahan berhasil disimpan');
    return redirect()->to('up3/dataplg');
  }


  // ===========================================================================================================================
  // - DATA VA
  // ===============================
  public function datava()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $selectedMonth = $this->request->getVar('selectedMonth');
      $selectedMonth = date('m', strtotime($selectedMonth));
    } else {
      $selectedMonth = date('m');
    }

    $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $namaBulan = $bulan[(int)$selectedMonth];
    $yearf = $this->request->getVar('tahun') ?? date('Y');

    $va = $this->vaGtlo
      ->join('klasifikasi', 'kategori.klasifikasi_id = klasifikasi.klasifikasi_id')
      ->join('jenis', 'klasifikasi.data_id = jenis.data_id')
      ->join('cabang', 'jenis.cabang_id = cabang.cabang_id')
      ->where('jenis.data_id', '2')
      ->where('YEAR(kategori.bulan)', $yearf)
      ->orderBy('bulan')
      ->findAll();


    $vaFilter = $this->vaGtlo
      ->select('bulan, klasifikasi_id, SUM(tarif_s) as tarif_s, SUM(tarif_r) as tarif_r, SUM(tarif_b) as tarif_b, SUM(tarif_i) as tarif_i, SUM(tarif_p) as tarif_p')
      ->where('MONTH(kategori.bulan)', $selectedMonth)
      ->whereIn('klasifikasi_id', ['3', '4']) // Menyaring berdasarkan klasifikasi_id 1 dan 2
      ->where('YEAR(kategori.bulan)', $yearf)
      ->groupBy(['bulan', 'klasifikasi_id'])
      ->orderBy('bulan', 'DESC')
      ->limit(2)
      ->find();
    // Hitung total untuk masing-masing tarif
    $total_s = 0;
    $total_r = 0;
    $total_b = 0;
    $total_i = 0;
    $total_p = 0;

    // Jumlahkan total untuk masing-masing tarif
    foreach ($vaFilter as $row) {
      $total_s += $row['tarif_s'];
      $total_r += $row['tarif_r'];
      $total_b += $row['tarif_b'];
      $total_i += $row['tarif_i'];
      $total_p += $row['tarif_p'];
    }

    $vaTotal = $this->vaGtlo
      ->select('klasifikasi_id, bulan,
            SUM(tarif_s) AS total_va_s,
            SUM(tarif_r) AS total_va_r,
            SUM(tarif_b) AS total_va_b,
            SUM(tarif_i) AS total_va_i,
            SUM(tarif_p) AS total_va_p')
      ->where('YEAR(bulan)', $yearf)
      ->whereIn('klasifikasi_id', ['3', '4'])
      ->groupBy('bulan, klasifikasi_id')
      ->findAll();

    // d($vaTotal);

    $data = [
      'yearFilter' => $yearf,
      'uniqueYears' => $this->getUniqueYears($yearf),
      'selectedMonth' => $selectedMonth,
      'uniqueMonths' => $this->getUniqueMonths($yearf),
      'namaBulan' => $namaBulan,
      'total_s' => $total_s,
      'total_r' => $total_r,
      'total_b' => $total_b,
      'total_i' => $total_i,
      'total_p' => $total_p,
      'judul' => 'Data Daya Terpasang | SIMPLEN',
      'vaUP3' => $va
    ];
    return view('up3/datava', $data);
  }

  public function getUniqueYears($yearFilter)
  {
    // Gantilah sesuai dengan model dan database Anda
    $resultFilter = $this->vaGtlo->query("SELECT * FROM kategori WHERE klasifikasi_id IN ('3', '4') ORDER BY bulan DESC");

    $uniqueYears = [];

    foreach ($resultFilter->getResult('array') as $row) {
      $tahun = date('Y', strtotime($row['bulan']));

      if (!in_array($tahun, $uniqueYears)) {
        $uniqueYears[] = $tahun;
      }
    }

    return $uniqueYears;
  }
  public function getUniqueMonths($selectedMonth)
  {
    // Gantilah sesuai dengan model dan database Anda
    $resultFilter = $this->vaGtlo->query("SELECT DISTINCT bulan FROM kategori WHERE YEAR(bulan) = '$selectedMonth' AND klasifikasi_id IN ('1', '2') ORDER BY bulan DESC");

    $uniqueMonths = [];

    foreach ($resultFilter->getResult('array') as $row) {
      $bulan = date('F Y', strtotime($row['bulan']));
      $uniqueMonths[$row['bulan']] = $bulan;
    }

    return $uniqueMonths;
  }

  public function tambahva()
  {
    $va = $this->vaGtlo
      ->join('klasifikasi', 'kategori.klasifikasi_id = klasifikasi.klasifikasi_id')
      ->join('jenis', 'klasifikasi.data_id = jenis.data_id')
      ->join('cabang', 'jenis.cabang_id = cabang.cabang_id')
      ->where('jenis.data_id', '2')
      ->findAll();
    $data = [
      'judul' => 'Tambah Data Baru | UP3',
      'vaUP3' => $va
    ];
    return view('up3/tambahva', $data);
  }

  public function saveva()
  {
    $bulan = $this->request->getVar('bulan');
    $bulan_db = date('Y-m-d', strtotime($bulan));
    $total_vaUP3 = $this->request->getVar('tarif_s') + $this->request->getVar('tarif_r') + $this->request->getVar('tarif_b') + $this->request->getVar('tarif_i') + $this->request->getVar('tarif_p');

    $klasifikasi_id = $this->request->getVar('klasifikasi_id');
    // Cek apakah data dengan klasifikasi dan bulan yang sama sudah ada
    $data_exist = $this->vaGtlo->where('bulan', $bulan_db)->where('klasifikasi_id', $klasifikasi_id)->first();

    if ($data_exist) {
      session()->setFlashdata('pesan', 'Data dengan klasifikasi dan bulan yang sama sudah ada');
      return redirect()->to('up3/tambahva');
    }

    $this->vaGtlo->save(
      [
        'bulan' => $bulan_db,
        'klasifikasi_id' => $this->request->getVar('klasifikasi_id'),
        'tarif_s' => $this->request->getVar('tarif_s'),
        'tarif_r' => $this->request->getVar('tarif_r'),
        'tarif_b' => $this->request->getVar('tarif_b'),
        'tarif_i' => $this->request->getVar('tarif_i'),
        'tarif_p' => $this->request->getVar('tarif_p'),
        'tarif_total' => $total_vaUP3
      ]
    );

    session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');
    return redirect()->to('up3/datava');
  }

  public function editva($id)
  {
    $va = $this->vaGtlo
      ->join('klasifikasi', 'kategori.klasifikasi_id = klasifikasi.klasifikasi_id')
      ->join('jenis', 'klasifikasi.data_id = jenis.data_id')
      ->join('cabang', 'jenis.cabang_id = cabang.cabang_id')
      ->where('kategori.kategori_id', $id)
      ->findAll();
    $data = [
      'judul' => 'Edit Data VA | UP3',
      'vaUP3' => $va
    ];
    return view('up3/editva', $data);
  }

  public function updateva($id)
  {

    $bulan = $this->request->getVar('bulan');
    $bulan_db = date('Y-m-d', strtotime($bulan));
    $total_vaUP3 = $this->request->getVar('tarif_s') + $this->request->getVar('tarif_r') + $this->request->getVar('tarif_b') + $this->request->getVar('tarif_i') + $this->request->getVar('tarif_p');


    $this->vaGtlo->save(
      [
        'kategori_id' => $id,
        'bulan' => $bulan_db,
        'klasifikasi_id' => $this->request->getVar('klasifikasi_id'),
        'tarif_s' => $this->request->getVar('tarif_s'),
        'tarif_r' => $this->request->getVar('tarif_r'),
        'tarif_b' => $this->request->getVar('tarif_b'),
        'tarif_i' => $this->request->getVar('tarif_i'),
        'tarif_p' => $this->request->getVar('tarif_p'),
        'tarif_total' => $total_vaUP3
      ]
    );

    session()->setFlashdata('pesan', 'Perubahan berhasil disimpan');
    return redirect()->to('up3/datava');
  }

  public function deleteva($id)
  {
    $this->plgGtlo->delete($id);
    session()->setFlashdata('pesan', 'Data Berhasil di hapus');

    return redirect()->to('up3/datava');
  }

  // ============================================================================================================
  // - DATA KWH
  // ============
  public function datakwh()
  {
    $yearf = $this->request->getVar('tahun') ?? date('Y');
    // $selectedMonth = $this->request->getVar('bulan') ?? date('m');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $selectedMonth = $this->request->getVar('selectedMonth');
      $selectedMonth = date('m', strtotime($selectedMonth));
    } else {
      $selectedMonth = date('m');
    }

    $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $namaBulan = $bulan[(int)$selectedMonth];

    $kwh = $this->kwhGtlo
      ->join('klasifikasi', 'kategori.klasifikasi_id = klasifikasi.klasifikasi_id')
      ->join('jenis', 'klasifikasi.data_id = jenis.data_id')
      ->join('cabang', 'jenis.cabang_id = cabang.cabang_id')
      ->where('jenis.data_id', '3')
      ->where('YEAR(kategori.bulan)', $yearf)
      ->orderBy('bulan')
      ->findAll();

    $query2 = $this->kwhGtlo
      ->select('bulan, klasifikasi_id, SUM(tarif_s) as total_tarif_s, SUM(tarif_r) as total_tarif_r, SUM(tarif_b) as total_tarif_b, SUM(tarif_i) as total_tarif_i, SUM(tarif_p) as total_tarif_p')
      ->whereIn('klasifikasi_id', ['5', '6']) // Menyaring berdasarkan klasifikasi_id 1 dan 2
      // ->where('YEAR(kategori.bulan)', $yearf)
      ->groupBy(['bulan', 'klasifikasi_id'])
      // ->limit(2)
      ->find();

    $query = $this->kwhGtlo
      ->select('bulan, klasifikasi_id, SUM(tarif_s) as total_tarif_s, SUM(tarif_r) as total_tarif_r, SUM(tarif_b) as total_tarif_b, SUM(tarif_i) as total_tarif_i, SUM(tarif_p) as total_tarif_p')
      ->where('MONTH(kategori.bulan)', $selectedMonth)
      ->whereIn('klasifikasi_id', ['5', '6']) // Menyaring berdasarkan klasifikasi_id 1 dan 2
      ->where('YEAR(kategori.bulan)', $yearf)
      ->groupBy(['bulan', 'klasifikasi_id'])
      ->orderBy('bulan', 'DESC')
      ->limit(2)
      ->find();

    // return $query->getResult();
    // Hitung total untuk masing-masing tarif
    $total_s = 0;
    $total_r = 0;
    $total_b = 0;
    $total_i = 0;
    $total_p = 0;

    // Jumlahkan total untuk masing-masing tarif
    foreach ($query as $row) {
      $total_s += $row['total_tarif_s'];
      $total_r += $row['total_tarif_r'];
      $total_b += $row['total_tarif_b'];
      $total_i += $row['total_tarif_i'];
      $total_p += $row['total_tarif_p'];
    }

    // d($query1); // d($query2); // d($query); // d($total_s);
    // dd($row);

    $data = [
      'yearFilter' => $yearf,
      'uniqueYears' => $this->getUniqueYears($yearf),
      'selectedMonth' => $selectedMonth,
      'uniqueMonths' => $this->getUniqueMonths($yearf),
      'listKategori' => $query2,
      'namaBulan' => $namaBulan,
      'total_s' => $total_s,
      'total_r' => $total_r,
      'total_b' => $total_b,
      'total_i' => $total_i,
      'total_p' => $total_p,
      'judul' => 'Data Penjualan Listrik | SIMPLEN',
      'kwhUP3' => $kwh
    ];
    return view('up3/datakwh', $data);
  }

  public function tambahkwh()
  {
    $kwh = $this->kwhGtlo
      ->join('klasifikasi', 'kategori.klasifikasi_id = klasifikasi.klasifikasi_id')
      ->join('jenis', 'klasifikasi.data_id = jenis.data_id')
      ->join('cabang', 'jenis.cabang_id = cabang.cabang_id')
      ->where('jenis.data_id', '3')
      ->findAll();
    $data = [
      'judul' => 'Tambah Data Baru | UP3',
      'kwhUP3' => $kwh
    ];
    // dd($data);
    return view('up3/tambahkwh', $data);
  }

  public function savekwh()
  {
    $bulan = $this->request->getVar('bulan');
    $bulan_db = date('Y-m-d', strtotime($bulan));
    $total_kwhUP3 = $this->request->getVar('tarif_s') + $this->request->getVar('tarif_r') + $this->request->getVar('tarif_b') + $this->request->getVar('tarif_i') + $this->request->getVar('tarif_p');

    $klasifikasi_id = $this->request->getVar('klasifikasi_id');
    // Cek apakah data dengan klasifikasi dan bulan yang sama sudah ada
    $data_exist = $this->kwhGtlo->where('bulan', $bulan_db)->where('klasifikasi_id', $klasifikasi_id)->first();

    if ($data_exist) {
      session()->setFlashdata('pesan', 'Data dengan klasifikasi dan bulan yang sama sudah ada');
      return redirect()->to('up3/tambahkwh');
    }

    $this->kwhGtlo->save(
      [
        'bulan' => $bulan_db,
        'klasifikasi_id' => $this->request->getVar('klasifikasi_id'),
        'tarif_s' => $this->request->getVar('tarif_s'),
        'tarif_r' => $this->request->getVar('tarif_r'),
        'tarif_b' => $this->request->getVar('tarif_b'),
        'tarif_i' => $this->request->getVar('tarif_i'),
        'tarif_p' => $this->request->getVar('tarif_p'),
        'tarif_total' => $total_kwhUP3
      ]
    );

    session()->setFlashdata('pesan', 'Data Berhasil ditambahkan');
    // session()->setFlashdata('error', 'Data Gagal ditambahkan');
    return redirect()->to('up3/datakwh');
  }

  public function editkwh($id)
  {
    $kwh = $this->kwhGtlo
      ->join('klasifikasi', 'kategori.klasifikasi_id = klasifikasi.klasifikasi_id')
      ->join('jenis', 'klasifikasi.data_id = jenis.data_id')
      ->join('cabang', 'jenis.cabang_id = cabang.cabang_id')
      ->where('kategori.kategori_id', $id)
      ->findAll();
    $data = [
      'judul' => 'Edit Data KWH | UP3',
      'kwhUP3' => $kwh
    ];
    return view('up3/editkwh', $data);
  }

  public function updatekwh($id)
  {

    $bulan = $this->request->getVar('bulan');
    $bulan_db = date('Y-m-d', strtotime($bulan));
    $total_kwhUP3 = $this->request->getVar('tarif_s') + $this->request->getVar('tarif_r') + $this->request->getVar('tarif_b') + $this->request->getVar('tarif_i') + $this->request->getVar('tarif_p');


    $this->kwhGtlo->save(
      [
        'kategori_id' => $id,
        'bulan' => $bulan_db,
        'klasifikasi_id' => $this->request->getVar('klasifikasi_id'),
        'tarif_s' => $this->request->getVar('tarif_s'),
        'tarif_r' => $this->request->getVar('tarif_r'),
        'tarif_b' => $this->request->getVar('tarif_b'),
        'tarif_i' => $this->request->getVar('tarif_i'),
        'tarif_p' => $this->request->getVar('tarif_p'),
        'tarif_total' => $total_kwhUP3
      ]
    );

    session()->setFlashdata('pesan', 'Perubahan berhasil disimpan');
    return redirect()->to('up3/datakwh');
  }

  public function deletekwh($id)
  {
    $this->plgGtlo->delete($id);
    session()->setFlashdata('pesan', 'Data Berhasil di hapus');

    return redirect()->to('up3/datakwh');
  }

  // ============
  // - Akhir
  // ==========================

}
