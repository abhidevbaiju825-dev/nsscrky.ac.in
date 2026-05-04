<?php
namespace App\Models;
use CodeIgniter\Model;

/**
 * SystemModel Class
 * Handles core system operations such as authentication, logging, and global utilities.
 */
class SystemModel extends Model {

    

    /**
     * Admin login check
     */
    public function logincheck($username, $password) {
        $this->db->where('_username', $username);
        $this->db->where('_password', $password);
        $query = $this->db->table('_users')->get();
        if($query->num_rows() > 0) {
            return $query->getResultArray()[0];
        }
        return false;
    }

    /**
     * General user login check (Student/Other)
     */
    public function user_logincheck($username, $password) {
        $this->db->where('_username', $username);
        $this->db->where('_password', $password);
        $query = $this->db->table('_login')->get();
        if ($query->num_rows() > 0) {
            return $query->getRow();
        }
        return false;
    }

    /**
     * Insert new login record
     */
    public function insertLogin($loginData) {
        $this->db->table('_login')->insert( $loginData);
        return $this->db->insert_id();
    }

    /**
     * Update existing login record
     */
    public function updatelogin_table($userlogdata, $loginId) {
        $this->db->where('_id', $loginId);
        $this->db->table('_login')->update( $userlogdata);
    }

    /**
     * Fetch login record by ID
     */
    public function check_datas_log($id) {
        $this->db->where('_id', $id);
        $query = $this->db->table('_login')->get();
        return $query->getRow();
    }

    /**
     * Alias for insertLogin, used by some legacy code.
     */
    public function insert_userdata($user) {
        return $this->insertLogin($user);
    }
}
