<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'name'      => 'Shin Eun-soo',
                'birth'       => '2002-10-23',
                'agensi'    => 'HOLTON Entertainment',
            ],
            [
                'name'      => 'Shin Soo-hyun',
                'birth'       => '1996-02-27',
                'agensi'    => 'Madin Entertainment',
            ],
            [
                'name'      => 'Shin Ryu-jin',
                'birth'       => '2001-04-17',
                'agensi'    => 'JYP Entertainment',
            ],
        ];
        // Menggunakan insert untuk menyisipkan satu data
        // $this->db->table('aktor')->insert($data);
        // Menggunakan insertBatch untuk menyisipkan banyak data
        $this->db->table('aktor')->insertBatch($data);
    }
}
