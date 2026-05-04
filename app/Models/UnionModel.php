<?php
namespace App\Models;
use CodeIgniter\Model;

class UnionModel extends Model {

    // --- Activities ---
    function get_union_activities($year = null){
        $builder = $this->db->table('_studentunion_activities');
        if ($year) $builder->where('_academic_year', $year);
        return $builder->get()->getResultArray();
    }

    function insert_union_activities($data){
        $this->db->table('_studentunion_activities')->insert($data);
    }

    function get_union_activities_withid($id){
        return $this->db->table('_studentunion_activities')->where('_id', $id)->get()->getRowArray() ?: [];
    }

    function update_union_activities($data, $id){
        $this->db->table('_studentunion_activities')->where('_id', $id)->update($data);
    }

    function delete_union_activities_image($id) {
        $res = $this->db->table('_studentunion_activities')->select('_imgloc')->where('_id', $id)->get()->getRow();
        if ($res && !empty($res->_imgloc) && file_exists(FCPATH . $res->_imgloc)) {
            unlink(FCPATH . $res->_imgloc);
            $this->db->table('_studentunion_activities')->where('_id', $id)->update(['_imgloc' => '']);
        }
    }

    function delete_union_activities($id) {
        $this->delete_union_activities_image($id);
        $this->db->table('_studentunion_activities')->where('_id', $id)->delete();
    }

    // --- Panel ---
    function get_union_panel($year = null){
        $builder = $this->db->table('_studentunion_panel');
        if ($year) $builder->where('_academic_year', $year);
        return $builder->get()->getResultArray();
    }

    function insert_union_panel($data){
        $this->db->table('_studentunion_panel')->insert($data);
    }

    function get_union_panel_withid($id){
        return $this->db->table('_studentunion_panel')->where('_id', $id)->get()->getRowArray() ?: [];
    }

    function update_union_panel($data, $id){
        $this->db->table('_studentunion_panel')->where('_id', $id)->update($data);
    }

    function delete_union_panel_image($id) {
        $res = $this->db->table('_studentunion_panel')->select('_imgloc')->where('_id', $id)->get()->getRow();
        if ($res && !empty($res->_imgloc) && file_exists(FCPATH . $res->_imgloc)) {
            unlink(FCPATH . $res->_imgloc);
            $this->db->table('_studentunion_panel')->where('_id', $id)->update(['_imgloc' => '']);
        }
    }

    function delete_union_panel($id) {
        $this->delete_union_panel_image($id);
        $this->db->table('_studentunion_panel')->where('_id', $id)->delete();
    }

    // --- Gallery ---
    function get_union_gallery($year = null){
        $builder = $this->db->table('_studentunion_gallery');
        if ($year) $builder->where('_academic_year', $year);
        return $builder->get()->getResultArray();
    }

    function insert_union_gallery($updata){
        $this->db->table('_studentunion_gallery')->insert($updata);
    }

    function delete_galley_images($id) {
        $res = $this->db->table('_studentunion_gallery')->where('_union_gallery_id', $id)->get()->getRow();
        if ($res && !empty($res->_imgloc) && file_exists(FCPATH . $res->_imgloc)) {
            unlink(FCPATH . $res->_imgloc);
        }
        $this->db->table('_studentunion_gallery')->where('_union_gallery_id', $id)->delete();
    }

    // --- In-charge ---
    function get_union_incharge($year = null){
        $builder = $this->db->table('_studentunion_incharge');
        if ($year) $builder->where('_academic_year', $year);
        return $builder->get()->getResultArray();
    }

    function insert_union_incharge($updata){
        $this->db->table('_studentunion_incharge')->insert($updata);
    }

    function get_union_incharge_withid($id){
        return $this->db->table('_studentunion_incharge')->where('_id', $id)->get()->getRowArray() ?: [];
    }

    function update_incharge_panel($updata, $id){
        $this->db->table('_studentunion_incharge')->where('_id', $id)->update($updata);
    }

    function delete_union_incharge_panel_image($id) {
        $res = $this->db->table('_studentunion_incharge')->select('_imgloc')->where('_id', $id)->get()->getRow();
        if ($res && !empty($res->_imgloc) && file_exists(FCPATH . $res->_imgloc)) {
            unlink(FCPATH . $res->_imgloc);
            $this->db->table('_studentunion_incharge')->where('_id', $id)->update(['_imgloc' => '']);
        }
    }

    function delete_union_panel_incharge($id) {
        $this->delete_union_incharge_panel_image($id);
        $this->db->table('_studentunion_incharge')->where('_id', $id)->delete();
    }

}
