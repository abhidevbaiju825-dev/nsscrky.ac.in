<?php

namespace App\Cells;

class NavbarCell
{
    public function render(): string
    {
        $db = \Config\Database::connect();
        
        $menu_dept_data = $db->table('_departments')->orderBy('_department_name', 'ASC')->get()->getResultArray();
        $pgug_data = $db->table('_courses')->get()->getResultArray();

        $getClubId = function($type) use ($db) {
            $row = $db->table('_clubandcells')->where('_display_as', $type)->get()->getRowArray();
            return $row ? $row['_id'] : '';
        };

        $data = [
            'menu_dept_data' => $menu_dept_data,
            'pgug_data' => $pgug_data,
            'menu_pta_data' => $getClubId('pta'),
            'menu_ant_data' => $getClubId('antiragging'),
            'menu_gre_data' => $getClubId('greivence'),
            'menu_nss_data' => $getClubId('nss'),
            'menu_ncc_data' => $getClubId('ncc'),
        ];

        return view('cells/navbar', $data);
    }
}
