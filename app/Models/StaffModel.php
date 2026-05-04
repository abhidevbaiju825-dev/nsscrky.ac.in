<?php
namespace App\Models;
use CodeIgniter\Model;

class StaffModel extends Model {

    protected $table = '_basic_teacher_registration';
    protected $primaryKey = '_teacher_id';
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        '_name', '_short_name', '_address_line1', '_address_line2', '_gender',
        '_department', '_dateofjoin', '_designation', '_role', '_status',
        '_email', '_phone', '_imgloc', '_bool', '_dateofretirement', '_mobile_visible',
        '_dob', '_area_of_specialization', '_seniority', '_email_visible', '_description',
        '_subject', '_pan_number', '_pen_number', '_adhar_number', '_approved_by',
        '_login_id', '_order', '_hod', '_qualification', '_order_no'
    ];
    protected $useTimestamps = false;
    function get_full_staff_list($qry){
        $this->db->select('*');
        if (is_numeric($qry)) {
            $this->db->like('_phone', floatval($qry));
        }
        $this->db->or_like('_designation', $qry);
        $this->db->or_like('_name', $qry);
        $this->db->where('_role!=','nonteachingstaff');
        $this->db->limit('10');
        return $this->db->table('_basic_teacher_registration')->get()->getResultArray();
    }

    function get_department_full(){
        $this->db->select('*');
        return $this->db->table('_departments')->get()->getResultArray();
    }

    function delete_our_teamimage($id) {
        $tem = $this->db->select('_imgloc')->where('_id', $id)->get('_our_team')->getRowArray()['_imgloc'];
        if($tem != "") {
            unlink(FCPATH . $tem);
            $this->db->where('_id', $id);
            $this->db->set('_imgloc', '');
            $this->db->update('_our_team');
        }
    }

    function get_iqac_report()
    {
        $query=$this->db->table('_iqac_report')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return [];
    }

    function get_teach_data_bylid($login_id){
        $this->db->where('_login_id',$login_id);
        $query = $this->db->table('_basic_teacher_registration')->get();
        if($query->num_rows()>0){
            return $query->getResultArray()[0]['_teacher_id'];
        }
        return '';
    }

    function get_teacher_data_byid($id){ 
        $this->db->where("_teacher_id",$id);
        $query = $this->db->table('_basic_teacher_registration')->get();
        $ans = "";
        if($query->num_rows()>0){
            $row = $query->getResultArray()[0];
            $row['array_paper_published'] = $this->get_paper_published_details($row['_teacher_id']);
            $row['_profile_pic'] = base_url('assets/images/avatar.png');
            if($row['_imgloc'] != ""){
                $row['_profile_pic'] = base_url($row['_imgloc']);
            }
            $ans = $row;
        }
        return $ans;
    }

    function get_paper_published_details($teacher_id){
        $this->db->where('_teacher_id',$teacher_id);
        $this->db->order_by('_date','DESC');
        $query = $this->db->table('_basic_teacher_paper_published')->get();
        $ans = array();
        $i=0;
        foreach($query->getResultArray() as $row){
            $row['_format_date'] = "";
            if($row['_date'] != ""){
                $row['_format_date'] = date('d/m/Y',strtotime($row['_date']));
            }
            $ans[$i++] = $row;
        }
        return $ans;
    }

    function get_dept_wise_teacher_lists(){
        $ans = array();
        $query = $this->db->table('_departments')->get();
        $i=0;
        foreach($query->getResultArray() as $row){
            $row['_staff_list'] = $this->get_teacher_list_bydept($row['_dep_id']);
            $ans[$i++] = $row;
        }
        return $ans;
    }

    function get_dept_wise_teacher_list($id){
        $this->db->select('tr.*,dp.*,tr._description as description');
        $this->db->where('tr._teacher_id',$id);
        $this->db->join('_departments as dp','dp._dep_id = tr._department','left');
        return $this->db->table('_basic_teacher_registration as tr')->get()->getRow();
    }

    function get_teacher_list_bydept($deptid){
        $this->db->select('br.*,dept.*');
        $this->db->where('br._department',$deptid);
        $this->db->where('br._role!=','nonteachingstaff');
        $this->db->where('br._status','approved');
        $this->db->join('_departments as dept','dept._dep_id = br._department','left');
        $this->db->order_by('br._order','DESC');
        $query = $this->db->table('_basic_teacher_registration as br')->get();
        $ans = array();
        if($query->num_rows()>0){
            $ans = $query->getResultArray();
        }
        return $ans;
    }

    function get_all_non_teacher_list($id){
        if($id != ''){
            $this->db->where('_department',$id);
            $this->db->where('_status','approved');
            $this->db->where('_role','nonteachingstaff');
            
        }else{
            $this->db->where('_status','approved');
            $this->db->where('_role','nonteachingstaff');
            $this->db->order_by('_order','DESC');
        }
        $query = $this->db->table('_basic_teacher_registration')->get();
        $ans = array();
        if($query->num_rows()>0){
            $ans = $query->getResultArray();
        }
        return $ans;
    }

    function get_all_teacher_list($id){
        if($id =="non"){
            $this->db->where('_status','approved');
            $this->db->where('_role','nonteachingstaff');
            $this->db->order_by('_dateofjoin','ASEC');
            if($id != ''){
            $this->db->where('_department',$id);
            $this->db->where('_status','approved');
            $this->db->where('_role','nonteachingstaff');
            $this->db->order_by('_order','DESC');
            
        }
        }else if($id != ''){
            if($id == 'All' ){
                $this->db->where('_status','approved');
            $this->db->where('_role!=','nonteachingstaff');
            $this->db->order_by('_dateofjoin','ASEC');
            }else{
                $this->db->where('_department',$id);
                $this->db->where('_status','approved');
                $this->db->where('_role!=','nonteachingstaff');
                $this->db->order_by('_seniority','ASEC');
            }
            
           
        }else{
            $this->db->where('_status','approved');
            $this->db->where('_role!=','nonteachingstaff');
            $this->db->order_by('_dateofjoin','ASEC');
        }
        $query = $this->db->table('_basic_teacher_registration')->get();
        $ans = array();
        if($query->num_rows()>0){
            $ans = $query->getResultArray();
        }
        return $ans;
    }

    function get_teacher_data_by_id($id){
        $this->db->where('_teacher_id',$id);
        $query = $this->db->table('_basic_teacher_registration')->get();
        $ans = array();
        foreach($query->getResultArray() as $row){
            if($row['_imgloc'] == ""){
                $row['_imgloc'] = 'assets/images/default.jpg';
            }
            $ans = $row;
        }
        return $ans;
    }

    function get_all_officestaff_list($val=""){
       
            $this->db->where('_status','approved');
            $this->db->where('_role','nonteachingstaff');
            $this->db->where('_department','0');
            $this->db->order_by('_order','DESC');
        
        $query = $this->db->table('_basic_teacher_registration')->get();
        $ans = array();
        if($query->num_rows()>0){
            $ans = $query->getResultArray();
        }
        return $ans;
    }

    function get_dept_non_lists(){
        $ans = array();
        $query = $this->db->table('_departments')->get();
        $i=0;
        foreach($query->getResultArray() as $row){
            $row['_staff_list'] = $this->get_non_list_bydept($row['_dep_id']);
            $ans[$i++] = $row;
        }
        return $ans;
    }

    function get_non_list_bydept($deptid){
        $this->db->select('br.*,dept.*');
        $this->db->where('br._department',$deptid);
        $this->db->where('br._role!=','teacher');
        $this->db->where('br._status','approved');
        $this->db->join('_departments as dept','dept._dep_id = br._department','left');
        $this->db->order_by('br._order','DESC');
        $query = $this->db->table('_basic_teacher_registration as br')->get();
        $ans = array();
        if($query->num_rows()>0){
            $ans = $query->getResultArray();
        }
        return $ans;
    }

    function delete_our_management_image($id) {
        $tem = $this->db->select('_imgloc')->where('_id', $id)->get('_our_management')->getRowArray()['_imgloc'];
        if($tem != "") {
            unlink(FCPATH . $tem);
            $this->db->where('_id', $id);
            $this->db->set('_imgloc', '');
            $this->db->update('_our_management');
        }
    }

    function insert_teacher_bussinessdta($updata)
    {
        $this->db->table('_teachers')->insert($updata);
    }

    function update_teacher_bussinessdta($updata,$id)
    {
        $this->db->where('_teacher_id', $id);
        $this->db->table('_basic_teacher_registration')->update($updata);
    }

    function delete_teacher_bussinessdta($id)
    {
        $this->db->where('_teacher_id',$id);
        $query = $this->db->table('_basic_teacher_registration')->get();
        if($query->num_rows()>0){
            $details = $query->getResultArray()[0];
            $array = array(
                '_login_status'=>'deleted'
            );
            $this->db->where('_id',$details['_login_id']);
            $this->db->table('_login')->update($array);
        }
        
        $this->db->where('_teacher_id',$id);
        $this->db->table('_basic_teacher_registration')->delete();
    }

    function delete_teacher_bussinesimage($id)
    {
        $this->db->select('_imgloc')->from('_teachers');
        $this->db->where('_id', $id);
        $this->db->delete();
    }

    function get_data_details_dep()
    {
        $query= $this->db->table('_departments')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        return[];
    }

    function get_bussiness_dept_teachers_home()
    {
        $this->db->where('_department','Bussiness Administration');
        $this->db->where('_status','approved');
        $this->db->order_by('_order','ASC');
        $query=$this->db->table('_basic_teacher_registration')->get();

        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        return[];
    }

    function get_bussiness_dept_teachers()
    {
        $this->db->where('_department','Bussiness Administration');
        $this->db->where('_status','approved');
        $this->db->order_by('_order','ASC');
        $query=$this->db->table('_basic_teacher_registration')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        return[];
    }

    function get_bca_dept_computer()
    {
        $this->db->where('_department','Computer Application');
        $this->db->where('_status','approved');
        $this->db->order_by('_order','ASC');
        $query=$this->db->table('_basic_teacher_registration')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        return[];
    }

    function get_bca_dept_computer_home()
    {
        $this->db->where('_status','approved');
        $this->db->order_by('_order','ASC');
        $this->db->where('_department','Computer Application');
        $query=$this->db->table('_basic_teacher_registration')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        return[];
    }

    function get_electr_dept_teachers()
    {
        $this->db->where('_department','electronics');
        $this->db->where('_status','approved');
        $this->db->order_by('_order','ASC');
        $query=$this->db->table('_basic_teacher_registration')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        return[];
    }

    function get_teach_dat_by_dept($department)
    {
        $this->db->where('_department',$department);
        $this->db->where('_role','teacher');
        $this->db->where('_status','approved');
        $this->db->order_by('_order','ASC');
        $query = $this->db->table('_basic_teacher_registration')->get();
        $ans = array();
        foreach($query->getResultArray() as $row){
            $row['array_paper_published'] = $this->get_paper_published_details($row['_teacher_id']);
            $row['_profile_pic'] = base_url('assets/images/avatar.png');
            if($row['_imgloc'] != ""){
                $row['_profile_pic'] = base_url($row['_imgloc']);
            }

            $row['_department_name']= $this->get_department_name_by_id($row['_department']);

            $ans[$row['_teacher_id']] = $row;
        }
        return $ans;
    }

    function get_department_name_by_id($id)
    {
        $this->db->where('_dep_id',$id);
        $query=$this->db->table('_departments')->get();
        if($query->num_rows > 0)
        {
            return $query->getResultArray()[0]['_dep_name'] ?? ""; // Assuming it was _dep_name or similar
        }
        return "";
    }

}
