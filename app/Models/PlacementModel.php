<?php
namespace App\Models;
use CodeIgniter\Model;

class PlacementModel extends Model {

    function get_placement()
    {
        $query = $this->db->table('_placement')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        return[];
    }

    function get_placement_data_19()
    {
        $this->db->where('_year','2018-2019');
        $query = $this->db->table('_placementdetails')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        return[];
    }

    function get_placement_data_18()
    {
        $this->db->where('_year','2017-2018');
        $query = $this->db->table('_placementdetails')->get();

        if($query->num_rows()>0){

            return $query->getResultArray();
        }
        return[];

    }

    function get_placement_data_17()
    {
        $this->db->where('_year','2016-2017');
        $query = $this->db->table('_placementdetails')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        return[];
    }

    function get_placement_data_all()
    {
        $query = $this->db->table('_placementdetails')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        return[];
    }

    function get_placement_description(){
        $this->db->select('*');
        return $this->db->table('_placement_description')->get()->getResultArray();
    }

    function get_edit_placement_description($id){
        $this->db->select('*');
        $this->db->where('_id',$id);
        return $this->db->table('_placement_description')->get()->getRow();
    }

    function update_placement_description($data,$id){
        $this->db->where('_id',$id);
        if($this->db->table('_placement_description')->update($data)){
            return true;
        }else{
            return false;
        }
    }

    function get_placement_data_16()
    {
        $this->db->where('_year','2015-2016');
        $query = $this->db->table('_placementdetails')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        return[];
    }

    function get_placement_data_15()
    {
        $this->db->where('_year','2014-2015');
        $query = $this->db->table('_placementdetails')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
        return[];
    }

    function get_placement_with_id($id)
    {
        $this->db->where('_id',$id);
        $query = $this->db->table('_placement')->get();
        if($query->num_rows()>0){
            return $query->getResultArray()[0];
        }
        return[];
    }

    function insert_placement($data)
    {
        $this->db->table('_placement')->insert($data);
    }

    function update_placement($data,$id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_placement')->update($data);

    }

    function delete_placement($id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_placement')->delete();

    }

    function get_students_data_desc()
    {
        $query = $this->db->order_by('_id','DESC')->get('_placementdetails');
        if($query->num_rows()>0){
            return $query->getResultArray();
        }



    }

    function get_students_data(){
        $this->db->order_by('_id','DESC');
        $query = $this->db->table('_placementdetails')->get();
        if($query->num_rows()>0){
            return $query->getResultArray();
        }
    }

    function get_students_data_id($id)
    {
        $this->db->where('_id',$id);
        $query = $this->db->table('_placementdetails')->get();
        if($query->num_rows()>0){
            return $query->getResultArray()[0];
        }

    }

    function delete_placed_student_img($id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_placementdetails')->delete();

    }

    function delete_placed_student($id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_placementdetails')->delete();
    }

    function insert_placed_student($updata)
    {
        $this->db->table('_placementdetails')->insert(($updata));

    }

    function update_placed_student($updata,$id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_placementdetails')->update($updata);

    }

    function get_placement_incharge()
    {
        // $query=$this->db->order_by('_id','DESC')->limit(1)->get('_placement_incharge');
         $query=$this->db->order_by('_id','DESC')->get('_placement_incharge');
        if($query->num_rows()>0)
        {
            return $query->getResultArray();
        }
        return[];

    }

    function insert_placement_incharge($updata){

        $this->db->table('_placement_incharge')->insert($updata);


    }

    function get_placement_incharge_withid($id)
    {
        $this->db->where('_id',$id);
        $query=$this->db->table('_placement_incharge')->get();

        if($query->num_rows()>0)
        {
            return $query->getResultArray()[0];
        }
        return[];

    }

    function update_placement_incharge($updata,$id){

        $this->db->where('_id',$id);
        $this->db->table('_placement_incharge')->update($updata);


    }

    function delete_placement_incharge($id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_placement_incharge')->delete();
    }

    function get_student_cordinators()
    {
        $query=$this->db->table('_placement_cordinators')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }

    }

    function insert_placement_cordinator($updata)
    {
        $this->db->table('_placement_cordinators')->insert($updata);

    }

    function get_placement_cordinators_withid($id)
    {
        $this->db->where('_id',$id);
        $query=$this->db->table('_placement_cordinators')->get();

        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return[];
    }

    function update_placement_cordinator($updata,$id)
    {
        $this->db->where('_id',$id);
        $this->db->table('_placement_cordinators')->update($updata);

    }

    function delete_placement_cordinator($id)
    {

        $this->db->where('_id',$id);
        $this->db->table('_placement_cordinators')->delete();
    }

}
