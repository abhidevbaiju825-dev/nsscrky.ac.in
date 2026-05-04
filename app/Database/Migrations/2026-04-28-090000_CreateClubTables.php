<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateClubTables extends Migration
{
    public function up()
    {
        // 1. _clubcell_desigwithrank
        $this->forge->addField([
            '_id'           => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            '_clubcell_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            '_designation'  => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            '_desig_rank'   => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            '_status'       => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'active'],
            '_academic_year'=> ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            '_created_at'   => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('_id', true);
        $this->forge->createTable('_clubcell_desigwithrank', true);

        // 2. _clubandcells_members
        $this->forge->addField([
            '_club_mem_id'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            '_clubandcells_id'  => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            '_account_id'       => ['type' => 'VARCHAR', 'constraint' => 100],
            '_which_table'      => ['type' => 'VARCHAR', 'constraint' => 50],
            '_designation'      => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            '_member_type'      => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'normal'],
            '_rank'             => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            '_status'           => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'active'],
            '_created_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('_club_mem_id', true);
        $this->forge->createTable('_clubandcells_members', true);

        // 3. _clubandcells_other_members
        $this->forge->addField([
            '_other_id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            '_name'             => ['type' => 'VARCHAR', 'constraint' => 255],
            '_created_at'       => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('_other_id', true);
        $this->forge->createTable('_clubandcells_other_members', true);
    }

    public function down()
    {
        $this->forge->dropTable('_clubcell_desigwithrank', true);
        $this->forge->dropTable('_clubandcells_members', true);
        $this->forge->dropTable('_clubandcells_other_members', true);
    }
}
