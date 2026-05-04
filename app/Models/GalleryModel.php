<?php
namespace App\Models;
use CodeIgniter\Model;

class GalleryModel extends Model {

    function get_gallery(){
        $query = $this->db->table('_galleryalbum')->get();
        $ans = array();
        $i=0;
        foreach($query->getResultArray() as $row){
            $ans[$i]['_id'] = $row['_id'];
            $ans[$i]['_albumname'] = $row['_albumname'];
            $ans[$i]['_imagecount'] = $row['_imagecount'];
            $ans[$i++]['images'] = $this->get_imagesbygid($row['_id']);
        }
        return $ans;
    }

    function get_imagesbygid($gid){
        $this->db->where('_albumid',$gid );
        return $this->db->table('_gallery')->get()->getResultArray();
    }

    function insert_galleryalbum($data){
        $this->db->table('_galleryalbum')->insert($data);
    }

    function get_images_with_albumid($album_id){
        $this->db->where('_albumid',$album_id);
        $query = $this->db->table('_gallery')->get();
        $ans = array();
        $i=0;
        foreach($query->getResultArray() as $row){
            $ans[$i]['_id'] = $row['_id'];
            $ans[$i]['_albumid'] = $row['_albumid'];
            $ans[$i++]['_imgloc'] = $row['_imgloc'];
        }
        return $ans;
    }

    function insert_gallery_image($data) {
        $this->db->table('_gallery')->insert( $data);
        $albumid = $data['_albumid'];
        
        $current_noimg = $this->db->select('_imagecount')->where('_id', $albumid)->get('_galleryalbum')->getRowArray()['_imagecount'];
        $new_count = $current_noimg + 1;
        
        $this->db->set('_imagecount', $new_count);
        $this->db->where('_id', $albumid);
        $this->db->update('_galleryalbum');
    }

    function delete_gallery_image($id, $album_id) {
        $tem = $this->db->select('_imgloc')->where('_id', $id)->get('_gallery')->getRowArray()['_imgloc'];
        if ($tem != "") {
            unlink(FCPATH . $tem);
            $this->db->where('_id', $id);
            $this->db->table('_gallery')->delete();
            
            $albumid = $album_id;
            $current_noimg = $this->db->select('_imagecount')->where('_id', $albumid)->get('_galleryalbum')->getRowArray()['_imagecount'];
            $new_count = $current_noimg - 1;
            
            $this->db->set('_imagecount', $new_count);
            $this->db->where('_id', $albumid);
            $this->db->update('_galleryalbum');
        }
    }

    function get_gallery_withid($id){
        $this->db->where('_id', $id);
        $query = $this->db->table('_galleryalbum')->get();
        $ans = array();
        foreach($query->getResultArray() as $row){
            $ans['_id'] = $row['_id'];
            $ans['_albumname'] = $row['_albumname'];
            $ans['_imagecount'] = $row['_imagecount'];
            $ans['images'] = $this->get_imagesbygid($row['_id']);
        }
        return $ans;
    }

    function update_galleryalbum($data, $id) {
        $imgcount = $this->db->select('_imagecount')->where('_id', $id)->get('_galleryalbum')->getRowArray()['_imagecount'];
        $data['_imagecount'] = $imgcount;
        $this->db->where('_id', $id);
        $this->db->table('_galleryalbum')->update( $data);
    }

    function delete_galleryalbum($album_id) {
        $this->db->where('_albumid', $album_id);
        $query = $this->db->table('_gallery')->get();
        foreach ($query->getResultArray() as $row) {
            $imgid = $row['_id'];
            $tem = $this->db->select('_imgloc')->where('_id', $imgid)->get('_gallery')->getRowArray()['_imgloc'];
            if ($tem != "") {
                unlink(FCPATH . $tem);
                $this->db->where('_id', $imgid);
                $this->db->table('_gallery')->delete();
            }
        }
        $this->db->where('_id', $album_id);
        $this->db->table('_galleryalbum')->delete();
    }

