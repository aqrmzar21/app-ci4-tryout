<?php

namespace App\Controllers;

class Coba extends BaseController
{
  public function dex()
  {
    echo "Hi Worlf dalam Alice in Borderland ";
  }
  public function about($nama ='', $umur = '0')
  // public function about()
  {
    // echo "Hi World Nama saya Sandi";
    // echo "Hi World Nama saya $nama";
    echo "Hi World Nama saya $nama, saya berumur $umur tahun.";
  }
}
