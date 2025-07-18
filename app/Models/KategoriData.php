<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriData extends Model
{
  protected $table      = 'kategori';
  protected $primaryKey = 'kategori_id';

  // protected $useAutoIncrement = true;

  // protected $returnType     = 'array';
  // protected $useSoftDeletes = true;

  protected $allowedFields = ['bulan', 'klasifikasi_id', 'tarif_s', 'tarif_r', 'tarif_b', 'tarif_i', 'tarif_p', 'tarif_total'];

  // // Dates
  // protected $useTimestamps = true;
  // protected $dateFormat    = 'datetime';
  // protected $createdField  = 'created_at';
  // protected $updatedField  = 'updated_at';
  // protected $deletedField  = 'deleted_at';

  // // Validation
  // protected $validationRules      = [];
  // protected $validationMessages   = [];
  // protected $skipValidation       = false;
  // protected $cleanValidationRules = true;

  // // Callbacks
  // protected $allowCallbacks = true;
  // protected $beforeInsert   = [];
  // protected $afterInsert    = [];
  // protected $beforeUpdate   = [];
  // protected $afterUpdate    = [];
  // protected $beforeFind     = [];
  // protected $afterFind      = [];
  // protected $beforeDelete   = [];
  // protected $afterDelete    = [];
}