    function get_full_iamge_details(){
        $this->db->select('gal.*,ga.*,dp.*');
        $this->db->join('_galleryalbum as ga','ga._album_id = gal._albumid','left');
        $this->db->join('_departments as dp','dp._dep_id = gal._department_id','left');
        return $this->db->table('_gallery as gal')->get()->getResultArray();
    }

    function get_image_details($id){
        $this->db->select('*');
        $this->db->where('_id',$id);
        return $this->db->table('_gallery')->get()->getRow();
    }

    function insert_album_galery($data){
        $this->db->table('_galleryalbum')->insert($data);
        return $this->db->insert_id();
    }

    function get_album_details(){
        $this->db->select('*');
        return $this->db->table('_galleryalbum')->get()->getResultArray();
    }

    function edit_album_details($id){
        $this->db->select('*');
        $this->db->where('_album_id',$id);
        return $this->db->table('_galleryalbum')->get()->getRow();
    }

    function update_album_galery($data,$id){
        $this->db->where('_album_id',$id);
        if($this->db->table('_galleryalbum')->update($data)){
            return true;
        }else{
            return false;
        }
    }

    function delete_galery_album($id){
        $this->db->where('_album_id',$id);
        if($this->db->table('_galleryalbum')->delete()){
            return true;
        }else{
            return false;
        }
    }

    function insert_album_image($data){
        $this->db->table('_gallery')->insert($data);
        return $this->db->insert_id();
    }

    function update_album_image($data,$id){
        $this->db->where('_id',$id);
        if($this->db->table('_gallery')->update($data)){
            return true;
        }else{
            return false;
        }
    }

    function delete_gallery_images($id){
        $this->db->where('_id',$id);
        if($this->db->table('_gallery')->delete()){
            return true;
        }else{
            return false;
        }
    }

    function get_gallery_data(){
        $this->db->group_by('_albumid');
        $this->db->select('_galleryalbum.*,_gallery.*');
        $this->db->from('_gallery');
        $this->db->where('_mian_gallery','main');
        $this->db->order_by('_created_at','DESC');
        $this->db->join('_galleryalbum','_galleryalbum._album_id = _gallery._albumid');
        $query = $this->db->get();

        $ans = array();
        $i=0;
        foreach($query->getResultArray() as $row){
            $s = $row['_album_id'];
            $this->db->where('_albumid',$s);
            $d = $this->db->table('_gallery')->get()->result();
            $count = count($d);
        
            $ans[$i]['_albumid'] = $row['_albumid'];
            $ans[$i]['_albumname'] = $row['_albumname'];
            $ans[$i]['_description'] = $row['_description'];
            $ans[$i]['count'] = $count;
            $ans[$i++]['_imgloc'] = $row['_imgloc'];
 
        }
        return $ans; 
}

    function get_galleryByid($id){
    $this->db->where('_album_id',$id);
    $this->db->select('_galleryalbum.*,_gallery.*');
    $this->db->from('_gallery');
    $this->db->join('_galleryalbum','_galleryalbum._album_id = _gallery._albumid');
    return  $query = $this->db->get()->result();
    }

    function get_galleryData($id){
    $this->db->where('_album_id',$id);
    $this->db->select('_galleryalbum.*,_gallery.*');
    $this->db->from('_gallery');
    $this->db->join('_galleryalbum','_galleryalbum._album_id = _gallery._albumid');
    return  $query = $this->db->get()->getRow();
    }

    function get_deptgalleryByid($id){
    $this->db->where('_album_id',$id);
    $this->db->select('_galleryalbum.*,_dept_gallery.*');
    $this->db->from('_dept_gallery');
    $this->db->join('_galleryalbum','_galleryalbum._album_id = _dept_gallery._albumid');
    return  $query = $this->db->get()->result();
    }

    function get_deptgalleryData($id){
    $this->db->where('_album_id',$id);
    $this->db->select('_galleryalbum.*,_dept_gallery.*');
    $this->db->from('_dept_gallery');
    $this->db->join('_galleryalbum','_galleryalbum._album_id = _dept_gallery._albumid');
    return  $query = $this->db->get()->getRow();
    }

