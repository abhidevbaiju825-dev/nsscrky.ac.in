<?php
// Bootstrap CodeIgniter to access database
define('FCPATH', __DIR__ . '/public/');
require __DIR__ . '/app/Config/Paths.php';
$paths = new Config\Paths();
require rtrim($paths->systemDirectory, '\\/ ') . '/bootstrap.php';

$db = \Config\Database::connect();

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
    if ($db->tableExists($table)) {
        $db->table($table)->where('_academic_year', null)->orWhere('_academic_year', '')->update(['_academic_year' => $currentYear]);
        echo "Updated $table\n";
    }
}
echo "Done.\n";
