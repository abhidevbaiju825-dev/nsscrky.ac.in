<?php

namespace App\Controllers\AdminPortal;

use App\Controllers\BaseController;

class AdminAnnouncements extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['items'] = $this->db->table('_announcements')
                                  ->orderBy('sort_order', 'ASC')
                                  ->get()
                                  ->getResultArray();
        return view('admin/announcements/index', $data);
    }

    public function store()
    {
        $this->db->table('_announcements')->insert([
            'title'      => $this->request->getPost('title'),
            'url'        => $this->request->getPost('url'),
            'is_active'  => $this->request->getPost('is_active') ? 1 : 0,
            'sort_order'  => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to('/AdminPortal/announcements')->with('message', 'Announcement added.');
    }

    public function edit($id)
    {
        $data['item'] = $this->db->table('_announcements')->where('id', $id)->get()->getRowArray();
        if (!$data['item']) {
            return redirect()->to('/AdminPortal/announcements')->with('error', 'Not found.');
        }
        return view('admin/announcements/edit', $data);
    }

    public function update($id)
    {
        $this->db->table('_announcements')->where('id', $id)->update([
            'title'      => $this->request->getPost('title'),
            'url'        => $this->request->getPost('url'),
            'is_active'  => $this->request->getPost('is_active') ? 1 : 0,
            'sort_order'  => (int) $this->request->getPost('sort_order'),
        ]);

        return redirect()->to('/AdminPortal/announcements')->with('message', 'Announcement updated.');
    }

    public function delete($id)
    {
        $this->db->table('_announcements')->where('id', $id)->delete();
        return redirect()->to('/AdminPortal/announcements')->with('message', 'Announcement deleted.');
    }

    public function toggleActive($id)
    {
        $item = $this->db->table('_announcements')->where('id', $id)->get()->getRowArray();
        if ($item) {
            $this->db->table('_announcements')->where('id', $id)->update([
                'is_active' => $item['is_active'] ? 0 : 1,
            ]);
        }
        return redirect()->to('/AdminPortal/announcements')->with('message', 'Status toggled.');
    }
}
