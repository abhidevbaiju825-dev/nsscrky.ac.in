<?php
namespace App\Models;
use CodeIgniter\Model;

class Principalmodel extends Model{

 public function approve_alumnilogin($data,$id){
     $this->db->where('_id',$id);
     $this->db->table('_login')->update($data);
 } 
public function approve_alumni_registration($adata,$id){
     $this->db->where('_login_id',$id);
     $this->db->table('_alumini_members')->update($adata);  
}  
    function get_alumni_data_bylid($login_id){
        $this->db->where('_login_id',$login_id);
        $this->db->select('_id');
        return $query = $this->db->table('_alumini_members')->get()->getRow();
       
    }
    function get_alumni_registration($id)
    {
        $this->db->where('_login_id',$id);
        return $query=$this->db->table('_alumini_members')->get()->getRow();
        
    }
function get_alumniprofile($id){
    $this->db->where('_id',$id);
        return $query=$this->db->table('_alumini_members')->get()->getRow();
        
}
function updateAlumini($data,$alumniId){
   $this->db->where('_id',$alumniId); 
    $this->db->table('_alumini_members')->update($data);
}
function insert_userdata($user){
    $this->db->table('_login')->insert($user);
    return $this->db->insert_id();
}
    function insert_principal_registration($data){
         $this->db->table('_basic_teacher_registration')->insert($data);
    }

    function insert_principaldesk($updata)
    {
        $this->db->table('_principal_desk')->insert($updata);
    }

    function get_principal_details(){

        $query=$this->db->table('_principal_desk')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return[];
    }

    function get_principal(){
       $this->db->order_by('_id','desc')->limit(1);
       return $query=$this->db->table('_principal_desk')->get()->getRow();

        
    }

    function get_principal_details_withid($id)
    {
        $this->db->where('_id',$id);
        $query=$this->db->table('_principal_desk')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return[];
    }

    function update_principaldesk($updata,$id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_principal_desk')->update($updata);
    }

    function delete_principaldesk($id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_principal_desk')->delete();
    }

    function delete_principaldesk_img($id) {
        $tem = $this->db->select('_imgloc')->where('_id', $id)->get('_principal_desk')->getRowArray()['_imgloc'];
        if($tem != "") {
            unlink(FCPATH . $tem);
            $this->db->where('_id', $id);
            $this->db->set('_imgloc', '');
            $this->db->update('_principal_desk');
        }
    }

}
