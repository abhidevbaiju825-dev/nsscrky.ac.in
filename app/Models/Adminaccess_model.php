<?php
namespace App\Models;
use CodeIgniter\Model;

class Adminaccess_model extends Model{
	function get_gallery_dept_id($id)
    {
        $this->db->where('_gallery_id',$id);
        $this->db->where('_gallery_name','DepartmentGallery');
        $query=$this->db->table('_gallery_index')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
    }
    function get_gallery_event(){
        $this->db->where('_gallery_name','EventGallery');
        $query=$this->db->table('_gallery_index')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
    }
    function get_slide_gallery_event(){
        $this->db->where('_gallery_name','SlideGallery');
        $query=$this->db->table('_gallery_index')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return[];
    }
    function get_slide_gallery_event_id($id)
    {
        $this->db->where('_gallery_id',$id);
        $this->db->where('_gallery_name','SlideGallery');
        $query=$this->db->table('_gallery_index')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return[];
    }
    function get_program_gall(){
        $this->db->where('_gallery_name','ProgramGallery');
        $query=$this->db->table('_gallery_index')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
    }
    function get_program_gall_id($id)
    {
        $this->db->where('_gallery_id',$id);
        $this->db->where('_gallery_name','ProgramGallery');
        $query=$this->db->table('_gallery_index')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
    }
    function update_gallery_index($updata,$id)
    {
        $this->db->where('_gallery_id',$id);
        $this->db->table('_gallery_index')->update($updata);
    }
    function delete_gallery_index($id){
        $this->db->where('_gallery_id',$id);
        $this->db->table('_gallery_index')->delete();
    }
    function get_former_principal()
    {
        $query=$this->db->table('_former_principal')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
    }
    function get_former_principalData()
    {
        $this->db->order_by("_from_date", "desc");
        $query=$this->db->table('_former_principal')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
    }

    function insert_former_principal($updata)
    {
        $this->db->table('_former_principal')->insert($updata);
    }
    function get_former_principal_withid($id)
    {
        $this->db->where('_id',$id);
        $query=$this->db->table('_former_principal')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
    }
    function update_former_principal($updata,$id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_former_principal')->update($updata);
    }
    function delete_former_princripal_img($id)
    {
        $this->db->select('_imgloc');
        $this->db->where('_id', $id);
        $row = $this->db->table('_former_principal')->get()->getRow();
        $tem = $row ? $row->_imgloc : '';
        if($tem!=""){
            $path=$this->config->base_url($tem);
            unlink(FCPATH.$tem);
            $data = [
                '_imgloc' => ''
            ];
            $this->db->where('_id', $id);
            $this->db->table('_former_principal')->update($data);
        }
    }
    function delete_former_princripal($id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_former_principal')->delete();
    }
    function insert_our_management($updata)
    {
        $this->db->table('_our_management')->insert($updata);
    }

    function get_our_management()
    {
        $query=$this->db->table('_our_management')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return[];

    }
    function get_our_management_withid($id)
    {
        $this->db->where('_id',$id);
        $query=$this->db->table('_our_management')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
    }
    function update_our_management($updata,$id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_our_management')->update($updata);
    }
    function delete_our_management($id){
        $this->db->where('_id',$id);
        $this->db->table('_our_management')->delete();
    }
    function insert_our_team($updata)
    {
        $this->db->table('_our_team')->insert($updata);
    }
    function get_our_team()
    {
        $query=$this->db->order_by('_id','ASC')->limit(4)->get('_our_team');

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return[];
    }
    function get_our_team_with_id($id)
    {
        $this->db->where('_id',$id);
        $query=$this->db->table('_our_team')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
    }
    function update_our_team($updata,$id){
        $this->db->where('_id',$id);
        $this->db->table('_our_team')->update($updata);
    }

