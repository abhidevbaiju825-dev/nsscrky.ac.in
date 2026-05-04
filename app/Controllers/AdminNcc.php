<?php
namespace App\Controllers;
use App\Models\NccModel;

class AdminNcc extends BaseController
{
    protected $nccModel;

    public function __construct() {
        $this->nccModel = new NccModel();
    }


    public function index()
    {
        $year = session('academic_year');
        $data['members'] = $this->nccModel->where('_academic_year', $year)->orderBy('_ncc_id', 'DESC')->findAll();
        return view('admin/ncc/index', $data);
    }

    public function store()
    {
        $file = $this->request->getFile('image');
        $imgLoc = '';
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/ncc', $newName);
            $imgLoc = 'uploads/ncc/' . $newName;
        }

        $addedBy = (session()->get('role') === 'teacher') ? session()->get('username') : 'admin';

        $data = [
            '_name' => $this->request->getPost('name'),
            '_designation' => $this->request->getPost('designation'),
            '_type' => $this->request->getPost('type') ?? 'member',
            '_addedby' => $addedBy,
            '_created_at' => date('Y-m-d H:i:s'),
            '_academic_year' => session('academic_year')
        ];
        if (!empty($imgLoc)) $data['_profile_pic'] = $imgLoc;

        $this->nccModel->insert($data);
        return redirect()->to('AdminPortal/ncc')->with('message', 'NCC Personnel added.');
    }

    public function delete($id)
    {
        $mem = $this->nccModel->find($id);
        if ($mem && !empty($mem['_profile_pic']) && file_exists(FCPATH . $mem['_profile_pic'])) {
            unlink(FCPATH . $mem['_profile_pic']);
        }
        $this->nccModel->delete($id);
        return redirect()->to('AdminPortal/ncc')->with('message', 'NCC Personnel removed.');
    }
}
