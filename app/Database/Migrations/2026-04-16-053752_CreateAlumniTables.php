<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAlumniTables extends Migration
{
    public function up()
    {
        // 1. Alumni Users
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'unique'     => true,
            ],
            'password_hash' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'full_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            'dob' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'gender' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null'       => true,
            ],
            'blood_group' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null'       => true,
            ],
            'passout_year' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'location' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
                'null'       => true,
            ],
            'profile_picture' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'default'    => 'pending', // pending, approved, rejected
            ],
            'approved_by' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('alumni_users');

        // 2. Alumni Education
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'alumni_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'course' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'institution' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'from_year' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'to_year' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('alumni_id', 'alumni_users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('alumni_education');

        // 3. Alumni Experience
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'alumni_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'company' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'designation' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'from_year' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'to_year' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
                'null'       => true, // Null could mean "Present"
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('alumni_id', 'alumni_users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('alumni_experience');

        // 4. Alumni Activities (Events, News, Notices specific to Alumni)
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'image_url' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'activity_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('alumni_activities');
    }

    public function down()
    {
        $this->forge->dropTable('alumni_activities');
        $this->forge->dropTable('alumni_experience');
        $this->forge->dropTable('alumni_education');
        $this->forge->dropTable('alumni_users');
    }
}
