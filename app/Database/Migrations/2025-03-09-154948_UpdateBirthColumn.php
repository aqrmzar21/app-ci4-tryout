<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateBirthColumn extends Migration
{
    public function up()
    {
        $this->forge->modifyColumn('aktor', [
            'birth' => [
                'name' => 'birth', // Nama kolom yang ingin diubah
                'type' => 'DATE', // Tipe data baru
                'null' => true, // Kolom dapat bernilai NULL (opsional)
            ],
        ]);
    }

    public function down()
    {
        $this->forge->modifyColumn('aktor', [
            'birth' => [
                'name' => 'birth', // Nama kolom yang ingin diubah kembali
                'type' => 'DATETIME', // Tipe data lama
                'null' => true, // Sesuaikan dengan kondisi awal
            ],
        ]);
    }
}
