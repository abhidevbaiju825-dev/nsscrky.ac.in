<?php

namespace App\Controllers;

class AdminProgrammes extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $builder = $this->db->table('_programmes');
        $builder->select('_programmes.*, _departments._department_name');
        $builder->join('_departments', '_departments._dep_id = _programmes.department_id', 'left');
        $builder->orderBy('id', 'DESC');
        
        $data['programmes'] = $builder->get()->getResultArray();
        return view('admin/programmes/index', $data);
    }

    public function create()
    {
        $data['programme'] = null;
        $data['departments'] = $this->db->table('_departments')->orderBy('_department_name', 'ASC')->get()->getResultArray();
        return view('admin/programmes/form', $data);
    }

    public function edit($id)
    {
        $data['programme'] = $this->db->table('_programmes')->where('id', $id)->get()->getRowArray();
        $data['departments'] = $this->db->table('_departments')->orderBy('_department_name', 'ASC')->get()->getResultArray();
        return view('admin/programmes/form', $data);
    }

    public function store()
    {
        $id = $this->request->getPost('id');
        
        $data = [
            'department_id' => (int)$this->request->getPost('department_id'),
            'title'         => $this->request->getPost('title'),
            'description'   => $this->request->getPost('description'),
            'duration'      => $this->request->getPost('duration'),
            'type'          => $this->request->getPost('type'),
            'max_seats'     => (int)$this->request->getPost('max_seats'),
            'eligibility'   => $this->request->getPost('eligibility') ?? '',
            'vision'        => $this->request->getPost('vision') ?? '',
            'mission'       => $this->request->getPost('mission') ?? '',
            'objectives'    => $this->request->getPost('objectives') ?? '',
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        // Handle Syllabus File Upload
        $file = $this->request->getFile('syllabus');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/syllabus', $newName);
            $data['syllabus'] = 'uploads/syllabus/' . $newName;
        }

        // Handle Image Upload
        $img = $this->request->getFile('image');
        if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(FCPATH . 'uploads/programmes', $newName);
            $data['image'] = 'uploads/programmes/' . $newName;
        }

        if ($id) {
            $this->db->table('_programmes')->where('id', $id)->update($data);
            $msg = 'Programme updated successfully.';
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->table('_programmes')->insert($data);
            $msg = 'Programme added successfully.';
        }

        return redirect()->to('AdminPortal/programmes')->with('message', $msg);
    }

    public function delete($id)
    {
        $this->db->table('_programmes')->where('id', $id)->delete();
        return redirect()->to('AdminPortal/programmes')->with('message', 'Programme removed.');
    }
}
