<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRemainingLegacyTables extends Migration
{
    public function up()
    {
        // 1. _our_management (About page - management body)
        $this->forge->addField([
            '_id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            '_description'  => ['type' => 'VARCHAR', 'constraint' => 1000, 'null' => true],
            '_imgloc'       => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true, 'default' => ''],
            '_created_date' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('_id', true);
        $this->forge->createTable('_our_management', true);

        // 2. _our_team (About page - key people)
        $this->forge->addField([
            '_id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            '_name'         => ['type' => 'VARCHAR', 'constraint' => 100],
            '_designation'  => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            '_imgloc'       => ['type' => 'TEXT', 'null' => true],
            '_created_date' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('_id', true);
        $this->forge->createTable('_our_team', true);

        // 3. _counsil_incharge (College Council)
        $this->forge->addField([
            '_id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            '_name'         => ['type' => 'VARCHAR', 'constraint' => 100],
            '_designation'  => ['type' => 'VARCHAR', 'constraint' => 200, 'null' => true],
            '_description'  => ['type' => 'VARCHAR', 'constraint' => 1000, 'null' => true],
            '_imgloc'       => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true, 'default' => ''],
        ]);
        $this->forge->addKey('_id', true);
        $this->forge->createTable('_counsil_incharge', true);

        // 4. _counsil_members (College Council members)
        $this->forge->addField([
            '_id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            '_name'         => ['type' => 'VARCHAR', 'constraint' => 100],
            '_designation'  => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            '_imgloc'       => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('_id', true);
        $this->forge->createTable('_counsil_members', true);

        // 5. _scholarship
        $this->forge->addField([
            '_scholarship_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            '_title'          => ['type' => 'TEXT', 'null' => true],
            '_description'    => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('_scholarship_id', true);
        $this->forge->createTable('_scholarship', true);

        // 6. _naac_certificates
        $this->forge->addField([
            '_id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            '_title'        => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            '_imgloc'       => ['type' => 'TEXT', 'null' => true],
            '_created_date' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('_id', true);
        $this->forge->createTable('_naac_certificates', true);

        // 7. _naac_journey
        $this->forge->addField([
            '_id'          => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            '_title'       => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            '_description' => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('_id', true);
        $this->forge->createTable('_naac_journey', true);

        // 8. _naac_cordinators
        $this->forge->addField([
            '_id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            '_name'         => ['type' => 'VARCHAR', 'constraint' => 100],
            '_designation'  => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            '_imgloc'       => ['type' => 'TEXT', 'null' => true],
            '_created_date' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('_id', true);
        $this->forge->createTable('_naac_cordinators', true);

        // 9. _web_downloads
        $this->forge->addField([
            '_web_downloads_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            '_pdfloc'           => ['type' => 'TEXT', 'null' => true],
            '_title'            => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            '_order'            => ['type' => 'INT', 'constraint' => 10, 'default' => 0],
        ]);
        $this->forge->addKey('_web_downloads_id', true);
        $this->forge->createTable('_web_downloads', true);
    }

    public function down()
    {
        $this->forge->dropTable('_our_management', true);
        $this->forge->dropTable('_our_team', true);
        $this->forge->dropTable('_counsil_incharge', true);
        $this->forge->dropTable('_counsil_members', true);
        $this->forge->dropTable('_scholarship', true);
        $this->forge->dropTable('_naac_certificates', true);
        $this->forge->dropTable('_naac_journey', true);
        $this->forge->dropTable('_naac_cordinators', true);
        $this->forge->dropTable('_web_downloads', true);
    }
}
