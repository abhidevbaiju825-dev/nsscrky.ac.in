<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFormerPrincipalTable extends Migration
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
            '_from_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            '_to_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            '_imgloc' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'default'    => '',
            ],
        ]);

        $this->forge->addKey('_id', true);
        $this->forge->createTable('_former_principal', true);
    }

    public function down()
    {
        $this->forge->dropTable('_former_principal', true);
    }
}
