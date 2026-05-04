<?php
namespace App\Controllers;
class TestDB extends BaseController {
    public function index() {
        $db = \Config\Database::connect();

        $month = (int)date('m');
        $year = (int)date('Y');
        $currentYear = ($month >= 6) ? $year . '-' . ($year + 1) : ($year - 1) . '-' . $year;
        echo "<pre>Current Year: $currentYear\n\n";

        $nss = $db->table('_nss_incharges')->get()->getResultArray();
        echo "NSS Incharges:\n";
        print_r($nss);

        $panels = $db->table('_studentunion_panel')->get()->getResultArray();
        echo "Union Panels:\n";
        print_r($panels);

        $ncc = $db->table('_ncc_incharge_member')->get()->getResultArray();
        echo "NCC Members:\n";
        print_r($ncc);
    }
}
