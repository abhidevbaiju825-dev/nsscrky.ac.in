<?php
namespace App\Models;
use CodeIgniter\Model;

class Alumnimodel extends Model{

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
function get_edudetails($id){
        $this->db->where('_alumni_id',$id);
        return $query=$this->db->table('_alumni_edu')->get()->result();
}
function get_working($id){
        $this->db->where('_alumni_id',$id);
        return $query=$this->db->table('_alumni_working')->get()->result();
}
function get_other_achievements($id){
        $this->db->where('_alumni_id',$id);
        return $query=$this->db->table('_alumni_achievements')->get()->result();
}
function updateAlumini($data,$alumniId){
   $this->db->where('_id',$alumniId); 
    $this->db->table('_alumini_members')->update($data);
}
    function update_alumni_edu($data,$id){
//        $this->db->where('_edu_id',$id);
//        $this->db->table('_alumni_edu')->update($data);
        if($id['id'] !=""){
            $this->db->where('_edu_id',$id['id']);
            if($this->db->table('_alumni_edu')->update($data)){
                return true;
            }else{
                return false;
            }
        }else{
            $this->db->table('_alumni_edu')->insert($data);
            return $this->db->insert_id();
        }
    }
    
function update_alumni_working($data,$id){
        if($id['id'] !=""){
            $this->db->where('_working_id',$id['id']);
            if($this->db->table('_alumni_working')->update($data)){
                return true;
            }else{
                return false;
            }
        }else{
            $this->db->table('_alumni_working')->insert($data);
            return $this->db->insert_id();
        }
    }
function update_alumni_other($data,$id){
        if($id['id'] !=""){
            $this->db->where('_achievement_id',$id['id']);
            if($this->db->table('_alumni_achievements')->update($data)){
                return true;
            }else{
                return false;
            }
        }else{
            $this->db->table('_alumni_achievements')->insert($data);
            return $this->db->insert_id();
        }
    }
    function delete_edu($id){
        $this->db->where('_edu_id',$id);
         $this->db->table('_alumni_edu')->delete();
    }
    function get_alumni_details_by_id($alumni_log_id){
        $this->db->where('_login_id',$alumni_log_id);
       return  $this->db->table('_alumini_members')->get()->getRow();
    }
    function update_details($data,$id){
        $this->db->where('_id',$id);
        $this->db->table('_alumini_members')->update($data);
    }
    function remove_working($id){
        $this->db->where('_working_id',$id);
            if($this->db->table('_alumni_working')->delete()){
                return true;
            }else{
                return false;
            }
    }
    function remove_other($id){
        $this->db->where('_achievement_id',$id);
            if($this->db->table('_alumni_achievements')->delete()){
                return true;
            }else{
                return false;
            }
    }
    function getalumni($id){
        $this->db->where('_login_id',$id);
       return  $this->db->table('_alumini_members')->get()->getRow();
    }
    function delete_alumni_registration($id){
        $this->db->where('_id',$id);
        $this->db->table('_alumini_members')->delete();
        
        $this->db->where('_alumni_id',$id);
        $this->db->table('_alumni_achievements')->delete();
        
        $this->db->where('_alumni_id',$id);
        $this->db->table('_alumni_working')->delete();
        
        $this->db->where('_alumni_id',$id);
        $this->db->table('_alumni_edu')->delete();
    }
    function delete_alumni_login($id){
        $this->db->where('_id',$id);
        $this->db->table('_login')->delete();
    }
    function get_alumni_detailss($id){
        $this->db->where('_login_id',$id);
        return $this->db->table('_alumini_members')->get()->getRow();
    }

    function insertAlumini($data){

        $this->db->table('_alumini_members')->insert($data);
//        return true;
        return $this->db->insert_id();
    }

    function get_alumni_activityByid($id){
        $this->db->where('_id',$id);
        return $this->db->table('_alumini_activity')->get()->getRow();
    }

    function get_alumini_data_by_id($id){
        $this->db->where('_id',$id);
        $query = $this->db->table('_alumini_members')->get();
        $ans = array();
        foreach($query->getResultArray() as $row){
            if($row['_imgloc'] == ""){
                $row['_imgloc'] = 'assets/images/default.jpg';
            }
            $ans = $row;
        }
        return $ans;
    }

    function getac($id){
       
//        print_r($sid);exit;
        $this->db->where('_staf_id',$id);
       return $this->db->table('_taecher_qualification')->get()->getResultArray();  
    }

}
