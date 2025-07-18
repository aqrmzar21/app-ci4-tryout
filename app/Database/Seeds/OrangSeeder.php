<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;
use Faker\Factory;

class OrangSeeder extends Seeder
{
    public function run()
    {
        // membuat data sembarang orang (ID)
        $faker = \Faker\Factory::create('id_ID');
        // meloping data sesuai target yg diinginkan
        for ($i = 0; $i < 50; $i++) {
            # code...
            $data = [
                'nama'          => $faker->name,
                'alamat'        => $faker->address,
                'created_at'    => Time::createFromTimestamp($faker->unixTime()),
                'updated_at'    => Time::now(),
            ];

            // Using Query Builder
            $this->db->table('orang')->insert($data);
        }
    }
}
