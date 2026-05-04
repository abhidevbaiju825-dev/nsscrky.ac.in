<?php
namespace App\Models;
use CodeIgniter\Model;

class ClubModel extends Model {

    protected $table = '_clubandcells';
    protected $primaryKey = '_id';
    protected $allowedFields = [
        '_name', '_description', '_display_as', '_staf_id', '_logo', '_imgloc', '_dept_id', '_hbanner', '_fbanner'
    ];

    /**
     * Safe null-coalesce for query results
     */
    private function safeArray($result) {
        return $result ?: [];
    }

    public function get_club_data_bycellid($cellid) {
        return $this->db->table('_clubandcells')->where('_id', $cellid)->get()->getRowArray();
    }

    public function get_club_activity_bycellid($cellid, $year = null) {
        $builder = $this->db->table('_clubactivity')->where('_clubncell_id', $cellid);
        if ($year) $builder->where('_academic_year', $year);
        $activities = $builder->get()->getResultArray();
        foreach ($activities as &$row) {
            if (empty($row['_imgloc'])) {
                $row['_imgloc'] = 'assets/images/default.jpg';
            }
        }
        return $activities;
    }

    public function get_activity_data_byid($id) {
        return $this->db->table('_clubactivity')->where('_id', $id)->get()->getRowArray();
    }

    public function remove_activity_picture($id) {
        $activity = $this->db->table('_clubactivity')->select('_imgloc')->where('_id', $id)->get()->getRowArray();
        if ($activity && !empty($activity['_imgloc'])) {
            if (file_exists(FCPATH . $activity['_imgloc'])) {
                unlink(FCPATH . $activity['_imgloc']);
            }
            $this->db->table('_clubactivity')->where('_id', $id)->update(['_imgloc' => '']);
        }
    }

    public function remove_activity_data($id) {
        $this->remove_activity_picture($id);
        $this->db->table('_clubactivity')->where('_id', $id)->delete();
    }

    public function insert_club_member($data) {
        return $this->db->table('_clubandcells_members')->insert($data);
    }
    
    public function update_club_member($data, $designationId) {
        $this->db->table('_clubandcells_members')->where('_designation', $designationId)->update($data);
    }

    /**
     * Get list of all possible members from multiple tables for the dropdown
     */
    public function get_club_memberlst_bycellid($cell_id) {
        $ans = [];
        $itr = 0;
        
        $teachers = $this->db->table('_basic_teacher_registration')->get()->getResultArray();
        foreach ($teachers as $row) {
            $ans[$itr]['type'] = 'tea';
            $ans[$itr]['_id'] = $row['_teacher_id'];
            $ans[$itr]['_name'] = $row['_name'] . " (Teacher)";
            $itr++;
        }

        // PTA members - check table exists first
        if ($this->db->tableExists('_pta_members')) {
            $pta = $this->db->table('_pta_members')->get()->getResultArray();
            foreach ($pta as $row) {
                $ans[$itr]['type'] = 'pta';
                $ans[$itr]['_id'] = $row['_id'];
                $ans[$itr]['_name'] = $row['_name'] . " (PTA)";
                $itr++;
            }
        }

        // Alumni
        if ($this->db->tableExists('_alumini_members')) {
            $alumni = $this->db->table('_alumini_members')->get()->getResultArray();
            foreach ($alumni as $row) {
                $ans[$itr]['type'] = 'alu';
                $ans[$itr]['_id'] = $row['_id'];
                $ans[$itr]['_name'] = ($row['_full_name'] ?? $row['_name'] ?? 'Unknown') . " (Alumini)";
                $itr++;
            }
        }

        // Students
        if ($this->db->tableExists('_student_nssrky')) {
            $students = $this->db->table('_student_nssrky')->get()->getResultArray();
            foreach ($students as $row) {
                $ans[$itr]['type'] = 'stu';
                $ans[$itr]['_id'] = $row['_id'];
                $ans[$itr]['_name'] = $row['_name'] . " (Student)";
                $itr++;
            }
        }

        // Other members
        if ($this->db->tableExists('_clubandcells_other_members')) {
            $others = $this->db->table('_clubandcells_other_members')->get()->getResultArray();
            foreach ($others as $row) {
                $ans[$itr]['type'] = 'omc';
                $ans[$itr]['_id'] = $row['_other_id'];
                $ans[$itr]['_name'] = $row['_name'] . " (Other)";
                $itr++;
            }
        }

        return $ans;
    }

