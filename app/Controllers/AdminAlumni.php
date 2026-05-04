<?php

namespace App\Controllers;

use App\Models\AlumniUserModel;
use App\Models\AlumniActivityModel;

class AdminAlumni extends BaseController
{
    protected $alumniUserModel;
    protected $alumniActivityModel;

    public function __construct()
    {
        $this->alumniUserModel = new AlumniUserModel();
        $this->alumniActivityModel = new AlumniActivityModel();
    }

    public function index()
    {
        // View approved alumni
        $data['alumni'] = $this->alumniUserModel->where('status', 'approved')->orderBy('id', 'DESC')->get()->getResultArray();
        return view('admin/alumni/index', $data);
    }

    public function requests()
    {
        // View pending alumni requests
        $data['requests'] = $this->alumniUserModel->where('status', 'pending')->orderBy('id', 'ASC')->get()->getResultArray();
        return view('admin/alumni/requests', $data);
    }

    public function approve($id)
    {
        $this->alumniUserModel->update($id, [
            'status' => 'approved',
            'approved_by' => session()->get('admin_id')
        ]);
        return redirect()->to('AdminPortal/alumni/requests')->with('message', 'Alumni registration approved.');
    }

    public function delete($id)
    {
        $this->alumniUserModel->delete($id);
        return redirect()->back()->with('message', 'Alumni record deleted.');
    }

    // --- Activities ---

    public function activities()
    {
        $data['activities'] = $this->alumniActivityModel->orderBy('id', 'DESC')->get()->getResultArray();
        return view('admin/alumni/activities', $data);
    }

    public function store_activity()
    {
        $file = $this->request->getFile('image');
        $imgloc = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/alumni', $newName);
            $imgloc = 'uploads/alumni/' . $newName;
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'description' => $this->request->getPost('description'),
            'activity_date' => $this->request->getPost('activity_date'),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        
        if ($imgloc) {
            $data['image_url'] = $imgloc;
        }

        $this->alumniActivityModel->insert($data);
        return redirect()->to('AdminPortal/alumni/activities')->with('message', 'Activity added successfully.');
    }

    public function delete_activity($id)
    {
        $activity = $this->alumniActivityModel->find($id);
        if ($activity && !empty($activity['image_url']) && file_exists(FCPATH . $activity['image_url'])) {
            unlink(FCPATH . $activity['image_url']);
        }
        $this->alumniActivityModel->delete($id);
        return redirect()->to('AdminPortal/alumni/activities')->with('message', 'Activity deleted successfully.');
    }
}
