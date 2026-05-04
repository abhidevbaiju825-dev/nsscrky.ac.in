<?php
namespace App\Controllers;

use App\Models\StaffModel;

class AdminStaff extends BaseController
{
    protected $staffModel;

    public function __construct()
    {
        $this->staffModel = new StaffModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        
        // Fetch teachers manually utilizing raw query builder for joins, or we could use model with joins.
        $data['staff_list'] = $this->staffModel
            ->select('_basic_teacher_registration.*, _departments._department_name')
            ->join('_departments', '_departments._dep_id = _basic_teacher_registration._department', 'left')
            ->orderBy('_teacher_id', 'DESC')
            ->findAll();
            
        return view('admin/staff/index', $data);
    }

    public function create()
    {
        $db = \Config\Database::connect();
        $data['departments'] = $db->table('_departments')->get()->getResultArray();
        return view('admin/staff/form', $data);
    }

    public function edit($id)
    {
        $db = \Config\Database::connect();
        $data['departments'] = $db->table('_departments')->get()->getResultArray();
        $data['staff'] = $this->staffModel->find($id);

        if (!$data['staff']) {
            return redirect()->to('AdminPortal/staff')->with('message', 'Staff member not found.');
        }

        return view('admin/staff/form', $data);
    }

    public function store()
    {
        return $this->saveStaff();
    }

    public function update($id)
    {
        return $this->saveStaff($id);
    }

    protected function saveStaff($id = null)
    {
        $file = $this->request->getFile('profile_image');
        
        $data = [
            '_name' => $this->request->getPost('name'),
            '_designation' => $this->request->getPost('designation'),
            '_role' => $this->request->getPost('role'), // teacher or nonteachingstaff
            '_department' => $this->request->getPost('department_id'),
            '_email' => $this->request->getPost('email'),
            '_phone' => $this->request->getPost('phone'),
            '_qualification' => $this->request->getPost('qualification'),
            '_status' => $this->request->getPost('status') ?? 'approved',
            '_dateofjoin' => $this->request->getPost('dateofjoin') ?: date('Y-m-d'),
            '_address_line1' => $this->request->getPost('address_line1') ?? '',
            '_gender' => $this->request->getPost('gender') ?? '',
            '_dob' => $this->request->getPost('dob') ?: date('Y-m-d'),
            '_dateofretirement' => $this->request->getPost('dateofretirement') ?: date('Y-m-d'),
            '_area_of_specialization' => $this->request->getPost('area_of_specialization') ?? '',
            '_description' => $this->request->getPost('description') ?? ''
        ];

        // Retrieve existing image to retain it if no new upload
        $existing = null;
        if ($id) {
            $existing = $this->staffModel->find($id);
        }

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/staff', $newName);
            $data['_imgloc'] = 'uploads/staff/' . $newName;

            // Remove old image if a new one is uploaded
            if ($existing && !empty($existing['_imgloc']) && file_exists(FCPATH . $existing['_imgloc'])) {
                unlink(FCPATH . $existing['_imgloc']);
            }
        }

        if ($id) {
            $this->staffModel->update($id, $data);
            $msg = 'Staff profile updated successfully.';
        } else {
            // Defaults for required legacy columns when creating new
            $data['_short_name'] = $this->request->getPost('short_name') ?? ''; 
            $data['_address_line2'] = '';
            $data['_bool'] = ''; 
            $data['_mobile_visible'] = ''; 
            $data['_seniority'] = ''; 
            $data['_email_visible'] = ''; 
            $data['_subject'] = ''; 
            $data['_pan_number'] = ''; 
            $data['_pen_number'] = '';
            $data['_adhar_number'] = ''; 
            $data['_approved_by'] = '';
            $data['_login_id'] = 0;

            $this->staffModel->insert($data);
            $msg = 'Staff profile added successfully.';
        }

        return redirect()->to('AdminPortal/staff')->with('message', $msg);
    }

    public function delete($id)
    {
        $existing = $this->staffModel->find($id);
        if ($existing && !empty($existing['_imgloc']) && file_exists(FCPATH . $existing['_imgloc'])) {
            unlink(FCPATH . $existing['_imgloc']);
        }

        $this->staffModel->delete($id);
        return redirect()->to('AdminPortal/staff')->with('message', 'Staff member removed from records.');
    }
}
