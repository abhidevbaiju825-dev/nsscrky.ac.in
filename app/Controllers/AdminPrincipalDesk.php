<?php
namespace App\Controllers;

use App\Models\PrincipalDeskModel;
use App\Models\FormerPrincipalModel;

class AdminPrincipalDesk extends BaseController
{
    protected $principalModel;
    protected $formerModel;

    public function __construct()
    {
        $this->principalModel = new PrincipalDeskModel();
        $this->formerModel = new FormerPrincipalModel();
    }

    public function index()
    {
        $data['principal'] = $this->principalModel->getActivePrincipal();
        $data['former_principals'] = $this->formerModel->getAll();
        return view('admin/principal_desk/index', $data);
    }

    // ── Current Principal Profile ────────────────────────────────
    public function update()
    {
        $id = $this->request->getPost('id');
        $file = $this->request->getFile('profile_image');

        $data = [
            '_name'          => $this->request->getPost('name'),
            '_qualification' => $this->request->getPost('qualification'),
            '_message'       => $this->request->getPost('message'),
            '_email'         => $this->request->getPost('email'),
            '_phone'         => $this->request->getPost('phone'),
            '_about'         => $this->request->getPost('about')
        ];

        $existing = null;
        if ($id) {
            $existing = $this->principalModel->find($id);
        }

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/principal', $newName);
            $data['_imgloc'] = 'uploads/principal/' . $newName;

            if ($existing && !empty($existing['_imgloc']) && file_exists(FCPATH . $existing['_imgloc'])) {
                unlink(FCPATH . $existing['_imgloc']);
            }
        }

        if ($id) {
            $this->principalModel->update($id, $data);
            $msg = 'Principal profile updated successfully.';
        } else {
            $this->principalModel->insert($data);
            $msg = 'Principal profile created successfully.';
        }

        return redirect()->to('AdminPortal/principal_desk')->with('message', $msg);
    }

    // ── Former Principals CRUD ───────────────────────────────────
    public function store_former()
    {
        $data = [
            '_name'      => $this->request->getPost('name'),
            '_from_date' => $this->request->getPost('from_date'),
            '_to_date'   => $this->request->getPost('to_date') ?: null,
        ];

        $this->formerModel->insert($data);
        return redirect()->to('AdminPortal/principal_desk')->with('message', 'Former principal added successfully.');
    }

    public function edit_former($id)
    {
        $data['principal'] = $this->principalModel->getActivePrincipal();
        $data['former_principals'] = $this->formerModel->getAll();
        $data['edit_former'] = $this->formerModel->find($id);
        return view('admin/principal_desk/index', $data);
    }

    public function update_former($id)
    {
        $data = [
            '_name'      => $this->request->getPost('name'),
            '_from_date' => $this->request->getPost('from_date'),
            '_to_date'   => $this->request->getPost('to_date') ?: null,
        ];

        $this->formerModel->update($id, $data);
        return redirect()->to('AdminPortal/principal_desk')->with('message', 'Former principal updated successfully.');
    }

    public function delete_former($id)
    {
        $this->formerModel->delete($id);
        return redirect()->to('AdminPortal/principal_desk')->with('message', 'Former principal removed.');
    }

    public function make_former($id)
    {
        $active = $this->principalModel->find($id);
        
        if ($active) {
            // Transfer to former principals table
            $data = [
                '_name'      => $active['_name'],
                '_from_date' => date('Y-m-d'), // Placeholder date
                '_to_date'   => date('Y-m-d')  // Placeholder date
            ];
            
            $this->formerModel->insert($data);
            
            // Delete current principal to "clear" the form
            $this->principalModel->delete($id);
            
            return redirect()->to('AdminPortal/principal_desk')->with('message', 'Principal has been moved to former records. You can now add a new principal.');
        }

        return redirect()->to('AdminPortal/principal_desk')->with('error', 'Principal record not found.');
    }
}
