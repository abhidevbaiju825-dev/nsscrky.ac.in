<?php
namespace App\Controllers;
use App\Models\NssModel;

class AdminNss extends BaseController
{
    protected $nssModel;

    public function __construct() {
        $this->nssModel = new NssModel();
    }

    public function index()
    {
        $year = session('academic_year');
        $data['members'] = $this->nssModel->where('_academic_year', $year)->orderBy('_id', 'DESC')->findAll();
        return view('admin/nss/index', $data);
    }

    public function store()
    {
        $file = $this->request->getFile('image');
        $imgLoc = '';
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/nss', $newName);
            $imgLoc = 'uploads/nss/' . $newName;
        }

        $data = [
            '_name' => $this->request->getPost('name'),
            '_designation' => $this->request->getPost('designation'),
            '_details' => $this->request->getPost('details'),
            '_academic_year' => session('academic_year')
        ];
        if (!empty($imgLoc)) $data['_imgloc'] = $imgLoc;

        $this->nssModel->insert($data);
        return redirect()->to('AdminPortal/nss')->with('message', 'NSS Personnel added.');
    }

    public function delete($id)
    {
        $mem = $this->nssModel->find($id);
        if ($mem && !empty($mem['_imgloc']) && file_exists(FCPATH . $mem['_imgloc'])) {
            unlink(FCPATH . $mem['_imgloc']);
        }
        $this->nssModel->delete($id);
        return redirect()->to('AdminPortal/nss')->with('message', 'NSS Personnel removed.');
    }
}
