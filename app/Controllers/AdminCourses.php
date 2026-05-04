<?php

namespace App\Controllers;

class AdminCourses extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['courses'] = $this->db->table('_courses')->orderBy('_courseid', 'DESC')->get()->getResultArray();
        return view('admin/courses/index', $data);
    }

    public function create()
    {
        $data['course'] = null;
        return view('admin/courses/form', $data);
    }

    public function edit($id)
    {
        $data['course'] = $this->db->table('_courses')->where('_courseid', $id)->get()->getRowArray();
        return view('admin/courses/form', $data);
    }

    public function store()
    {
        $id = $this->request->getPost('courseid');
        
        $data = [
            '_title'       => $this->request->getPost('title'),
            '_category'    => $this->request->getPost('category'),
            '_tagline'     => $this->request->getPost('tagline'),
            '_description' => $this->request->getPost('description'),
            '_duration'    => (int)$this->request->getPost('duration'),
            '_maxseat'     => (int)$this->request->getPost('maxseat'),
            '_eligibity'   => $this->request->getPost('eligibility'),
            '_vission'     => $this->request->getPost('vision'),
            '_mission'     => $this->request->getPost('mission'),
            '_objectives'  => $this->request->getPost('objectives'),
            '_hodmessage'  => $this->request->getPost('hodmessage'),
        ];

        // Handle Syllabus File Upload
        $file = $this->request->getFile('syllabus');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/syllabus', $newName);
            $data['_syllabus'] = 'uploads/syllabus/' . $newName;
        }

        if ($id) {
            $this->db->table('_courses')->where('_courseid', $id)->update($data);
            $msg = 'Course updated successfully.';
        } else {
            $this->db->table('_courses')->insert($data);
            $msg = 'Course added successfully.';
        }

        return redirect()->to('AdminPortal/courses')->with('message', $msg);
    }

    public function delete($id)
    {
        $this->db->table('_courses')->where('_courseid', $id)->delete();
        return redirect()->to('AdminPortal/courses')->with('message', 'Course removed.');
    }
}
