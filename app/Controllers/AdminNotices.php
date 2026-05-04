<?php
namespace App\Controllers;

use App\Models\GeneralModel;

class AdminNotices extends BaseController
{
    protected $generalModel;

    public function __construct()
    {
        $this->generalModel = new GeneralModel();
    }

    public function index()
    {
        $data['notice_list'] = $this->generalModel->get_notice();
        return view('admin/notices/index', $data);
    }

    public function create()
    {
        return view('admin/notices/form');
    }

    public function store()
    {
        $file = $this->request->getFile('pdf_file');
        $pdfloc = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/notices', $newName);
            $pdfloc = 'uploads/notices/' . $newName;
        }

        $important = $this->request->getPost('important') ? 'yes' : 'no';

        $data = [
            '_title' => $this->request->getPost('title'),
            '_description' => $this->request->getPost('description'),
            '_link' => $this->request->getPost('link') ?? '',
            '_important' => $important,
            '_status' => 'active',
            '_display_date' => date('Y-m-d'),
            '_created_date' => date('Y-m-d H:i:s'),
            '_exp_date' => $this->request->getPost('exp_date'),
            '_pdf_file_loc' => $pdfloc,
        ];

        $this->generalModel->insert_notice($data);
        return redirect()->to('AdminPortal/notices')->with('message', 'Notice uploaded successfully.');
    }

    public function delete($id)
    {
        $this->generalModel->delete_notice($id);
        return redirect()->to('AdminPortal/notices')->with('message', 'Notice removed successfully.');
    }
}
