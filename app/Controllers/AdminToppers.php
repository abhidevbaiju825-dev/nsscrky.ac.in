<?php
namespace App\Controllers;



class AdminToppers extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $data['toppers'] = $db->table('_university_toppers')->orderBy('year', 'DESC')->orderBy('rank', 'ASC')->get()->getResultArray();
        return view('admin/toppers/index', $data);
    }

    public function create()
    {
        return view('admin/toppers/form');
    }

    public function store()
    {
        $db = \Config\Database::connect();
        $file = $this->request->getFile('image');
        $imgloc = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/toppers', $newName);
            $imgloc = 'uploads/toppers/' . $newName;
        }

        $data = [
            'name'       => $this->request->getPost('name'),
            'rank'       => $this->request->getPost('rank'),
            'cgpa'       => $this->request->getPost('cgpa'),
            'department' => $this->request->getPost('department'),
            'year'       => $this->request->getPost('year'),
            'image'      => $imgloc,
        ];
        
        $db->table('_university_toppers')->insert($data);
        return redirect()->to('AdminPortal/toppers')->with('message', 'Topper added successfully.');
    }

    public function delete($id)
    {
        $db = \Config\Database::connect();
        $topper = $db->table('_university_toppers')->where('id', $id)->get()->getRowArray();
        if ($topper && !empty($topper['image']) && file_exists(FCPATH . $topper['image'])) {
            unlink(FCPATH . $topper['image']);
        }
        $db->table('_university_toppers')->where('id', $id)->delete();
        return redirect()->to('AdminPortal/toppers')->with('message', 'Topper deleted successfully.');
    }
}
