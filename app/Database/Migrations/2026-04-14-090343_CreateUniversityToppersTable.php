<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUniversityToppersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'rank' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'cgpa' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
            ],
            'department' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'year' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('_university_toppers', true);

        // Seed default data right here to save time
        $db = \Config\Database::connect();
        $db->table('_university_toppers')->insertBatch([
            [
                'name' => 'Amal Shiji',
                'rank' => 'RANK 8',
                'cgpa' => '8.64',
                'department' => 'BBA',
                'year' => '2024',
                'image' => 'assets/img/university_toppers/amal_shiji.jpg',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Rinsimol P.M',
                'rank' => 'RANK 9',
                'cgpa' => '8.34',
                'department' => 'B.Com Model II',
                'year' => '2024',
                'image' => 'assets/img/university_toppers/rincymol.jpg',
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'name' => 'Anamika Shanas',
                'rank' => 'RANK 9',
                'cgpa' => '8.34',
                'department' => 'B.Com Model II',
                'year' => '2024',
                'image' => 'assets/img/university_toppers/anamika_shanas.jpg',
                'created_at' => date('Y-m-d H:i:s')
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('_university_toppers', true);
    }
}
