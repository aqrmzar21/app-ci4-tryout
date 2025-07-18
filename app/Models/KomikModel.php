<?php

namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model
{
  // ...
  protected $table = 'komik';
  protected $primaryKey = 'komik_id';
  protected $useTimestamps = true;
  protected $allowedFields = [
    'komik_judul',
    'komik_slug',
    'komik_penulis',
    'komik_penerbit',
    'komik_tahun',
    'komik_genre', // Tambahkan field genre
    'komik_sampul'
  ];

  public function getKomik($slug = false)
  {
    if ($slug == false) {
      return $this->findAll();
    }
    return $this->where(['komik_slug' => $slug])->first();
  }

  // Validation
  protected $validationRules      = [];
  protected $validationMessages   = [];
  protected $skipValidation       = false;
  protected $cleanValidationRules = true;
}
