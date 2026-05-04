<?php
namespace App\Models;
use CodeIgniter\Model;

class NewsModel extends Model {

    function get_news_desc()
    {
        return $this->db->table('_news')->orderBy('_newsid', 'DESC')->get()->getResultArray();
    }

    function get_news(){
        $query = $this->db->table('_news')->get();
        $ans = array();
        $i=0;
        foreach($query->getResultArray() as $row){
            $ans[$i]['_newsid'] = $row['_newsid'];
            $ans[$i]['_date'] = $row['_date'];
            $ans[$i]['_newsheading'] = $row['_newsheading'];
            $ans[$i]['_newsdescription'] = $row['_newsdescription'];
            $ans[$i]['_added_by'] = $row['_added_by'];
            $ans[$i++]['_imgloc'] = $row['_imgloc'];
        }
        return $ans;
    }

    function insert_news($data){
        $this->db->table('_news')->insert($data);
    }

    function get_news_withid($id){
        $this->db->where('_newsid',$id);
        $query = $this->db->table('_news')->get();
        $ans = array();
        foreach($query->getResultArray() as $row){
            $ans['_newsid'] = $row['_newsid'];
            $ans['_date'] = $row['_date'];
            $ans['_newsheading'] = $row['_newsheading'];
            $ans['_newsdescription'] = $row['_newsdescription'];
            $ans['_added_by'] = $row['_added_by'];
            $ans['_imgloc'] = $row['_imgloc'];
            // $ans['_dept_id'] = $row['_dept_id'];
        }
        return $ans;
    }

    function get_news_withid_news($id){
        $this->db->where('_newsid',$id);
        $query = $this->db->table('_news')->get();
        $ans = array();
        foreach($query->getResultArray() as $row){
            $ans['_newsid'] = $row['_newsid'];
            $ans['_date'] = $row['_date'];
            $ans['_newsheading'] = $row['_newsheading'];
            $ans['_newsdescription'] = $row['_newsdescription'];
            $ans['_added_by'] = $row['_added_by'];
            $ans['_imgloc'] = $row['_imgloc'];
            // $ans['_dept_id'] = $row['_dept_id'];
        }
        return $ans;
    }

    function get_deptnews_withid($id){
        $this->db->where('_newsid',$id);
        $query = $this->db->table('_dept_news')->get();
        $ans = array();
        foreach($query->getResultArray() as $row){
            $ans['_newsid'] = $row['_newsid'];
            $ans['_date'] = $row['_date'];
            $ans['_newsheading'] = $row['_newsheading'];
            $ans['_newsdescription'] = $row['_newsdescription'];
            $ans['_added_by'] = $row['_added_by'];
            $ans['_imgloc'] = $row['_imgloc'];
            $ans['_dept_id'] = $row['_dept_id'];
        }
        return $ans;
    }

    function update_news($data,$id){
        $this->db->where('_newsid', $id);
        $this->db->table('_news')->update($data);
    }

    function delete_newsimage($id) {
        $tem = $this->db->select('_imgloc')->where('_newsid', $id)->get('_news')->getRowArray()['_imgloc'];
        if($tem != "") {
            unlink(FCPATH . $tem);
            $this->db->where('_newsid', $id);
            $this->db->set('_imgloc', '');
            $this->db->update('_news');
        }
    }

    function delete_news($id) {
        $tem = $this->db->select('_imgloc')->where('_newsid', $id)->get('_news')->getRowArray()['_imgloc'];
        if($tem != "") {
            unlink(FCPATH . $tem);
        }
        $this->db->where('_newsid', $id);
        $this->db->table('_news')->delete();
    }

    function deletedep_news($id){
        $this->db->where('_newsid', $id);
        $this->db->table('_dept_news')->delete();
    }

    function insert_deptnews($updata){
        $this->db->table('_dept_news')->insert($updata);
    }

    function get_deptnewsBy($id){
        $this->db->where('_dept_id',$id);
        return  $this->db->table('_dept_news')->get()->getResultArray();
    }

    function update_deptnews($updata,$id){
        $this->db->where('_newsid',$id);
        $this->db->table('_dept_news')->update($updata);
    }

    function delete_deptnewsimage($id) {
        $tem = $this->db->select('_imgloc')->where('_newsid', $id)->get('_dept_news')->getRowArray()['_imgloc'];
        if($tem != "") {
            unlink(FCPATH . $tem);
            $this->db->where('_newsid', $id);
            $this->db->set('_imgloc', '');
            $this->db->update('_dept_news');
        }
    }

    function deletedept_news($id){
        $this->db->where('_newsid',$id);
        $this->db->table('_dept_news')->delete();
    }

    function get_club_news(){
        $this->db->select('*');
        return $this->db->table('_clubancells_newsandevents')->get()->getResultArray();
    }

    function get_club_news_by_id($id){
        $this->db->select('*');
        $this->db->where('_club_news_id',$id);
        return $this->db->table('_clubancells_newsandevents')->get()->getRow();
    }

    function get_newss($id){
         $this->db->where('_club_news_id',$id);
        return $query = $this->db->table('_clubancells_newsandevents')->get()->getRow();
    }

    /**
     * Get all department-specific news.
     * Migrated from legacy Mainmodel.
     */
    public function get_all_dept_news() {
        $this->db->select('n.*, d._department_name');
        $this->db->from('_dept_news n');
        $this->db->join('_departments d', 'd._dep_id = n._dept_id', 'left');
        $this->db->order_by('n._newsid', 'DESC');
        return $this->db->get()->getResultArray();
    }
}
