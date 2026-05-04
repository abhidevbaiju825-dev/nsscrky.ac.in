<?php
namespace App\Models;
use CodeIgniter\Model;

class PtaModel extends Model {

    function get_pta_activities(){
        $query = $this->db->table('_pta_activities')->get();
        $ans = array();
        $i=0;
        foreach($query->getResultArray() as $row){
            $ans[$i]['_pta_act_id'] = $row['_pta_act_id'];
            $ans[$i]['_title'] = $row['_title'];
            $ans[$i]['_description'] = $row['_description'];
            $ans[$i]['_imgloc'] = $row['_imgloc'];
            $ans[$i++]['_is_upcomming'] = $row['_is_upcomming'];
        }
        return $ans;
    }

    function insert_pta_activities($updata){
        $this->db->table('_pta_activities')->insert($updata);
    }

    function get_pta_activities_withid($id){
        $this->db->where('_pta_act_id',$id);
        $query = $this->db->table('_pta_activities')->get();

        if($query->num_rows()>0){
            return $query->getResultArray()[0];
        }
    }

    function update_pta_activities($updata,$id)
    {
        $this->db->where('_pta_act_id',$id);
        $this->db->table('_pta_activities')->update($updata);
    }

    function delete_pta_activities($id)
    {
        $this->db->where('_pta_act_id',$id);
        $this->db->table('_pta_activities')->delete();
    }

    function insert_pta_members($updata)
    {
        $this->db->table('_pta_incharge')->insert($updata);
    }

    function get_pta_members(){
        $query = $this->db->table('_pta_incharge')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        return[];
    }

    function get_pta_members_withid($id)
    {
        $this->db->where('_id',$id);
        $query = $this->db->table('_pta_incharge')->get();
        if($query->num_rows()>0){
            return $query->getResultArray()[0];
        }
    }

    function update_pta_members($updata,$id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_pta_incharge')->update($updata);
    }

    function delete_pta_members($id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_pta_incharge')->delete();
    }

    function insert_pta_president($updata)
    {
        $this->db->table('_pta_president')->insert($updata);
    }

    function get_pta_president()
    {
        $query = $this->db->table('_pta_president')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        else{
            return false;
        }
    }

    function get_pta_president_with_id($id)
    {
        $this->db->where('_id',$id);
        $query = $this->db->table('_pta_president')->get();
        if($query->num_rows()>0){
            return $query->getResultArray()[0];
        }
    }

    function update_pta_president($updata,$id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_pta_president')->update($updata);
    }

    function delete_pta_president($id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_pta_president')->delete();
    }

    function insert_about_data($updata)
    {
        $this->db->table('_about_pta')->insert($updata);
    }

    function get_data_about_pta()
    {
        $query = $this->db->table('_about_pta')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        return[];
    }

    function get_data_about_pta_withid($id)
    {
        $this->db->where('_id',$id);
        $query = $this->db->table('_about_pta')->get();
        if($query->num_rows()>0){
            return $query->getResultArray()[0];
        }
        return[];
    }

    function update_about_data($updata,$id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_about_pta')->update($updata);
    }

    function delete_about_data($id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_about_pta')->delete();
    }

    function insert_pta_secretery($updata)
    {
        $this->db->table('_pta_sec')->insert($updata);
    }

    function get_sec_pta(){
        $query = $this->db->table('_pta_sec')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
    }

    function get_sec_pta_withid($id)
    {
        $this->db->where('_id',$id);
        $query = $this->db->table('_pta_sec')->get();
        if($query->num_rows()>0){
            return $query->getResultArray()[0];
        }
    }

    function update_pta_sec($updata,$id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_pta_sec')->update($updata);
    }

    function delete_pta_sec($id){
        $this->db->where('_id',$id);
        $this->db->table('_pta_sec')->delete();
    }

    function delete_pta_sec_img($id) {
        $tem = $this->db->select('_imgloc')->where('_id', $id)->get('_pta_sec')->getRowArray()['_imgloc'];
        if($tem != "") {
            unlink(FCPATH . $tem);
        }
        $this->db->where('_id', $id);
        $this->db->table('_pta_sec')->delete();
    }

    function get_ptamem_data_by_id($id){
        $this->db->where('_id',$id);
        $query = $this->db->table('_pta_members')->get();
        $ans = array();
        foreach($query->getResultArray() as $row){
            if($row['_imgloc'] == ""){
                $row['_imgloc'] = 'assets/images/default.jpg';
            }
            $ans = $row;
        }
        return $ans;
    }

}
