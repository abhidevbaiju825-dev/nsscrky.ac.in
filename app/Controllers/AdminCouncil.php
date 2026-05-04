<?php
namespace App\Controllers;

class AdminCouncil extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['incharges'] = $this->db->table('_counsil_incharge')->get()->getResultArray();
        $data['members'] = $this->db->table('_counsil_members')->get()->getResultArray();
        return view('admin/council/index', $data);
    }

    // ── Incharge CRUD ──
    public function store_incharge()
    {
        $imgPath = '';
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/council', $newName);
            $imgPath = 'uploads/council/' . $newName;
        }

        $this->db->table('_counsil_incharge')->insert([
            '_name'        => $this->request->getPost('name'),
            '_designation' => $this->request->getPost('designation'),
            '_description' => $this->request->getPost('description'),
            '_imgloc'      => $imgPath,
        ]);
        return redirect()->to('AdminPortal/council')->with('message', 'Council incharge added.');
    }

    public function delete_incharge($id)
    {
        $row = $this->db->table('_counsil_incharge')->where('_id', $id)->get()->getRowArray();
        if ($row && !empty($row['_imgloc']) && file_exists(FCPATH . $row['_imgloc'])) {
            unlink(FCPATH . $row['_imgloc']);
        }
        $this->db->table('_counsil_incharge')->where('_id', $id)->delete();
        return redirect()->to('AdminPortal/council')->with('message', 'Council incharge removed.');
    }

    // ── Members CRUD ──
    public function store_member()
    {
        $this->db->table('_counsil_members')->insert([
            '_name'        => $this->request->getPost('name'),
            '_designation' => $this->request->getPost('designation'),
        ]);
        return redirect()->to('AdminPortal/council')->with('message', 'Council member added.');
    }

    public function delete_member($id)
    {
        $this->db->table('_counsil_members')->where('_id', $id)->delete();
        return redirect()->to('AdminPortal/council')->with('message', 'Council member removed.');
    }
}
