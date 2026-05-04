<?php
namespace App\Controllers;

class AdminDownloads extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['downloads'] = $this->db->table('_web_downloads')->orderBy('_order', 'ASC')->get()->getResultArray();
        return view('admin/downloads/index', $data);
    }

    public function store()
    {
        $filePath = '';
        $file = $this->request->getFile('pdf_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/downloads', $newName);
            $filePath = 'uploads/downloads/' . $newName;
        }

        $this->db->table('_web_downloads')->insert([
            '_title'  => $this->request->getPost('title'),
            '_pdfloc' => $filePath,
            '_order'  => $this->request->getPost('sort_order') ?: 0,
        ]);
        return redirect()->to('AdminPortal/downloads')->with('message', 'Download added.');
    }

    public function delete($id)
    {
        $row = $this->db->table('_web_downloads')->where('_web_downloads_id', $id)->get()->getRowArray();
        if ($row && !empty($row['_pdfloc']) && file_exists(FCPATH . $row['_pdfloc'])) {
            unlink(FCPATH . $row['_pdfloc']);
        }
        $this->db->table('_web_downloads')->where('_web_downloads_id', $id)->delete();
        return redirect()->to('AdminPortal/downloads')->with('message', 'Download removed.');
    }
}
