<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InstitutionalSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // PTA Data
        $ptaItems = [
            [
                'category'    => 'about',
                'title'       => 'PTA Overview',
                'description' => 'The parent teacher association is functioning in the college to foster good relationship among teachers, students and guardians of students.',
                'sort_order'  => 0
            ],
            [
                'category'    => 'president',
                'title'       => 'Principal',
                'description' => 'Ex-officio President',
                'sort_order'  => 1
            ],
            [
                'category'    => 'secretary',
                'title'       => 'B Sreekumar',
                'description' => 'Secretary',
                'sort_order'  => 2
            ]
        ];

        foreach ($ptaItems as $item) {
            $db->table('_pta')->insert($item);
        }

        // Anti-Ragging Data
        $db->table('_anti_ragging')->insert([
            'description'          => 'Ragging is strictly prohibited in the campus by law.',
            'incharge_name'        => 'Dr. Sujatha S.',
            'incharge_designation' => 'Principal',
        ]);

        // Grievance Cell Data
        $db->table('_grievance_cell')->insert([
            'description' => 'The Grievance Redressal Cell is intended to provide a mechanism for redressal of students grievances.'
        ]);

        // RTI Data
        $rtiItems = [
            [
                'category'    => 'statutory_declaration',
                'description' => 'Citizens can seek information regarding the activities of the college by submitting a written request with details like Name, address, contact telephone number and particulars of the information sought. The reason for seeking information need not be given. The duly signed request may be addressed to the Public Information Officer, N S S College, Rajakumari, Kulapparachal P O, Idukki 685619 along with the required fee of Rs.10/-. Copies of documents will be charged according to the rate fixed by the State Information Commission, Kerala.',
                'sort_order'  => 0
            ],
            [
                'category'    => 'officer',
                'role'        => 'Public Information Officer',
                'name'        => 'Dr. Praveen N',
                'designation' => 'Associate Professor and Head',
                'department'  => 'PG Department of Electronics',
                'phone'       => '9447608163',
                'email'       => 'praveen.naniyat@gmail.com',
                'sort_order'  => 1
            ],
            [
                'category'    => 'officer',
                'role'        => 'Assistant Information Officer',
                'name'        => 'Sri. Harikrishnan P',
                'designation' => 'Associate Professor',
                'department'  => 'Department of Computer Applications',
                'phone'       => '9447440334',
                'email'       => 'harinss@gmail.com',
                'sort_order'  => 2
            ],
            [
                'category'    => 'officer',
                'role'        => 'First Appellate Authority',
                'name'        => 'Dr. Jyothish Kumar K',
                'designation' => 'Principal',
                'department'  => 'N S S College, Rajakumari',
                'phone'       => '9447502337',
                'email'       => 'jk.urvara@gmail.com',
                'sort_order'  => 3
            ]
        ];

        foreach ($rtiItems as $item) {
            $db->table('_rti')->insert($item);
        }
    }
}