    function delete_our_team($id){
        $this->db->where('_id',$id);
        $this->db->table('_our_team')->delete();
    }
    function delete_our_team_img($id)
    {
        $this->db->select('_imgloc');
        $this->db->where('_id', $id);
        $row = $this->db->table('_our_team')->get()->getRow();
        $tem = $row ? $row->_imgloc : '';
        if($tem!=""){
            $path=$this->config->base_url($tem);
            unlink(FCPATH.$tem);
            $data = [
                '_imgloc' => ''
            ];
            $this->db->where('_id', $id);
            $this->db->table('_our_team')->update($data);
        }
   }
    //college counsil starts
    function insert_counsil_images($updata){
        $this->db->table('_counsil_incharge')->insert($updata);
    }
    function get_counsil_images(){
        $query=$this->db->table('_counsil_incharge')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return[];
    }
    function get_counsil_images_id($id)
    {
        $this->db->where('_id', $id);
        $query=$this->db->table('_counsil_incharge')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
    }
    function update_college_counsil($updata,$id)
    {
        $this->db->where('_id', $id);
        $this->db->table('_counsil_incharge')->update($updata);
    }
    function delete_college_counsil($id)
    {
        $this->db->where('_id', $id);
        $this->db->table('_counsil_incharge')->delete();
    }
    function delete_college_counsil_img($id){
        $this->db->select('_imgloc');
        $this->db->where('_id', $id);
        $row = $this->db->table('_counsil_incharge')->get()->getRow();
        $tem = $row ? $row->_imgloc : '';
        if($tem!=""){
            $path=$this->config->base_url($tem);
            unlink(FCPATH.$tem);
            $data = [
                '_imgloc' => ''
            ];
            $this->db->where('_id', $id);
            $this->db->table('_counsil_incharge')->update($data);
        }
    }
    function insert_counsil_members($updata){
        $this->db->table('_counsil_members')->insert($updata);
    }
    function get_counsil_members()
    {
        $query=$this->db->table('_counsil_members')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return[];

    }
    
    function get_counsil_members_id($id)
    {
        $this->db->where('_id', $id);
        $query=$this->db->table('_counsil_members')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
    }
    function update_counsil_members($updata,$id)
    {
        $this->db->where('_id', $id);
        $this->db->table('_counsil_members')->update($updata);
    }
    function delete_counsil_members($id)
    {
        $this->db->where('_id', $id);
        $this->db->table('_counsil_members')->delete();
    }
    function delete_counsil_member_img($id){
        $this->db->select('_imgloc');
        $this->db->where('_id', $id);
        $row = $this->db->table('_counsil_members')->get()->getRow();
        $tem = $row ? $row->_imgloc : '';
        if($tem!=""){
            $path=$this->config->base_url($tem);
            unlink(FCPATH.$tem);
            $data = [
                '_imgloc' => ''
            ];
            $this->db->where('_id', $id);
            $this->db->table('_counsil_members')->update($data);
        }
    }
    function insert_iqac($updata)
    {
        $this->db->table('_iqac_report')->insert($updata);
    }
    
