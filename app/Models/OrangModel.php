<?php

namespace App\Models;

use CodeIgniter\Model;

class OrangModel extends Model
{
  // ...
  protected $table = 'orang';
  // protected $primaryKey = 'id';
  protected $useTimestamps = true;
  protected $allowedFields = ['nama', 'alamat'];

  // pencarian
  public function search($keyword)
  {
    // cara manual
    // $builder = $this->table('orang');
    // $builder->like('nama', $keyword);
    // $builder->orLike('alamat', $keyword);
    // return $builder;

    // cara query bulder (lebih ringkas) 
    // return $this->table('orang')->like('nama', $keyword);
    return $this->table('orang')->like('nama', $keyword)->orLike('alamat', $keyword);
  }
}
