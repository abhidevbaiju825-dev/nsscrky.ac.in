<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class EnrichProgrammesAndSeedDepartments extends Migration
{
    public function up()
    {
        // 1. Add missing fields to _programmes
        $this->forge->addColumn('_programmes', [
            'max_seats' => ['type' => 'INT', 'constraint' => 11, 'default' => 0, 'after' => 'type'],
            'eligibility' => ['type' => 'TEXT', 'null' => true, 'after' => 'max_seats'],
            'vision' => ['type' => 'TEXT', 'null' => true, 'after' => 'eligibility'],
            'mission' => ['type' => 'TEXT', 'null' => true, 'after' => 'vision'],
            'objectives' => ['type' => 'TEXT', 'null' => true, 'after' => 'mission'],
            'image' => ['type' => 'VARCHAR', 'constraint' => 500, 'default' => '', 'after' => 'objectives'],
        ]);

        // 2. Seed the 4 legacy departments
        $db = \Config\Database::connect();
        $db->table('_departments')->insertBatch([
            [
                '_department_name' => 'Dept. Of Computer Applications',
                '_description' => '<p>The BCA programme is started in the year 1995. The Primary objective of the Department of Computer Applications is to facilitate the students of the High Ranges to explore the unlimited realms of Information Technology.</p>',
                '_association_name' => 'ICON',
                '_association_description' => 'ICON, the students association was formed for Inspiring Computer aspirants Of NSS college.',
                '_hod_message' => 'Success is not a good teacher, failure makes you humble',
                '_added_by' => 'System',
                '_modified_date' => date('Y-m-d'),
            ],
            [
                '_department_name' => 'Dept. Of Commerce',
                '_description' => '<p>NSS College, Rajakumari is the one and only aided college offering an aided B.Com degree course in this locality. The B.Com with Computer Application programme is started in the year 2003 and B.Com with Co-operation programme is started in the year 2014.</p>',
                '_association_name' => 'FOCUS',
                '_association_description' => 'FOCUS is a voluntary organisation of students under the Dept. Of Commerce, acting as a common podium to demonstrate academic achievements.',
                '_hod_message' => 'A good teacher is a determined person',
                '_added_by' => 'System',
                '_modified_date' => date('Y-m-d'),
            ],
            [
                '_department_name' => 'Dept. Of Electronics',
                '_description' => '<p>The Department of Electronics provides undergraduate and postgraduate programmes in Electronics. The UG programme is started in the year 1995 and the PG programme, in the year 2014.</p>',
                '_association_name' => 'PHOTONES',
                '_association_description' => 'A club exclusively by electronics people, addressing co-curricular activities and conducting memorable events.',
                '_hod_message' => 'A good teacher must know the rules; a good pupil, the exceptions',
                '_added_by' => 'System',
                '_modified_date' => date('Y-m-d'),
            ],
            [
                '_department_name' => 'Dept. Of Mathematics',
                '_description' => '<p>The Department of Mathematics seeks to provide quality education aimed at preparing high caliber professionals capable of achieving success and contributing to the development of the country.</p>',
                '_association_name' => '',
                '_association_description' => '',
                '_hod_message' => 'So what does a good teacher do? Create tension - but just the right amount',
                '_added_by' => 'System',
                '_modified_date' => date('Y-m-d'),
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('_programmes', ['max_seats', 'eligibility', 'vision', 'mission', 'objectives', 'image']);
        $db = \Config\Database::connect();
        $db->table('_departments')->whereIn('_department_name', [
            'Dept. Of Computer Applications', 'Dept. Of Commerce',
            'Dept. Of Electronics', 'Dept. Of Mathematics'
        ])->delete();
    }
}