    function get_iqac_report_id($id)
    {
        $this->db->where('_id', $id);
        $query=$this->db->table('_iqac_report')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return [];
    }
    function update_iqac($updata,$id)
    {
        $this->db->table('_iqac_report')->update($updata);
    }
    function delete_iqac($id){
        $this->db->where('_id', $id);
        $this->db->table('_iqac_report')->delete();
    }
    //nirf
    function insert_nirf($updata)
    {
        $this->db->table('_nirf_reports')->insert($updata);
    }
    function get_nirf_data()
    {
        $query=$this->db->table('_nirf_reports')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
    }
    function get_nirf_data_id($id){
        $this->db->where('_id', $id);
        $query=$this->db->table('_nirf_reports')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
    }
    function update_nirf($updata,$id){
        $this->db->where('_id', $id);
        $this->db->table('_nirf_reports')->update($updata);
    }
    function delete_nirf($id){
        $this->db->where('_id', $id);
        $this->db->table('_nirf_reports')->delete();
    }
    function insert_naac_journey($updata)
    {
        $this->db->table('_naac_journey')->insert($updata);
    }
    function get_naac_jouerney_data(){
        $query=$this->db->table('_naac_journey')->get();
        if( $query->num_rows()>0 ){
            return $query->getResultArray();
        }
		return[];
    }
    function get_naac_jouerney_data_id($id)
    {
        $this->db->where('_id', $id);
        $query=$this->db->table('_naac_journey')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
    }
    function update_naac_journey($updata,$id){
        $this->db->where('_id', $id);
        $this->db->table('_naac_journey')->update($updata);
    }
    function delete_naac_journey($id){
        $this->db->where('_id', $id);
        $this->db->table('_naac_journey')->delete();
    }
    function insert_naac_cordinators($updata)
    {
        $this->db->table('_naac_cordinators')->insert($updata);
    }
    function get_naac_cordinator_data()
    {    $query=$this->db->table('_naac_cordinators')->get();
	     if( $query->num_rows()>0 )
	     {
	         return $query->getResultArray();
	     }
	     return[];
    }
    function get_naac_cordinator_data_id($id){
        $this->db->where('_id', $id);
        $query=$this->db->table('_naac_cordinators')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
    }
    function update_naac_cordinators($updata,$id){
        $this->db->where('_id', $id);
        $this->db->table('_naac_cordinators')->update($updata);
    }
    function delete_naac_cordinators($updata,$id)
    {
        $this->db->where('_id', $id);
        $this->db->table('_naac_cordinators')->delete();
    }
    function insert_naac_cerificate($updata){
        $this->db->table('_naac_certificates')->insert($updata);
    }
    function get_naac_certificates()
    {
        $query=$this->db->table('_naac_certificates')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return [];
    }
    function get_naac_certificates_id($id)
    {
        $this->db->where('_id', $id);
        $query=$this->db->table('_naac_certificates')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return [];
    }
    function update_naac_cerificate($updata,$id){
        $this->db->where('_id', $id);
        $this->db->table('_naac_certificates')->update($updata);
    }
    function insert_alumini_activities($updata)
    {
        $this->db->table('_alumini_activity')->insert($updata);
    }
    function get_alumini_activcities()
    {
        $query=$this->db->order_by('_id','DESC')->get('_alumini_activity');
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return [];
    }
    function get_alumini_activcities_id($id)
    {
        $this->db->where('_id', $id);
        $query=$this->db->table('_alumini_activity')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return [];
    }
    function update_alumini_activities($updata,$id){
        $this->db->where('_id', $id);
        $this->db->table('_alumini_activity')->update($updata);
    }
    function delete_alumini_activities($id){
        $this->db->where('_id', $id);
        $this->db->table('_alumini_activity')->delete();
    }
    function insert_alumini_members($updata){
        $this->db->table('_alumini_members')->insert($updata);
    }
    function get_alumini_members()
    {
        $query=$this->db->table('_alumini_members')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return [];
    }
    function get_alumini_members_id($id){
        $this->db->where('_id', $id);
        $query=$this->db->table('_alumini_members')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
    }
    function update_alumini_members($updata,$id){
        $this->db->where('_id', $id);
        $this->db->table('_alumini_members')->update($updata);
    }
    function delete_alumini_members($id)
    {
        $this->db->where('_id', $id);
        $this->db->table('_alumini_members')->delete();
    }
    function insert_about_alumini($updata)
    {
        $this->db->table('_about_alumini')->insert($updata);
    }
    public function get_about_alumini()
    {
        $query=$this->db->table('_about_alumini')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return [];
    }
    function get_about_alumini_id($id){
        $this->db->where('_id', $id);
        $query=$this->db->table('_about_alumini')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return [];
    }
    function update_about_alumini($id,$updata){
        $this->db->where('_id', $id);
        $this->db->table('_about_alumini')->update($updata);
    }
    function delete_about_alumini($id){
        $this->db->where('_id', $id);
        $this->db->table('_about_alumini')->delete();
    }
    function insert_magazine($updata)
    {
        $this->db->table('_magazine')->insert($updata);
    }
    function get_magazine_data()
    {
        $query=$this->db->table('_magazine')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return [];
    }
    function get_magazine_data_id($id)
    {
        $this->db->where('_id', $id);
        $query=$this->db->table('_magazine')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return [];
    }
    function update_magazine($updata,$id){
        $this->db->where('_id', $id);
        $this->db->table('_magazine')->update($updata);
    }
    function delete_magazine($id){
        $this->db->where('_id', $id);
        $this->db->table('_magazine')->delete();
    }
    function insert_clubandcells($updata){
        $this->db->table('_clubandcells')->insert($updata);
        return $this->db->insert_id();
    }
    function get_clubandcells()
    {
        $this->db->select('cs.*,dept._department_name,_dep_id');
        $this->db->join('_departments as dept','dept._dep_id = cs._dept_id','left');
        $query=$this->db->table('_clubandcells as cs')->get();
        $ans = array();
        $i=0;
        foreach($query->getResultArray() as $row){
            if($row['_imgloc'] == ""){
                $row['_imgloc'] = 'uploads/static/bg_default.png';
            }
            $ans[$i++] = $row;
        }
        return $ans;
    }

