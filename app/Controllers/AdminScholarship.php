<?php
namespace App\Controllers;

class AdminScholarship extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['scholarships'] = $this->db->table('_scholarship')->get()->getResultArray();
        return view('admin/scholarship/index', $data);
    }

    public function store()
    {
        $this->db->table('_scholarship')->insert([
            '_title'       => $this->request->getPost('title'),
            '_description' => $this->request->getPost('description'),
        ]);
        return redirect()->to('AdminPortal/scholarship')->with('message', 'Scholarship added.');
    }

    public function edit($id)
    {
        $data['scholarships'] = $this->db->table('_scholarship')->get()->getResultArray();
        $data['edit'] = $this->db->table('_scholarship')->where('_scholarship_id', $id)->get()->getRowArray();
        return view('admin/scholarship/index', $data);
    }

    public function update($id)
    {
        $this->db->table('_scholarship')->where('_scholarship_id', $id)->update([
            '_title'       => $this->request->getPost('title'),
            '_description' => $this->request->getPost('description'),
        ]);
        return redirect()->to('AdminPortal/scholarship')->with('message', 'Scholarship updated.');
    }

    public function delete($id)
    {
        $this->db->table('_scholarship')->where('_scholarship_id', $id)->delete();
        return redirect()->to('AdminPortal/scholarship')->with('message', 'Scholarship removed.');
    }
}
