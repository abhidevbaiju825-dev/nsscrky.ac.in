<?php

namespace App\Controllers\AdminPortal;

use App\Controllers\BaseController;

class AdminPta extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['items'] = $this->db->table('_pta')->orderBy('sort_order', 'ASC')->get()->getResultArray();
        return view('admin/pta/index', $data);
    }

    public function create()
    {
        return view('admin/pta/create');
    }

    public function store()
    {
        $image = $this->request->getFile('image');
        $imageName = null;

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            $image->move(FCPATH . 'uploads/pta', $imageName);
            $imageName = 'uploads/pta/' . $imageName;
        }

        $this->db->table('_pta')->insert([
            'category'    => $this->request->getPost('category'),
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'designation' => $this->request->getPost('designation'),
            'sort_order'  => (int)$this->request->getPost('sort_order'),
            'image'       => $imageName
        ]);

        return redirect()->to('/AdminPortal/pta')->with('message', 'PTA item added successfully');
    }

    public function edit($id)
    {
        $data['item'] = $this->db->table('_pta')->where('id', $id)->get()->getRowArray();
        if (!$data['item']) {
            return redirect()->to('/AdminPortal/pta')->with('error', 'Item not found');
        }
        return view('admin/pta/edit', $data);
    }

    public function update($id)
    {
        $item = $this->db->table('_pta')->where('id', $id)->get()->getRowArray();
        $image = $this->request->getFile('image');
        $imageName = $item['image'];

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $newImageName = $image->getRandomName();
            $image->move(FCPATH . 'uploads/pta', $newImageName);
            $imageName = 'uploads/pta/' . $newImageName;
        }

        $this->db->table('_pta')->where('id', $id)->update([
            'category'    => $this->request->getPost('category'),
            'title'       => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'designation' => $this->request->getPost('designation'),
            'sort_order'  => (int)$this->request->getPost('sort_order'),
            'image'       => $imageName
        ]);

        return redirect()->to('/AdminPortal/pta')->with('message', 'PTA item updated successfully');
    }

    public function delete($id)
    {
        $this->db->table('_pta')->where('id', $id)->delete();
        return redirect()->to('/AdminPortal/pta')->with('message', 'PTA item deleted successfully');
    }
}
