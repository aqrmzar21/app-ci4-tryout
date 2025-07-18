<?php

namespace App\Controllers;

use \App\Models\OrangModel;


class Orang extends BaseController
{
  protected $OrangModel;
  public function __construct()
  {
    $this->OrangModel = new OrangModel();
  }

  public function index()
  {

    $currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

    // d($this->request->getVar('keyword'));
    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $orangs = $this->OrangModel->search($keyword);
    } else {
      $orangs = $this->OrangModel;
    }

    $data = [
      'title' => 'Tentang | TT',
      // 'orang' => $this->OrangModel->findAll(),
      // 'orang' => $this->OrangModel->paginate(10, 'orang'),
      'orang' => $orangs->paginate(10, 'orang'),
      'pager' => $this->OrangModel->pager,
      'currentPage' => $currentPage
    ];
    return view('pages/about.php', $data);
  }
}
