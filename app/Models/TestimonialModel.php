<?php
namespace App\Models;
use CodeIgniter\Model;

class TestimonialModel extends Model {

    function get_testimonials(){
        $query = $this->db->table('_testimonials')->get();
        $ans = array();
        $i=0;
        foreach($query->getResultArray() as $row){
            $ans[$i]['_id'] = $row['_id'];
            $ans[$i]['_testimonials'] = $row['_testimonials'];
            $ans[$i]['_name'] = $row['_name'];
            $ans[$i]['_designation'] = $row['_designation'];
            $ans[$i++]['_imgloc'] = $row['_imgloc'];
        }
        return $ans;
    }

    function insert_testimonials($data){
        $this->db->table('_testimonials')->insert($data);
    }

    function get_testimonials_withid($id){
        $this->db->where('_id',$id);
        $query = $this->db->table('_testimonials')->get();
        $ans = array();
        foreach($query->getResultArray() as $row){
            $ans['_id'] = $row['_id'];
            $ans['_testimonials'] = $row['_testimonials'];
            $ans['_name'] = $row['_name'];
            $ans['_designation'] = $row['_designation'];
            $ans['_imgloc'] = $row['_imgloc'];
        }
        return $ans;
    }

    function update_testimonials($data,$id){
        $this->db->where('_id', $id);
        $this->db->table('_testimonials')->update($data);
    }

    function delete_testimonial_image($id) {
        $tem = $this->db->select('_imgloc')->where('_id', $id)->get('_testimonials')->getRowArray()['_imgloc'];
        if ($tem != "") {
            unlink(FCPATH . $tem);
            $this->db->where('_id', $id);
            $this->db->set('_imgloc', '');
            $this->db->update('_testimonials');
        }
    }

    function delete_testimonials($id) {
        $tem = $this->db->select('_imgloc')->where('_id', $id)->get('_testimonials')->getRowArray()['_imgloc'];
        if ($tem != "") {
            unlink(FCPATH . $tem);
        }
        $this->db->where('_id', $id);
        $this->db->table('_testimonials')->delete();
    }

}
