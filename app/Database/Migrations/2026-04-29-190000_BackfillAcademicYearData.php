<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BackfillAcademicYearData extends Migration
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
            '_studentunion_gallery',
            '_clubcell_desigwithrank'
        ];

        $month = (int)date('m');
        $year = (int)date('Y');
        $currentYear = ($month >= 6) ? $year . '-' . ($year + 1) : ($year - 1) . '-' . $year;

        foreach ($tables as $table) {
            if ($this->db->tableExists($table)) {
                $this->db->table($table)->where('_academic_year', null)->orWhere('_academic_year', '')->update(['_academic_year' => $currentYear]);
            }
        }
    }

    public function down()
    {
        // No down needed
    }
}
