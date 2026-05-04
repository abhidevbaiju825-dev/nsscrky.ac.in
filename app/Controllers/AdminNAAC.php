<?php
namespace App\Controllers;

class AdminNAAC extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['certificates'] = $this->db->table('_naac_certificates')->get()->getResultArray();
        $data['journey'] = $this->db->table('_naac_journey')->get()->getResultArray();
        $data['cordinators'] = $this->db->table('_naac_cordinators')->get()->getResultArray();
        return view('admin/naac/index', $data);
    }

    // ── Certificates ──
    public function store_certificate()
    {
        $imgPath = '';
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/naac', $newName);
            $imgPath = 'uploads/naac/' . $newName;
        }

        $this->db->table('_naac_certificates')->insert([
            '_title'        => $this->request->getPost('title'),
            '_imgloc'       => $imgPath,
            '_created_date' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to('AdminPortal/naac')->with('message', 'Certificate added.');
    }

    public function delete_certificate($id)
    {
        $row = $this->db->table('_naac_certificates')->where('_id', $id)->get()->getRowArray();
        if ($row && !empty($row['_imgloc']) && file_exists(FCPATH . $row['_imgloc'])) {
            unlink(FCPATH . $row['_imgloc']);
        }
        $this->db->table('_naac_certificates')->where('_id', $id)->delete();
        return redirect()->to('AdminPortal/naac')->with('message', 'Certificate removed.');
    }

    // ── Journey ──
    public function store_journey()
    {
        $this->db->table('_naac_journey')->insert([
            '_title'       => $this->request->getPost('title'),
            '_description' => $this->request->getPost('description'),
        ]);
        return redirect()->to('AdminPortal/naac')->with('message', 'Journey entry added.');
    }

    public function delete_journey($id)
    {
        $this->db->table('_naac_journey')->where('_id', $id)->delete();
        return redirect()->to('AdminPortal/naac')->with('message', 'Journey entry removed.');
    }

    // ── Coordinators ──
    public function store_cordinator()
    {
        $imgPath = '';
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/naac', $newName);
            $imgPath = 'uploads/naac/' . $newName;
        }

        $this->db->table('_naac_cordinators')->insert([
            '_name'         => $this->request->getPost('name'),
            '_designation'  => $this->request->getPost('designation'),
            '_imgloc'       => $imgPath,
            '_created_date' => date('Y-m-d H:i:s'),
        ]);
        return redirect()->to('AdminPortal/naac')->with('message', 'Coordinator added.');
    }

    public function delete_cordinator($id)
    {
        $row = $this->db->table('_naac_cordinators')->where('_id', $id)->get()->getRowArray();
        if ($row && !empty($row['_imgloc']) && file_exists(FCPATH . $row['_imgloc'])) {
            unlink(FCPATH . $row['_imgloc']);
        }
        $this->db->table('_naac_cordinators')->where('_id', $id)->delete();
        return redirect()->to('AdminPortal/naac')->with('message', 'Coordinator removed.');
    }
}
