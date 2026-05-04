<?php

namespace App\Controllers\AdminPortal;

use App\Controllers\BaseController;

class AdminRti extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['items'] = $this->db->table('_rti')->orderBy('sort_order', 'ASC')->get()->getResultArray();
        return view('admin/rti/index', $data);
    }

    public function create()
    {
        return view('admin/rti/create');
    }

    public function store()
    {
        $this->db->table('_rti')->insert([
            'category'    => $this->request->getPost('category'),
            'role'        => $this->request->getPost('role'),
            'name'        => $this->request->getPost('name'),
            'designation' => $this->request->getPost('designation'),
            'department'  => $this->request->getPost('department'),
            'phone'       => $this->request->getPost('phone'),
            'email'       => $this->request->getPost('email'),
            'description' => $this->request->getPost('description'),
            'sort_order'  => (int)$this->request->getPost('sort_order'),
        ]);

        return redirect()->to('/AdminPortal/rti')->with('message', 'RTI item added successfully');
    }

    public function edit($id)
    {
        $data['item'] = $this->db->table('_rti')->where('id', $id)->get()->getRowArray();
        if (!$data['item']) {
            return redirect()->to('/AdminPortal/rti')->with('error', 'Item not found');
        }
        return view('admin/rti/edit', $data);
    }

    public function update($id)
    {
        $this->db->table('_rti')->where('id', $id)->update([
            'category'    => $this->request->getPost('category'),
            'role'        => $this->request->getPost('role'),
            'name'        => $this->request->getPost('name'),
            'designation' => $this->request->getPost('designation'),
            'department'  => $this->request->getPost('department'),
            'phone'       => $this->request->getPost('phone'),
            'email'       => $this->request->getPost('email'),
            'description' => $this->request->getPost('description'),
            'sort_order'  => (int)$this->request->getPost('sort_order'),
        ]);

        return redirect()->to('/AdminPortal/rti')->with('message', 'RTI item updated successfully');
    }

    public function delete($id)
    {
        $this->db->table('_rti')->where('id', $id)->delete();
        return redirect()->to('/AdminPortal/rti')->with('message', 'RTI item deleted successfully');
    }
}
