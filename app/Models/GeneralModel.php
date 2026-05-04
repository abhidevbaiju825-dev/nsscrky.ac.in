<?php
namespace App\Models;
use CodeIgniter\Model;

class GeneralModel extends Model {

    function get_counsil_members()
    {
        $query=$this->db->table('_counsil_members')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return[];

    }

    function delete_downloadsimg($id) {
        $tem = $this->db->select('_pdfloc')->where('_web_downloads_id', $id)->get('_web_downloads')->getRowArray()['_pdfloc'];
        if ($tem != "") {
            unlink(FCPATH . $tem);
            $data = [
                '_pdfloc' => ''
            ];
            $this->db->where('_web_downloads_id', $id);
            $this->db->table('_web_downloads')->update( $data);
        }
    }

    function get_ncc_club_mem(){
        $this->db->select('*');
        return $this->db->table('_ncc_incharge_member')->get()->getResultArray();
    }

    function get_year(){
        $this->db->select('_year');
        $this->db->group_by('_year');
        $this->db->order_by('_year','DESC');
        $query = $this->db->table('_placementdetails')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        return[];
    }

    function saveComplaintForm($data){
 return $this->db->table('_student_grievance_cell')->insert($data);
}

    function delete_club_activities_image($id) {
        $tem = $this->db->select('_imgloc')->where('_id', $id)->get('_clubactivity')->getRowArray()['_imgloc'];
        if ($tem != "") {
            unlink(FCPATH . $tem);
            $data = [
                '_imgloc' => ''
            ];
            $this->db->where('_id', $id);
            $this->db->table('_clubactivity')->update( $data);
        }
    }

    function get_club_event_details($id)
    {
        $this->db->where('_club_and_cell_id',$id);
        $query=$this->db->table('_clubancells_newsandevents')->get();
        if($query->num_rows()>0)
        {
            return $query->getResultArray();
            
        }
        return[];
        
    }

    function get_gallery_details($id)
    {
        $this->db->select('*');
        $this->db->where('club_id',$id); 
        $this->db->where('_club_gallery','club');
        $query =$this->db->table('_galleryalbum')->get();
        return $query->getResultArray();
    }

    function get_gallery_images_on_clubs($id)
    {
        $this->db->select('*');
        $this->db->where('_albumid',$id);
        return $this->db->table('_gallery')->get()->getResultArray();
    }

    function get_department_activity($id){
        $this->db->select('*');
        $this->db->where('_dept_id',$id);
        return $this->db->table('_department_activity')->get()->getResultArray();
    }

    function get_full_department(){
        $this->db->select('*');
        return $this->db->table('_departments')->get()->getResultArray();
    }

    function get_department_list(){ 
        $query = $this->db->table('_departments')->get();
        $ans = array();
        if($query->num_rows()>0){
            $ans = $query->getResultArray();
        }
        return $ans;
    }

    function get_dept(){
       return  $this->db->table('_departments')->get()->getResultArray();
    }

    function get_dutytype(){
        return $this->db->table('_duty_type')->get()->result();
    }

    function get_notice()
    {
        return $this->db->table('_notice')->orderBy('_id', 'ASC')->get()->getResultArray();
    }

    function get_noticeh_bydate()
    {
        return $this->db->table('_notice')->orderBy('_important', 'DESC')->where('DATE(_exp_date) >=', date('Y-m-d'))->get()->getResultArray();
    }

    function insert_notice($updata)
    {
        $this->db->table('_notice')->insert($updata);
    }

    function get_notice_id($id)
    {
        $this->db->where('_id',$id);
        $query=$this->db->table('_notice')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return[];
    }

    function update_notice($updata,$id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_notice')->update($updata);
    }

    function delete_notice($id)
    {


            $this->db->where('_id',$id);
            $this->db->table('_notice')->delete();


    }

    function get_activity($id){
      $this->db->where('_id',$id);
        return $query = $this->db->table('_clubactivity')->get()->getRow();
    }

    function get_department_activityByid($id){
         $this->db->select('*');
            $this->db->where('_id',$id);
            return $this->db->table('_department_activity')->get()->getRow();
    }

    function get_coursetype(){
        return $query = $this->db->table('_course_type')->get()->result();
    }

    function get_journaltype(){
        return $query = $this->db->table('_journel_type')->get()->result();
    }

    function get_clubtype(){
        return $query = $this->db->table('_club_list')->get()->result();
    }

    function get_desigtype(){
        return $query = $this->db->table('_club_designation')->get()->result();
    }

    /**
     * Get all events.
     * Migrated from legacy Mainmodel.
     */
    public function get_events() {
        return $this->db->table('_events')->get()->getResultArray();
    }

    /**
     * Get event details by ID.
     * Migrated from legacy Mainmodel.
     */
    public function get_events_withid($id) {
        $this->db->where('_id', $id);
        return $this->db->table('_events')->get()->row_array();
    }

    /**
     * Insert a new event.
     * Migrated from legacy Mainmodel.
     */
    public function insert_events($data) {
        $this->db->table('_events')->insert( $data);
    }

    /**
     * Get magazine data.
     * Migrated from legacy Mainmodel.
     */
    public function get_magazine_data() {
        return $this->db->table('_magazine')->get()->getResultArray();
    }
}
