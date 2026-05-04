<?php
namespace App\Models;
use CodeIgniter\Model;

class CourseModel extends Model {

    function get_ugc(){
        $this->db->select('ugp.*,br.*,dep.*');
        $this->db->join('_basic_teacher_registration as br','br._teacher_id = ugp._authorname','left');
        $this->db->join('_departments as dep','dep._dep_id = ugp._department','left');
        $query = $this->db->table('_ugcprojects as ugp')->get();
        $ans = array();
        $i=0;
        foreach($query->getResultArray() as $row){
            $ans[$i]['_ugcid'] = $row['_ugcid'];
            $ans[$i]['_papername'] = $row['_papername'];
            $ans[$i]['_authorname'] = $row['_name'];
            $ans[$i]['_submittedto'] = $row['_submittedto'];
            $ans[$i]['_department'] = $row['_department_name'];
            $ans[$i++]['_pdfloc'] = $row['_pdfloc'];
        }
        return $ans;
    }

    function insert_ugcprojects($updata)
    {
        $this->db->table('_ugcprojects')->insert($updata);
    }

    function get_ugc_withid($id)
    {
        $this->db->select('ugp.*,br.*');
        $this->db->join('_basic_teacher_registration as br','br._teacher_id = ugp._authorname','left');
        $this->db->where('ugp._ugcid',$id);
        $query = $this->db->table('_ugcprojects as ugp')->get();
        $ans = array();
        foreach($query->getResultArray() as $row){
            $ans['_ugcid'] = $row['_ugcid'];
            $ans['_papername'] = $row['_papername'];
            $ans['_authorname'] = $row['_name'];
            $ans['_authorid'] = $row['_authorname'];
            $ans['_submittedto'] = $row['_submittedto'];
            $ans['_department'] = $row['_department'];
            $ans['_pdfloc'] = $row['_pdfloc'];
        }
        return $ans;
    }

    function update_ugc($updata,$id)
    {
        $this->db->where('_ugcid',$id);
        $this->db->table('_ugcprojects')->update($updata);
    }

    function delete_ugc($id)
    {
        $this->db->where('_ugcid',$id);
        $this->db->table('_ugcprojects')->delete();
    }

    function delete_ugcimage($id) {
        $tem = $this->db->select('_pdfloc')->where('_ugcid', $id)->get('_ugcprojects')->getRowArray()['_pdfloc'];
        if ($tem != "") {
            unlink(FCPATH . $tem);
            $this->db->set('_pdfloc', '');
            $this->db->where('_ugcid', $id);
            $this->db->update('_ugcprojects');
        }
    }

    function insert_courses($updata)
    {
        $this->db->table('_courses')->insert($updata);
    }

    function get_course_list()
    {
        $query = $this->db->table('_courses')->get();
        if($query->num_rows()>0)
        {
            return $query->getResultArray();
        }
        return[];
    }

    function get_ug_course_list()
    {
        $this->db->where('_category','Under Graduate');
        $query = $this->db->table('_courses')->get();
        if($query->num_rows()>0)
        {
            return $query->getResultArray();
        }
        return[];
    }

    function get_pg_course_list()
    {
        $this->db->where('_category','Post Graduate');

        $query = $this->db->table('_courses')->get();
        if($query->num_rows()>0)
        {
            return $query->getResultArray();
        }
        return[];
    }

    function get_course_list_data()
    {
        $query = $this->db->table('_courses')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
    }

    function get_course_withid_admin($id)
    {
        $this->db->where('_courseid',$id);
        $query = $this->db->table('_courses')->get();
        if($query->num_rows()>0){
            return $query->getResultArray()[0];
        }
    }

    function get_courses_withid($id,$graduate)
    {
        $this->db->where('_category',$graduate);
        $this->db->where('_courseid',$id);
        $query = $this->db->table('_courses')->get();
        if($query->num_rows()>0){
            return $query->getResultArray()[0];
        }
    }

    function update_courses($updata,$id)
    {
        $this->db->where('_courseid',$id);
        $this->db->table('_courses')->update($updata);
    }

    function delete_course_image($id){

        $this->db->where('_union_gallery_id',$id);
        $this->db->table('_studentunion_gallery')->delete();
    }

    function delete_courses($id)
    {
        $this->db->where('_courseid',$id);
        $this->db->table('_courses')->delete();
    }

    function get_display_as_array(){
        $ans = array(
            'clubncell' => 'Club & Cell',
            'antiragging' => 'Antiragging Cell',
            'greivence' => 'Greivence Cell',
            'pta' => 'PTA',
            'nss' =>'NSS',
            'ncc' => 'NCC'
        );
        return $ans;
    }

    function sort_list_clubdisunder($data){

        $ans = $data['club_dis_ar'];
        foreach($data['clubs'] as $myclub){
            if($myclub['_display_as'] != "clubncell" && isset($ans[$myclub['_display_as']])){
                unset($ans[$myclub['_display_as']]);
            }
        }
        return $ans;
    }

    function insert_department($updata){

        $this->db->table('_departments')->insert($updata);


    }

    function delete_dep_hod_img($id) {
        $tem = $this->db->select('_hod_img')->where('_dep_id', $id)->get('_departments')->getRowArray()['_hod_img'];
        if ($tem != "") {
            unlink(FCPATH . $tem);
            $this->db->set('_hod_img', '');
            $this->db->where('_dep_id', $id);
            $this->db->update('_departments');
        }
    }

    function get_dep_details_withid($id)
    {

        $this->db->where('_dep_id',$id);

        $query=$this->db->table('_departments')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return[];
    }

    function update_department($updata,$id)
    {

        $this->db->where('_dep_id',$id);
        $this->db->table('_departments')->update($updata);
    }

    function delete_department($id)
    {
        $this->db->where('_dep_id',$id);
        $this->db->table('_departments')->delete();
    }

    function get_dept_data_common($dept)
    {
        $this->db->where('_dep_id',$dept);
        $query=$this->db->table('_departments')->get();
        $ans = '';
        if( $query->num_rows()>0 )
        {
            $ans = $query->getResultArray()[0];
        }
        return $ans;
    }

    function get_dep_details(){
        $query=$this->db->order_by('_department_name','ASC')->get('_departments');
        $ans = array();
        if($query->num_rows()>0){
            $ans = $query->getResultArray();
        }
        return $ans;
    }

}
