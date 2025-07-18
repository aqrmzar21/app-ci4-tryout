<?php

namespace App\Controllers;

use \App\Models\KomikModel;

class Komik extends BaseController
{
  protected $komikModel;
  public function __construct()
  {
    $this->komikModel = new KomikModel();
  }

  public function index()
  {
    // $komiks = $this->komikModel->findAll();
    $data = [
      'title' => 'Weebton | TT',
      // 'komik' => $komiks, tidak terpakai karena menggunal metode KomikModel
      'komik' => $this->komikModel->getKomik(),
    ];
    return view('komik/index.php', $data);
  }


  public function comic()
  {
    // $komiks = $this->komikModel->findAll();
    $data = [
      'title' => 'Layanan | TT',
      // 'komik' => $komiks, tidak terpakai karena menggunal metode KomikModel
      'komik' => $this->komikModel->getKomik(),
    ];
    return view('pages/contact.php', $data);
  }


  public function detail($slug)
  {
    // echo $slug;
    // $komik = $this->komikModel->where(['komik_slug' => $slug])->first();
    // dd($komik);
    $data = [
      'title' => 'Layanan | TT',
      'komik' => $this->komikModel->getKomik($slug),
    ];

    // jika komik tidak ada di database
    if (empty($data['komik'])) {
      // throw new \CodeIgniter\Exceptions\PageNotFoundException("Komik tidak ditemukan");
      throw new \CodeIgniter\Exceptions\PageNotFoundException("Komik " . $slug . " tidak ditemukan");
    }
    return view('komik/detail.php', $data);
  }

