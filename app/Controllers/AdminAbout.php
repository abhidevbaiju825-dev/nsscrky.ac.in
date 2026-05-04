<?php
namespace App\Controllers;

class AdminAbout extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['management'] = $this->db->table('_our_management')->get()->getResultArray();
        $data['team'] = $this->db->table('_our_team')->orderBy('_id', 'ASC')->get()->getResultArray();
        return view('admin/about/index', $data);
    }

    // ── Management CRUD ──
    public function store_management()
    {
        $imgPath = '';
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/management', $newName);
            $imgPath = 'uploads/management/' . $newName;
        }

        $this->db->table('_our_management')->insert([
            '_description'  => $this->request->getPost('description'),
            '_imgloc'       => $imgPath,
            '_created_date' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to('AdminPortal/about')->with('message', 'Management entry added.');
    }

    public function delete_management($id)
    {
        $row = $this->db->table('_our_management')->where('_id', $id)->get()->getRowArray();
        if ($row && !empty($row['_imgloc']) && file_exists(FCPATH . $row['_imgloc'])) {
            unlink(FCPATH . $row['_imgloc']);
        }
        $this->db->table('_our_management')->where('_id', $id)->delete();
        return redirect()->to('AdminPortal/about')->with('message', 'Management entry removed.');
    }

    // ── Team CRUD ──
    public function store_team()
    {
        $imgPath = '';
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/team', $newName);
            $imgPath = 'uploads/team/' . $newName;
        }

        $this->db->table('_our_team')->insert([
            '_name'         => $this->request->getPost('name'),
            '_designation'  => $this->request->getPost('designation'),
            '_imgloc'       => $imgPath,
            '_created_date' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to('AdminPortal/about')->with('message', 'Team member added.');
    }

    public function delete_team($id)
    {
        $row = $this->db->table('_our_team')->where('_id', $id)->get()->getRowArray();
        if ($row && !empty($row['_imgloc']) && file_exists(FCPATH . $row['_imgloc'])) {
            unlink(FCPATH . $row['_imgloc']);
        }
        $this->db->table('_our_team')->where('_id', $id)->delete();
        return redirect()->to('AdminPortal/about')->with('message', 'Team member removed.');
    }
}
