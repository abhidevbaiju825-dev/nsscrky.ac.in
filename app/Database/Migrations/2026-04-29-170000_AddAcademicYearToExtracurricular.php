<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddAcademicYearToExtracurricular extends Migration
{
    public function up()
    {
        $tables = [
            '_clubandcells_members',
            '_clubactivity',
            '_clubandcells_other_members',
            '_ncc_incharge_member',
            '_nss_incharges',
            '_studentunion_incharge',
            '_studentunion_panel',
            '_studentunion_activities',
            '_studentunion_gallery'
        ];

        $fields = [
            '_academic_year' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true
            ]
        ];

        foreach ($tables as $table) {
            if ($this->db->tableExists($table)) {
                $this->forge->addColumn($table, $fields);
            }
        }
    }

    public function down()
    {
        $tables = [
            '_clubandcells_members',
            '_clubactivity',
            '_clubandcells_other_members',
            '_ncc_incharge_member',
            '_nss_incharges',
            '_studentunion_incharge',
            '_studentunion_panel',
            '_studentunion_activities',
            '_studentunion_gallery'
        ];

        foreach ($tables as $table) {
            if ($this->db->tableExists($table)) {
                $this->forge->dropColumn($table, '_academic_year');
            }
        }
    }
}
