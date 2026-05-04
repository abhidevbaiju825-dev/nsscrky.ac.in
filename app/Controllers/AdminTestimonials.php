<?php

namespace App\Controllers;

class AdminTestimonials extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $builder = $this->db->table('_testimonials');
        $builder->orderBy('id', 'DESC');
        
        $data['testimonials'] = $builder->get()->getResultArray();
        return view('admin/testimonials/index', $data);
    }

    public function create()
    {
        $data['testimonial'] = null;
        return view('admin/testimonials/form', $data);
    }

    public function edit($id)
    {
        $data['testimonial'] = $this->db->table('_testimonials')->where('id', $id)->get()->getRowArray();
        return view('admin/testimonials/form', $data);
    }

    public function store()
    {
        $id = $this->request->getPost('id');
        
        $data = [
            'name'        => $this->request->getPost('name'),
            'designation' => $this->request->getPost('designation'),
            'message'     => $this->request->getPost('message'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ];

        // Handle Image Upload (Optional)
        $file = $this->request->getFile('image_url');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/testimonials', $newName);
            $data['image_url'] = 'uploads/testimonials/' . $newName;
        }

        if ($id) {
            $this->db->table('_testimonials')->where('id', $id)->update($data);
            $msg = 'Testimonial updated successfully.';
        } else {
            $data['created_at'] = date('Y-m-d H:i:s');
            $this->db->table('_testimonials')->insert($data);
            $msg = 'Testimonial added successfully.';
        }

        return redirect()->to('AdminPortal/testimonials')->with('message', $msg);
    }

    public function delete($id)
    {
        $this->db->table('_testimonials')->where('id', $id)->delete();
        return redirect()->to('AdminPortal/testimonials')->with('message', 'Testimonial removed.');
    }
}