    function get_clubandcells_id($id){
        $this->db->where('_id', $id);
        $query=$this->db->table('_clubandcells')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return [];
    }
    function update_clubandcells($updata,$id){
        $this->db->where('_id', $id);
        $this->db->table('_clubandcells')->update($updata);
    }
    function get_club_activity_id($id){
        $this->db->where('_id', $id);
        $query=$this->db->table('_clubactivity')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return [];
    }
    function update_club_activity($updata,$id){
        $this->db->where('_id', $id);
        $this->db->table('_clubactivity')->update($updata);
    }
    
    function insert_anti_ragging($updata){
        $this->db->table('_antiraggingcell')->insert($updata);
    }
    function get_anti_ragging_cell()
    {
        $query=$this->db->table('_antiraggingcell')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return [];
    }
    function get_anti_ragging_cell_id($id){
        $this->db->where('_id', $id);
        $query=$this->db->table('_antiraggingcell')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return [];
    }
    function update_anti_ragging($updata,$id){
        $this->db->where('_id', $id);
        $this->db->table('_antiraggingcell')->update($updata);
    }
    function delete_anti_ragging($id){
        $this->db->where('_id', $id);
        $this->db->table('_antiraggingcell')->delete();
    }
    function insert_downloads($updata){
        $this->db->table('_web_downloads')->insert($updata);
    }
    
    function edit_downloads($id){
        $this->db->where('_web_downloads_id', $id);
        $query=$this->db->table('_web_downloads')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return [];
    }
    function update_downloads($updata,$id)
    {
        $this->db->where('_web_downloads_id', $id);
        $this->db->table('_web_downloads')->update($updata);
    }
    function delete_downloads($id){
        $this->db->where('_web_downloads_id', $id);
        $this->db->table('_web_downloads')->delete();
    }
    function insert_greivence_cell($updata)
    {
        $this->db->table('_geivence_cell')->insert($updata);
    }
    function get_greivence_cell()
    {
        $query=$this->db->table('_geivence_cell')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return [];
    }
    function get_greivence_cell_id($id)
    {
        $this->db->where('_id', $id);
        $query=$this->db->table('_geivence_cell')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return [];
    }
    function update_greivence_cell($updata,$id){
        $this->db->where('_id', $id);
        $this->db->table('_geivence_cell')->update($updata);
    }
    function delete_greivence_cell($id){
        $this->db->where('_id', $id);
        $this->db->table('_geivence_cell')->delete();
    }
    
    function get_coursesat_withid($id,$staff_id)
    {
      $this->db->where('_docfrom_id',$id);
      $this->db->where('_type',"Courses Attended");
      $this->db->where('_teacher_id',$staff_id);
	    $query = $this->db->table('_teacher_documents')->get();
	    if($query->num_rows()>0){
	        return $query->getResultArray();
	    }
    }
    
	
    
	
    
    
    
    
	
    function update_alumni_edu($data){
        $this->db->table('_alumni_edu')->insert($data);
    }
  function  update_alumni_working($data){
        $this->db->table('_alumni_working')->insert($data);
    }
	function  update_alumni_acheivement($data){
        $this->db->table('_alumni_achievements')->insert($data);
    }
    
