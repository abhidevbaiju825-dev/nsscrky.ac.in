<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProgrammesTable extends Migration
{
    public function up()
    {
        // Check if Computer Application department exists, if not, create it.
        $db = \Config\Database::connect();
        if ($db->tableExists('_departments')) {
            $hasDept = $db->table('_departments')
                ->like('_department_name', 'Computer Application')
                ->countAllResults();

            if ($hasDept == 0) {
                $db->table('_departments')->insert([
                    '_department_name' => 'Computer Application',
                ]);
            }
        }

        // Create _programmes table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'department_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'duration' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'type' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null'       => true,
            ],
            'syllabus' => [
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
            ]
        ]);

        $this->forge->addKey('id', true);
        // Assuming _departments primary key is _dep_id
        // $this->forge->addForeignKey('department_id', '_departments', '_dep_id', 'CASCADE', 'CASCADE'); // SQLite/MySQL handles foreign keys differently sometimes, omitting for legacy safety
        $this->forge->createTable('_programmes', true);

        // Seed default program for Computer Application
        if ($db->tableExists('_departments')) {
            $dept = $db->table('_departments')
                ->like('_department_name', 'Computer Application')
                ->get()->getRowArray();
            if ($dept) {
                $db->table('_programmes')->insert([
                    'department_id' => $dept['_dep_id'],
                    'title' => 'Bachelor of Computer Applications',
                    'description' => 'Master software development, programming paradigms, database management, and computational thinking.',
                    'duration' => '3 Years',
                    'type' => 'Self-Financing',
                    'created_at' => date('Y-m-d H:i:s'),
                ]);
            }
        }
    }

    public function down()
    {
        $this->forge->dropTable('_programmes', true);
    }
}
