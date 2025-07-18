<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Komik extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'komik_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 25,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'komik_judul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'komik_slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'komik_penulis' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'komik_penerbit' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'komik_tahun' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'komik_sampul' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('komik_id', true);
        $this->forge->createTable('komik');
    }

    public function down()
    {
        //
        $this->forge->dropTable('komik');
    }
}