    function get_testimonial($id){
        $this->db->where('_login_id',$id);
        $query = $this->db->table('_alumini_members')->get()->getResultArray();
        return $query;
    }
    function insert_rank($data,$id){
        $this->db->where('_login_id',$id);
        $this->db->table('_alumini_members')->update($data);
    }
    
    
    function get_alumini_test(){
        $this->db->order_by('_testimonial_rank');
        $this->db->where('_testimonial_rank !=',"");
        return $this->db->table('_alumini_members')->get()->result();
    }
    function get_teacher_detailss($id){
        $this->db->where('_login_id',$id);
        return $this->db->table('_basic_teacher_registration')->get()->getRow();
    }
    
    function get_department_acreport(){
        return $this->db->table('_activity_reports')->get()->getResultArray();
    }
    
    
    
        function get_downloads(){
        $query=$this->db->order_by('_order','ASC')->get('_web_downloads');
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return [];
    }
    function get_dept_report($id){
        $this->db->where('_deptid',$id);
       return $this->db->table('_activity_reports')->get()->getResultArray(); 
    }
    function delete_club_activity($id)
    {
        $this->db->where('_id', $id);
        $this->db->table('_clubactivity')->delete();

    }
    function insert_ncc_members($data){
        $this->db->table('_ncc_incharge_member')->insert($data);
        return $this->db->insert_id();
    }
    function view_ncc_mem_details(){
        $this->db->select('*');
        return $this->db->table('_ncc_incharge_member')->get()->getResultArray();
    }
    function view_ncc_mem_details_by_id($id){
        $this->db->select('*');
        $this->db->where('_ncc_id',$id);
        return $this->db->table('_ncc_incharge_member')->get()->getRow();
    }
    function delete_ncc_mem_image_by_id($id){
        $this->db->select('_profile_pic');
        $this->db->where('_ncc_id', $id);
        $row = $this->db->table('_ncc_incharge_member')->get()->getRow();
        $tem = $row ? $row->_profile_pic : '';
        if($tem!=""){
            $path=$this->config->base_url($tem);
            unlink(FCPATH.$tem);
            $data = [
                '_profile_pic' => ''
            ];
            $this->db->where('_ncc_id', $id);
            $this->db->table('_ncc_incharge_member')->update($data);
        }
    }
    function update_ncc_members($data,$id){
        $this->db->where('_ncc_id',$id);
        $this->db->table('_ncc_incharge_member')->update($data);
    }
    function delete_ncc_members($id){
        $tem =  $this->db->query("SELECT `_profile_pic` FROM `_ncc_incharge_member`  WHERE `_ncc_id` = '".$id."' ")->getRowArray()['_profile_pic'];
        if($tem!=""){
            $path=$this->config->base_url($tem);
            unlink(FCPATH.$tem);
            $this->db->where('_ncc_id', $id);
            $this->db->table('_ncc_incharge_member')->delete();
        }else{
            $this->db->where('_ncc_id', $id);
            $this->db->table('_ncc_incharge_member')->delete();
        }
    }
    //NEW FUNCTIONS 20-05-2019
    function get_alumini_incharges(){
        $this->db->order_by('_id','DESC')->limit(2);
        return $this->db->table('_alumni_incharges')->get()->getResultArray();
    }
    function get_inchargesNss(){
        return $this->db->table('_nss_incharges')->get()->getResultArray();
    }
    
//NEW FUNCTIONS 21-05-2019
    function insertClubdesig($array){
        $this->db->table('_clubcell_desigwithrank')->insert($array);
    }
    
    function get_desigWithrankByid($id){
        $this->db->where('_clubcell_id',$id);
        return $this->db->table('_clubcell_desigwithrank')->get()->getResultArray();
    }
    function updateClubdesig($array,$desigID){
        if($desigID !=""){
            $this->db->where('_id',$desigID);
            $this->db->table('_clubcell_desigwithrank')->update($array);
        }else{
            $this->db->table('_clubcell_desigwithrank')->insert($array);
        }
        
    }
}
