<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePrincipalDeskTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            '_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            '_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            '_qualification' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            '_message' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            '_email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            '_phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => true,
            ],
            '_about' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            '_imgloc' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
        ]);
        
        $this->forge->addKey('_id', true);
        $this->forge->createTable('_principal_desk', true);
    }

    public function down()
    {
        $this->forge->dropTable('_principal_desk', true);
    }
}
