<?php
namespace App\Models;
use CodeIgniter\Model;

class ScholarshipModel extends Model {

    function get_scholarship(){
        $query = $this->db->table('_scholarship')->get();
        $ans = array();
        $i=0;
        foreach($query->getResultArray() as $row){
            $ans[$i]['_scholarship_id'] = $row['_scholarship_id'];
            $ans[$i]['_title'] = $row['_title'];
            $ans[$i++]['_description'] = $row['_description'];
        }
        return $ans;
    }

    function insert_scholarship($data){
        $this->db->table('_scholarship')->insert($data);
    }

    function get_scholarship_withid($id){
        $this->db->where('_scholarship_id', $id);
        $query = $this->db->table('_scholarship')->get();
        $ans = array();
        foreach($query->getResultArray() as $row){
            $ans['_scholarship_id'] = $row['_scholarship_id'];
            $ans['_title'] = $row['_title'];
            $ans['_description'] = $row['_description'];
        }
        return $ans;
    }

    function update_scholarship($data,$id){
        $this->db->where('_scholarship_id', $id);
        $this->db->table('_scholarship')->update($data);
    }

    function delete_scholarship($id){
        $this->db->where('_scholarship_id', $id);
        $this->db->table('_scholarship')->delete();
    }

}
