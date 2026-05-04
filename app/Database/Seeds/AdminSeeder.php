<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'username'      => 'admin123',
            'password_hash' => password_hash('Admin@!123', PASSWORD_BCRYPT),
            'role'          => 'admin',
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        // Ensure we don't insert duplicates
        if ($this->db->table('admin_users')->where('username', 'admin123')->countAllResults() === 0) {
            $this->db->table('admin_users')->insert($data);
        }
    }
}
