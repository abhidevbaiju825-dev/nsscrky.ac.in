<?php
namespace App\Controllers;

class AdminDepartments extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data['departments'] = $this->db->table('_departments')->orderBy('_department_name', 'ASC')->get()->getResultArray();
        return view('admin/departments/index', $data);
    }

    public function create()
    {
        $data['department'] = null;
        return view('admin/departments/form', $data);
    }

    public function edit($id)
    {
        $data['department'] = $this->db->table('_departments')->where('_dep_id', $id)->get()->getRowArray();
        if (!$data['department']) return redirect()->to('AdminPortal/departments');
        return view('admin/departments/form', $data);
    }

    public function store()
    {
        $data = [
            '_department_name'        => $this->request->getPost('department_name'),
            '_description'            => $this->request->getPost('description'),
            '_association_name'       => $this->request->getPost('association_name') ?? '',
            '_association_description'=> $this->request->getPost('association_description') ?? '',
            '_hod_message'            => $this->request->getPost('hod_message') ?? '',
            '_added_by'               => session()->get('username') ?? 'Admin',
            '_modified_date'          => date('Y-m-d'),
        ];

        $this->db->table('_departments')->insert($data);
        return redirect()->to('AdminPortal/departments')->with('message', 'Department added successfully.');
    }

    public function update($id)
    {
        $data = [
            '_department_name'        => $this->request->getPost('department_name'),
            '_description'            => $this->request->getPost('description'),
            '_association_name'       => $this->request->getPost('association_name') ?? '',
            '_association_description'=> $this->request->getPost('association_description') ?? '',
            '_hod_message'            => $this->request->getPost('hod_message') ?? '',
            '_modified_date'          => date('Y-m-d'),
        ];

        $this->db->table('_departments')->where('_dep_id', $id)->update($data);
        return redirect()->to('AdminPortal/departments')->with('message', 'Department updated successfully.');
    }

    public function delete($id)
    {
        $this->db->table('_departments')->where('_dep_id', $id)->delete();
        return redirect()->to('AdminPortal/departments')->with('message', 'Department deleted successfully.');
    }
}
