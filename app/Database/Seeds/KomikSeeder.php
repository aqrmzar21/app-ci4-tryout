<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time; // pastikan ini di bagian atas file



class KomikSeeder extends Seeder
{
    public function run()
    {
        //
        $data = [
            'komik_judul' => 'Dokgo Rewind',
            'komik_slug'    => 'dokgo-rewind',
            'komik_penulis'    => 'Oh Sehun',
            'komik_penerbit'    => 'Studio Dragon',
            'komik_tahun'    => '2018',
            'komik_sampul'    => 'dokgorewind-2017.jpg',
            'created_at'    => Time::now(),
            // 'created_at' => Time::now('Asia/Jakarta', 'en'),
            // 'updated_at' => Time::now('Asia/Jakarta', 'en'),
            'updated_at'    => Time::now(),
        ];

        // Simple Queries
        // $this->db->query('INSERT INTO komik (komik_judul, komik_slug) VALUES(:komik_judul:, :komik_slug:)', $data);

        // Using Query Builder
        $this->db->table('komik')->insert($data);
    }
}
