<?php

namespace App\Controllers\AdminPortal;

use App\Controllers\BaseController;

class AdminIqac extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    /**
     * Main IQAC admin page — tabbed: Documents + Settings.
     */
    public function index()
    {
        $data['documents'] = $this->db->table('_iqac_documents')
                                      ->orderBy('category', 'ASC')
                                      ->orderBy('sort_order', 'ASC')
                                      ->get()
                                      ->getResultArray();

        // Load settings as key-value
        $rows = $this->db->table('_iqac_settings')->get()->getResultArray();
        $data['settings'] = [];
        foreach ($rows as $row) {
            $data['settings'][$row['setting_key']] = $row['setting_value'];
        }

        return view('admin/iqac/index', $data);
    }

    /**
     * Create document form.
     */
    public function create()
    {
        return view('admin/iqac/create');
    }

    /**
     * Store a new IQAC document.
     */
    public function store()
    {
        $insertData = [
            'category'    => $this->request->getPost('category'),
            'title'       => $this->request->getPost('title'),
            'year'        => $this->request->getPost('year'),
            'description' => $this->request->getPost('description'),
            'sort_order'  => (int) $this->request->getPost('sort_order'),
        ];

        $file = $this->request->getFile('document_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'assets/files/', $newName);
            $insertData['file_path'] = 'assets/files/' . $newName;
        }

        $this->db->table('_iqac_documents')->insert($insertData);

        return redirect()->to('/AdminPortal/iqac')->with('message', 'IQAC document added successfully.');
    }

    /**
     * Edit document form.
     */
    public function edit($id)
    {
        $data['doc'] = $this->db->table('_iqac_documents')
                                ->where('id', $id)
                                ->get()
                                ->getRowArray();

        if (!$data['doc']) {
            return redirect()->to('/AdminPortal/iqac')->with('error', 'Document not found.');
        }

        return view('admin/iqac/edit', $data);
    }

    /**
     * Update an existing document.
     */
    public function update($id)
    {
        $updateData = [
            'category'    => $this->request->getPost('category'),
            'title'       => $this->request->getPost('title'),
            'year'        => $this->request->getPost('year'),
            'description' => $this->request->getPost('description'),
            'sort_order'  => (int) $this->request->getPost('sort_order'),
        ];

        $file = $this->request->getFile('document_file');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'assets/files/', $newName);
            $updateData['file_path'] = 'assets/files/' . $newName;
        }

        $this->db->table('_iqac_documents')->where('id', $id)->update($updateData);

        return redirect()->to('/AdminPortal/iqac')->with('message', 'Document updated successfully.');
    }

    /**
     * Delete a document.
     */
    public function delete($id)
    {
        $this->db->table('_iqac_documents')->where('id', $id)->delete();
        return redirect()->to('/AdminPortal/iqac')->with('message', 'Document deleted.');
    }

    /**
     * Save IQAC page settings (about text, committee).
     */
    public function saveSettings()
    {
        $keys = ['about_text', 'chairman', 'coordinator', 'members'];

        foreach ($keys as $key) {
            $value = $this->request->getPost($key);
            if ($value !== null) {
                $exists = $this->db->table('_iqac_settings')->where('setting_key', $key)->countAllResults();
                if ($exists) {
                    $this->db->table('_iqac_settings')->where('setting_key', $key)->update(['setting_value' => $value]);
                } else {
                    $this->db->table('_iqac_settings')->insert(['setting_key' => $key, 'setting_value' => $value]);
                }
            }
        }

        return redirect()->to('/AdminPortal/iqac')->with('message', 'IQAC page settings saved successfully.');
    }
}