    /**
     * Get assigned members for a club with their designation info, using the new table structure
     */
    public function get_club_tablememberlst_bycellid_new($cell_id, $year = null) {
        $builder = $this->db->table('_clubandcells_members');
        $builder->where('_clubandcells_members._clubandcells_id', $cell_id);
        if ($year) $builder->where('_clubandcells_members._academic_year', $year);
        $builder->join('_clubcell_desigwithrank', '_clubcell_desigwithrank._id = _clubandcells_members._designation', 'left');
        $builder->orderBy('_clubandcells_members._rank', 'ASC');
        
        $rows = $builder->get()->getResultArray();
        
        foreach ($rows as &$row) {
            $name = "";
            $nor_name = "";
            $acc_data = ['_imgloc' => ''];
            
            if (($row['_which_table'] ?? '') == 'tea') {
                $acc_data = $this->safeArray($this->db->table('_basic_teacher_registration')->where('_teacher_id', $row['_account_id'])->get()->getRowArray());
                if (!empty($acc_data['_name'])) {
                    $name = $acc_data['_name'] . " (Teacher)";
                    $nor_name = $acc_data['_name'];
                }
            } elseif (($row['_which_table'] ?? '') == 'pta') {
                $acc_data = $this->safeArray($this->db->table('_pta_members')->where('_id', $row['_account_id'])->get()->getRowArray());
                if (!empty($acc_data['_name'])) {
                    $name = $acc_data['_name'] . " (PTA)";
                    $nor_name = $acc_data['_name'];
                }
            } elseif (($row['_which_table'] ?? '') == 'alu') {
                $acc_data = $this->safeArray($this->db->table('_alumini_members')->where('_id', $row['_account_id'])->get()->getRowArray());
                if (!empty($acc_data['_full_name'])) {
                    $name = $acc_data['_full_name'] . " (Alumini)";
                    $nor_name = $acc_data['_full_name'];
                }
            } elseif (($row['_which_table'] ?? '') == 'stu') {
                $acc_data = $this->safeArray($this->db->table('_student_nssrky')->where('_id', $row['_account_id'])->get()->getRowArray());
                if (!empty($acc_data['_name'])) {
                    $name = $acc_data['_name'] . " (Student)";
                    $nor_name = $acc_data['_name'];
                }
            } elseif (($row['_which_table'] ?? '') == 'omc') {
                $acc_data = $this->safeArray($this->db->table('_clubandcells_other_members')->where('_other_id', $row['_account_id'])->get()->getRowArray());
                if (!empty($acc_data['_name'])) {
                    $name = $acc_data['_name'] . " (Other)";
                    $nor_name = $acc_data['_name'];
                }
            }
            
            $row['acc_data'] = $acc_data;
            $row['dis_name'] = $name;
            $row['org_name'] = $nor_name;
            $row['clubdesig'] = $row['_id'] ?? '';
        }
        return $rows;
    }

    public function get_club_tablememberlst_bycellid($cell_id, $year = null) {
        $builder = $this->db->table('_clubcell_desigwithrank')
            ->where('_clubcell_id', $cell_id);
        if ($year) $builder->where('_academic_year', $year);
        $data = $builder->orderBy('_desig_rank', 'ASC')
            ->get()->getResultArray();

        $query = [];
        foreach ($data as $i => $val) {
            $query[$i]['members'] = $this->getMemberClub($val['_id']);
            $query[$i]['designation'] = (!empty($query[$i]['members'])) ? $val['_designation'] : "";
            $query[$i]['_id'] = $val['_id'];
        }
        return $query;
    }

