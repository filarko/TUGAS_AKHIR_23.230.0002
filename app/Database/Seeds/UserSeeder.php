<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'username' => 'admin_gudang',
                'email' => 'admin_gudang@example.com',
                'password' => password_hash('password123', PASSWORD_BCRYPT),
                'name' => 'Admin Gudang',
                'role' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'foto' => null,
                'is_active' => '1',
                'no_telp' => '081234567890',
            ],
            [
                'username' => 'kepala',
                'email' => 'kepala@example.com',
                'password' => password_hash('password123', PASSWORD_BCRYPT),
                'name' => 'Kepala',
                'role' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'foto' => null,
                'is_active' => '1',
                'no_telp' => '081298765432',
            ],
        ];

        // Insert data into the 'user' table
        $this->db->table('user')->insertBatch($data);
    }
}
