<?php

namespace App\Controllers\AdminPortal;

use App\Controllers\BaseController;

class AdminGrievance extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['item'] = $this->db->table('_grievance_cell')->get()->getRowArray();
        $data['complaints'] = $this->db->table('_complaints')->orderBy('created_at', 'DESC')->get()->getResultArray();
        return view('admin/grievance/index', $data);
    }

    public function update()
    {
        $item = $this->db->table('_grievance_cell')->get()->getRowArray();
        
        $data = [
            'description' => $this->request->getPost('description')
        ];

        if ($item) {
            $this->db->table('_grievance_cell')->where('id', $item['id'])->update($data);
        } else {
            $this->db->table('_grievance_cell')->insert($data);
        }

        return redirect()->to('/AdminPortal/grievance')->with('message', 'Grievance Cell info updated successfully');
    }

    public function delete_complaint($id)
    {
        $this->db->table('_complaints')->where('id', $id)->delete();
        return redirect()->to('/AdminPortal/grievance')->with('message', 'Complaint deleted successfully');
    }
}