    public function getMemberClub($desigId, $year = null) {
        $builder = $this->db->table('_clubandcells_members');
        $builder->where('_clubandcells_members._designation', $desigId);
        if ($year) $builder->where('_clubandcells_members._academic_year', $year);
        $builder->join('_clubcell_desigwithrank', '_clubcell_desigwithrank._id = _clubandcells_members._designation');
        $builder->orderBy('_clubandcells_members._rank', "ASC");
        
        $rows = $builder->get()->getResultArray();
        
        foreach ($rows as &$row) {
            $name = "";
            $nor_name = "";
            $acc_data = ['_imgloc' => ''];
            
            if (($row['_which_table'] ?? '') == 'tea') {
                $acc_data = $this->safeArray($this->db->table('_basic_teacher_registration')->where('_teacher_id', $row['_account_id'])->get()->getRowArray());
                if (!empty($acc_data['_name'])) {
                    $name = $acc_data['_name'] . " (Teacher)";
                    $nor_name = $acc_data['_name'];
                }
            } elseif (($row['_which_table'] ?? '') == 'pta') {
                $acc_data = $this->safeArray($this->db->table('_pta_members')->where('_id', $row['_account_id'])->get()->getRowArray());
                if (!empty($acc_data['_name'])) {
                    $name = $acc_data['_name'] . " (PTA)";
                    $nor_name = $acc_data['_name'];
                }
            } elseif (($row['_which_table'] ?? '') == 'alu') {
                $acc_data = $this->safeArray($this->db->table('_alumini_members')->where('_id', $row['_account_id'])->get()->getRowArray());
                if (!empty($acc_data['_full_name'])) {
                    $name = $acc_data['_full_name'] . " (Alumini)";
                    $nor_name = $acc_data['_full_name'];
                }
            } elseif (($row['_which_table'] ?? '') == 'stu') {
                $acc_data = $this->safeArray($this->db->table('_student_nssrky')->where('_id', $row['_account_id'])->get()->getRowArray());
                if (!empty($acc_data['_name'])) {
                    $name = $acc_data['_name'] . " (Student)";
                    $nor_name = $acc_data['_name'];
                }
            } elseif (($row['_which_table'] ?? '') == 'omc') {
                $acc_data = $this->safeArray($this->db->table('_clubandcells_other_members')->where('_other_id', $row['_account_id'])->get()->getRowArray());
                if (!empty($acc_data['_name'])) {
                    $name = $acc_data['_name'] . " (Other)";
                    $nor_name = $acc_data['_name'];
                }
            }
            
            $row['acc_data'] = $acc_data;
            $row['dis_name'] = $name;
            $row['org_name'] = $nor_name;
            $row['clubdesig'] = $row['_id'] ?? '';
        }
        return $rows;
    }

    public function remove_member_byid($id) {
        $this->db->table('_clubandcells_members')->where('_club_mem_id', $id)->delete();
    }

    public function remove_club_picture($id) {
        $club = $this->db->table('_clubandcells')->select('_imgloc, _logo, _hbanner, _fbanner')->where('_id', $id)->get()->getRowArray();
        if ($club) {
            foreach (['_imgloc', '_logo', '_hbanner', '_fbanner'] as $imgField) {
                if (!empty($club[$imgField]) && file_exists(FCPATH . $club[$imgField])) {
                    unlink(FCPATH . $club[$imgField]);
                }
            }
            $this->db->table('_clubandcells')->where('_id', $id)->update([
                '_imgloc' => '', '_logo' => '', '_hbanner' => '', '_fbanner' => ''
            ]);
        }
    }

    public function delete_clubandcells($id) {
        $this->remove_club_picture($id);
        $this->db->table('_clubandcells')->where('_id', $id)->delete();
    }
    
    public function get_clubdesigWithId($id, $year = null) {
        $builder = $this->db->table('_clubcell_desigwithrank')
            ->where('_clubcell_id', $id);
        if ($year) $builder->where('_academic_year', $year);
        return $builder->orderBy('_desig_rank', 'ASC')
            ->get()->getResultArray();
    }
    
    public function insertClubdesig($data) {
        $this->db->table('_clubcell_desigwithrank')->insert($data);
    }
    
    public function updateClubdesig($data, $id) {
        $this->db->table('_clubcell_desigwithrank')->where('_id', $id)->update($data);
    }

    public function removeDesigGroups($id) {
        $this->db->table('_clubcell_desigwithrank')->where('_id', $id)->delete();
    }
    
    public function insert_clubother_member($in_data) {
        $this->db->table('_clubandcells_other_members')->insert($in_data);
        $id = $this->db->insertID();
        return $this->db->table('_clubandcells_other_members')->where('_other_id', $id)->get()->getRow();
    }
}
