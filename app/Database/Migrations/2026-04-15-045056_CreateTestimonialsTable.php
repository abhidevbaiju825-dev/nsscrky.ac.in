<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTestimonialsTable extends Migration
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
                'constraint' => '255',
            ],
            'designation' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'message' => [
                'type' => 'TEXT',
            ],
            'image_url' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('_testimonials', true);

        // Seed default initial data
        $db = \Config\Database::connect();
        $db->table('_testimonials')->insertBatch([
            [
                'name'        => 'Dr. Jane Doe',
                'designation' => 'Alumni, Batch 2020',
                'message'     => 'The college provided me with the academic rigor and the supportive community that shaped my professional life today.',
                'image_url'   => null,
                'created_at'  => date('Y-m-d H:i:s')
            ],
            [
                'name'        => 'Mr. John Smith',
                'designation' => 'Parent of B.Com Student',
                'message'     => 'Extremely proud of the values and discipline instilled in my child by the excellent faculty at this institution.',
                'image_url'   => null,
                'created_at'  => date('Y-m-d H:i:s')
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('_testimonials', true);
    }
}