    function get_deptalbum_list(){
        $this->db->where('_deptid !=',"");
        return $this->db->table('_galleryalbum')->get()->getResultArray();
    }

    function get_deptalbum_listByid($id){
       $this->db->where('_album_id',$id);
        return $this->db->table('_galleryalbum')->get()->getRow(); 
    }

    function delete_department_album($id){
        $this->db->where('_album_id',$id);
        $this->db->table('_galleryalbum')->delete();
    }

    function insert_deptalbum_image($data){
        if($this->db->table('_dept_gallery')->insert($data)){
            return true;
        }else{
            return false;
        }
    }

    function get_deptfull_image(){
        $this->db->select('_dept_gallery.*,_galleryalbum._description,_albumname,_deptid,_departments.*');
        $this->db->from('_galleryalbum');
        $this->db->join('_dept_gallery','_dept_gallery._albumid = _galleryalbum._album_id');
        $this->db->join('_departments','_departments._dep_id = _galleryalbum._deptid');
        return $this->db->get()->getResultArray();
    }

    function get_deptfull_imageByid($id) {
        $this->db->where('_dept_gallery._id', $id);
        $this->db->select('_dept_gallery.*, _galleryalbum.*, _departments.*');
        $this->db->from('_galleryalbum');
        $this->db->join('_dept_gallery', '_dept_gallery._albumid = _galleryalbum._album_id');
        $this->db->join('_departments', '_departments._dep_id = _galleryalbum._deptid');
        return $this->db->get()->getRow();
    }

    function delete_img_department($id) {
        $tem = $this->db->select('_imgloc')->where('_id', $id)->get('_dept_gallery')->getRowArray()['_imgloc'];
        if ($tem != "") {
            unlink(FCPATH . $tem);
            $this->db->where('_id', $id);
            $this->db->set('_imgloc', '');
            $this->db->update('_dept_gallery');
        }
    }

    function update_deptalbum_image($data, $id) {
        $this->db->where('_id', $id);
        if ($this->db->table('_dept_gallery')->update( $data)) {
            return true;
        } else {
            return false;
        }
    }

    function delete_deptalbum_image($id){
        $this->db->where('_id',$id);
        $this->db->table('_dept_gallery')->delete();
    }

    function get_deptgallery_details($id){
        $this->db->where('_deptid',$id);
       return $this->db->table('_galleryalbum')->get()->getResultArray();
    }

    function get_deptgallery_images($id)
    {
        $this->db->select('*');
        $this->db->where('_albumid',$id);
        $query = $this->db->table('_dept_gallery')->get()->getResultArray();
        return $query;
    }

    function insert_gallery_index($updata)
    {
        $this->db->table('_gallery_index')->insert($updata);
    }

    function get_gallery_index(){
        $this->db->where('_gallery_name','MainGallery');
        $query=$this->db->table('_gallery_index')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return[];
    }

    function get_gallery_index_id($id){
        $this->db->where('_gallery_id',$id);
        $this->db->where('_gallery_name','MainGallery');
        $query=$this->db->table('_gallery_index')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray()[0];
        }
        return[];
    }

    function get_gallery_dept()
    {
        $this->db->where('_gallery_name','DepartmentGallery');
        $query=$this->db->table('_gallery_index')->get();
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
    }

    function get_full_gallery_details(){
        $this->db->select('_galleryalbum.*,btr._name');
        $this->db->join('_basic_teacher_registration as btr','btr._teacher_id = _galleryalbum._added_by','left');
        return $this->db->table('_galleryalbum')->get()->getResultArray();
    }

    function get_gallery_index_footer(){
        $this->db->where('_gallery_name','MainGallery');
        $query=$this->db->limit(6)->order_by('_gallery_id','DESC')->get('_gallery_index');
        if( $query->num_rows()>0 )
        {
            return $query->getResultArray();
        }
        return[];
    }

}
