<?php

namespace App\Controllers\AdminPortal;

use App\Controllers\BaseController;

class AdminAntiRagging extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['item'] = $this->db->table('_anti_ragging')->get()->getRowArray();
        return view('admin/antiragging/index', $data);
    }

    public function update()
    {
        $item = $this->db->table('_anti_ragging')->get()->getRowArray();
        $image = $this->request->getFile('incharge_image');
        $imageName = $item ? $item['incharge_image'] : null;

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newImageName = $image->getRandomName();
            $image->move(FCPATH . 'uploads/antiragging', $newImageName);
            $imageName = 'uploads/antiragging/' . $newImageName;
        }

        $data = [
            'description'          => $this->request->getPost('description'),
            'incharge_name'        => $this->request->getPost('incharge_name'),
            'incharge_designation' => $this->request->getPost('incharge_designation'),
            'incharge_image'       => $imageName
        ];

        if ($item) {
            $this->db->table('_anti_ragging')->where('id', $item['id'])->update($data);
        } else {
            $this->db->table('_anti_ragging')->insert($data);
        }

        return redirect()->to('/AdminPortal/antiragging')->with('message', 'Anti-Ragging info updated successfully');
    }

    public function complaints()
    {
        $data['complaints'] = $this->db->table('_anti_ragging_complaints')->orderBy('created_at', 'DESC')->get()->getResultArray();
        return view('admin/antiragging/complaints', $data);
    }

    public function updateStatus($id)
    {
        $status = $this->request->getPost('status');
        if (in_array($status, ['pending', 'under_review', 'resolved'])) {
            $this->db->table('_anti_ragging_complaints')->where('id', $id)->update(['status' => $status]);
        }
        return redirect()->back()->with('message', 'Complaint status updated successfully');
    }
}
