<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'aktris_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'birth' => [
                'type'       => 'DATE',
                'null' => false,
            ],
            'agensi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('aktris_id', true);
        $this->forge->createTable('aktor');
    }

    public function down()
    {
        $this->forge->dropTable('aktor');
    }
}