  public function create()
  {
    $validation = \Config\Services::validation();
    $data = [
      'title' => 'Tambah Data | TT',
      'validation' => $validation
    ];
    return view('komik/create.php', $data);
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Ubah Data | TT',
      'validation' => \Config\Services::validation(),
      'komik' => $this->komikModel->getKomik($slug)

    ];
    return view('komik/edit.php', $data);
  }

  public function save()
  {
    // validasi input tidak boleh kosong dan sama dengan data di database
    if (!$this->validate([
      'komik_judul' => 'required|is_unique[komik.komik_judul]',
      'komik_genre' => 'required', // Pastikan setidaknya satu checkbox dipilih
      'komik_sampul' => [
        // 'rules' => 'uploaded[komik_sampul]|mime_in[komik_sampul,image/jpg,image/jpeg,image/png]|max_size[komik_sampul,2048]',  ( boleh kosong )
        'rules' => 'mime_in[komik_sampul,image/jpg,image/jpeg,image/png]|max_size[komik_sampul,2048]',
        'errors' => [
          // 'uploaded' => 'File cover harus diunggah.', (tidak boleh kosong gambar)
          'mime_in' => 'Format file harus JPG, JPEG, atau PNG.',
          'max_size' => 'Ukuran file maksimal 2MB.',
          'is_image' => 'Format file tidak mendukung'
        ]
      ]

    ])) {
      // validasi agar eror dapat di tampilkan
      // $validation = \Config\Services::validation();
      // dd($validation = \Config\Services::validation());
      // return redirect()/->to('/komik/create');

      // $data['validation'] = $validation;
      // return view('/pages/contact', $data);      

      // ataau bisa juga langsung 
      // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
      return redirect()->to('/komik/create')->withInput();
    }

    // $this->request->getVar();
    // dd($this->request->getPost());

    // amnil gambar untuk quiry builder 
    $fileSampul = $this->request->getFile('komik_sampul');
    // cek apa gambar di ubah
    if ($fileSampul->getError() == 4) {
      $namaSampul = 'default.jpg';
    } else {
      // ambil nama file random
      $namaSampul = $fileSampul->getRandomName();
      // pindahkan file ke img
      $fileSampul->move('img', $namaSampul);
    }

    // membuat slug dari judul
    $slug = url_title($this->request->getPost('komik_judul'), '-', true);
    // $slug = url_title($this->request->getVar('komik_judul'), '-', true);

    // Ambil data genre yang dipilih (array)
    $selectedGenres = $this->request->getPost('genre');
    // Gabungkan array genre menjadi string, dipisahkan dengan koma
    $namaGenre = implode(' | ', $selectedGenres);
    $this->komikModel->save(
      [
        'komik_judul' => $this->request->getPost('komik_judul'),
        'komik_slug' => $slug,
        'komik_penulis' => $this->request->getPost('komik_penulis'),
        'komik_penerbit' => $this->request->getPost('komik_penerbit'),
        'komik_tahun' => $this->request->getPost('komik_tahun'),
        // 'komik_sampul' => $this->request->getPost('komik_sampul')
        'komik_genre' => $namaGenre,
        'komik_sampul' => $namaSampul
      ]
    );

    // buat flash data jika berhasil ditambahkan
    session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
    return redirect()->to('/komik');
  }

  // update data
  public function update($id)
  {
    // Ambil data komik lama berdasarkan ID
    $komikLama = $this->komikModel->find($id);
    if (!$komikLama) {
      session()->setFlashdata('error', 'Data komik tidak ditemukan.');
      return redirect()->back()->withInput();
    }

    // Validasi data input
    $ruleJudul = 'required';
    $komikJudulBaru = $this->request->getVar('komik_judul');

    // Jika judul berubah, tambahkan validasi 'is_unique'
    if ($komikLama['komik_judul'] !== $komikJudulBaru) {
      $ruleJudul = 'required|is_unique[komik.komik_judul]';
    }

    if (!$this->validate([
      'komik_judul' => $ruleJudul,
      'komik_penulis' => 'required',
      'komik_penerbit' => 'required',
      'komik_tahun' => 'required|numeric',
      'komik_genre' => 'required', // Pastikan setidaknya satu checkbox dipilih
      'komik_sampul' => [
        'rules' => 'mime_in[komik_sampul,image/jpg,image/jpeg,image/png,image/webp]|max_size[komik_sampul,2048]',
        'errors' => [
          'mime_in' => 'Format file harus JPG, JPEG, atau PNG.',
          'max_size' => 'Ukuran file maksimal 2MB.',
          'is_image' => 'Format file tidak mendukung'
        ]
      ]
    ])) {
      return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    // kelola file gambar 
    $fileSampul = $this->request->getFile('komik_sampul');

    // cek apakah gambar tidak di ubah
    if ($fileSampul->getError() === 4) {
      $namaSampul = $this->request->getVar('sampulLama');
    } else {
      // ubah nama file
      $namaSampul = $fileSampul->getRandomName();
      // pindahkan file ke folder gambar
      $fileSampul->move('img', $namaSampul);
      // hapus file lama
      unlink('img/' . $this->request->getVar('sampulLama'));
    }

    // Ambil data genre yang dipilih (array)
    $selectedGenres = $this->request->getPost('genre');
    // Gabungkan array genre menjadi string, dipisahkan dengan koma
    $namaGenre = implode(' | ', $selectedGenres);

    // Perbarui data komik
    $newSlug = url_title($komikJudulBaru, '-', true);
    $this->komikModel->save([
      'komik_id' => $id, // Gunakan ID dari parameter
      'komik_judul' => $komikJudulBaru,
      'komik_slug' => $newSlug,
      'komik_penulis' => $this->request->getVar('komik_penulis'),
      'komik_penerbit' => $this->request->getVar('komik_penerbit'),
      'komik_tahun' => $this->request->getVar('komik_tahun'),
      'komik_genre' => $namaGenre,
      'komik_sampul' => $namaSampul
    ]);

    // Berikan pesan sukses
    session()->setFlashdata('pesan', 'Data berhasil diubah');
    return redirect()->to('/komik');
  }


  // hapus data 
  public function delete($id)
  {
    // cari gambar berdasarkann id
    $komik = $this->komikModel->find($id);
    // cek jika gambar default
    if ($komik['komik_sampul'] != 'default.jpg') {
      // hapus gambar
      unlink('img/' . $komik['komik_sampul']);
    }

    $this->komikModel->delete($id);
    session()->setFlashdata('pesan', 'Data berhasil dihapus');
    return redirect()->to('/komik');
  }
}
