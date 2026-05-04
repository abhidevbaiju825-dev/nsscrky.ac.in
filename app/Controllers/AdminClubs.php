<?php
namespace App\Controllers;

use App\Models\ClubModel;

class AdminClubs extends BaseController
{
    protected $clubModel;

    public function __construct() {
        $this->clubModel = new ClubModel();
    }

    public function index()
    {
        $data['clubs'] = $this->clubModel->orderBy('_id', 'DESC')->findAll();
        return view('admin/clubs/index', $data);
    }

    public function create()
    {
        $db = \Config\Database::connect();
        $data['staff'] = $db->table('_basic_teacher_registration')->where('_status', 'approved')->orderBy('_name', 'ASC')->get()->getResultArray();
        $data['departments'] = $db->table('_departments')->get()->getResultArray();
        return view('admin/clubs/form', $data);
    }

    public function store()
    {
        $files = [
            'logo' => 'logo',
            'imgloc' => 'clubimsg',
            'hbanner' => 'hbanner',
            'fbanner' => 'fbanner'
        ];

        $paths = ['_logo' => '', '_imgloc' => '', '_hbanner' => '', '_fbanner' => ''];

        foreach ($files as $dbKey => $inputName) {
            $file = $this->request->getFile($inputName);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'uploads/clubs', $newName);
                $paths['_' . $dbKey] = 'uploads/clubs/' . $newName;
            }
        }

        $data = [
            '_name' => $this->request->getPost('name'),
            '_description' => $this->request->getPost('description'),
            '_display_as' => $this->request->getPost('display_as') ?? 'club',
            '_dept_id' => $this->request->getPost('dept_id') ?? 0,
            '_staf_id' => $this->request->getPost('staff_id') ?? 0,
            '_logo' => $paths['_logo'],
            '_imgloc' => $paths['_imgloc'],
            '_hbanner' => $paths['_hbanner'],
            '_fbanner' => $paths['_fbanner'],
        ];

        $this->clubModel->insert($data);
        return redirect()->to('AdminPortal/clubs')->with('message', 'Club/Cell created successfully.');
    }

    public function edit($id)
    {
        $data['club'] = $this->clubModel->find($id);
        if (!$data['club']) return redirect()->to('AdminPortal/clubs');

        $db = \Config\Database::connect();
        $data['staff'] = $db->table('_basic_teacher_registration')->where('_status', 'approved')->orderBy('_name', 'ASC')->get()->getResultArray();
        $data['departments'] = $db->table('_departments')->get()->getResultArray();
        
        return view('admin/clubs/form', $data);
    }

    public function update($id)
    {
        $club = $this->clubModel->find($id);
        if (!$club) return redirect()->to('AdminPortal/clubs');

        $data = [
            '_name' => $this->request->getPost('name'),
            '_description' => $this->request->getPost('description'),
            '_display_as' => $this->request->getPost('display_as') ?? 'club',
            '_dept_id' => $this->request->getPost('dept_id') ?? 0,
            '_staf_id' => $this->request->getPost('staff_id') ?? 0,
        ];

        $files = [
            'logo' => 'logo',
            'imgloc' => 'clubimsg',
            'hbanner' => 'hbanner',
            'fbanner' => 'fbanner'
        ];

        foreach ($files as $dbKey => $inputName) {
            $file = $this->request->getFile($inputName);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'uploads/clubs', $newName);
                $data['_' . $dbKey] = 'uploads/clubs/' . $newName;

                // Delete old file if exists
                if (!empty($club['_' . $dbKey]) && file_exists(FCPATH . $club['_' . $dbKey])) {
                    unlink(FCPATH . $club['_' . $dbKey]);
                }
            }
        }

        $this->clubModel->update($id, $data);
        return redirect()->to('AdminPortal/clubs')->with('message', 'Club updated successfully.');
    }

    public function delete($id)
    {
        $this->clubModel->delete_clubandcells($id);
        return redirect()->to('AdminPortal/clubs')->with('message', 'Club deleted.');
    }

    // Designations management
    public function designations($id)
    {
        $data['club'] = $this->clubModel->find($id);
        if (!$data['club']) return redirect()->to('AdminPortal/clubs');
        
        if (strcasecmp($data['club']['_name'], 'NCC') === 0) {
            return redirect()->to('AdminPortal/ncc')->with('info', 'Redirected to dedicated NCC management.');
        } elseif (strcasecmp($data['club']['_name'], 'NSS') === 0) {
            return redirect()->to('AdminPortal/nss')->with('info', 'Redirected to dedicated NSS management.');
        }

        $data['designations'] = $this->clubModel->get_clubdesigWithId($id, session('academic_year'));
        return view('admin/clubs/designations', $data);
    }

    public function saveDesignations($id)
    {
        $desigs = $this->request->getPost('cdesig');
        $ranks = $this->request->getPost('crank');
        $desigIds = $this->request->getPost('desigId');
        $year = session('academic_year');

        if ($desigs && is_array($desigs)) {
            for ($i = 0; $i < count($desigs); $i++) {
                if (!empty($desigs[$i]) && !empty($ranks[$i])) {
                    $arr = [
                        '_designation' => $desigs[$i],
                        '_desig_rank' => $ranks[$i],
                        '_clubcell_id' => $id,
                        '_academic_year' => $year
                    ];
                    if (!empty($desigIds[$i])) {
                        $this->clubModel->updateClubdesig($arr, $desigIds[$i]);
                    } else {
                        $this->clubModel->insertClubdesig($arr);
                    }
                }
            }
        }
        return redirect()->to("AdminPortal/clubs/designations/$id")->with('message', 'Designations saved.');
    }

    public function deleteDesignation($id, $clubId)
    {
        $this->clubModel->removeDesigGroups($id);
        return redirect()->to("AdminPortal/clubs/designations/$clubId")->with('message', 'Designation removed.');
    }

    // Members management
    public function members($id)
    {
        $data['club'] = $this->clubModel->find($id);
        if (!$data['club']) return redirect()->to('AdminPortal/clubs');
        
        if (strcasecmp($data['club']['_name'], 'NCC') === 0) {
            return redirect()->to('AdminPortal/ncc')->with('info', 'Redirected to dedicated NCC management.');
        } elseif (strcasecmp($data['club']['_name'], 'NSS') === 0) {
            return redirect()->to('AdminPortal/nss')->with('info', 'Redirected to dedicated NSS management.');
        }

        $data['designations'] = $this->clubModel->get_clubdesigWithId($id, session('academic_year'));
        $data['member_list'] = $this->clubModel->get_club_memberlst_bycellid($id); // This fetches users from other tables, no academic year
        $data['assigned_members'] = $this->clubModel->get_club_tablememberlst_bycellid_new($id, session('academic_year'));
        return view('admin/clubs/members', $data);
    }

    public function addMember($id)
    {
        // Example logic porting from legacy add_clubother_member
        $memberId = $this->request->getPost('in_member_id'); // Format might be type_id 
        $designation = $this->request->getPost('in_resignation');
        $memberType = $this->request->getPost('in_member_type') ?? 'normal';
        $rank = $this->request->getPost('rank');

        // Need to extract the table prefix and actual ID. Legacy code was doing some magic, let's assume UI passes "tea_12"
        $parts = explode('_', $memberId, 2);
        if (count($parts) == 2) {
            $table = $parts[0];
            $accId = $parts[1];

            $arr = [
                '_clubandcells_id' => $id,
                '_account_id' => $accId,
                '_which_table' => $table,
                '_designation' => $designation,
                '_member_type' => $memberType,
                '_rank' => $rank,
                '_academic_year' => session('academic_year')
            ];
            $this->clubModel->insert_club_member($arr);
        }

        return redirect()->to("AdminPortal/clubs/members/$id")->with('message', 'Member added.');
    }

    public function deleteMember($memId, $clubId)
    {
        $this->clubModel->remove_member_byid($memId);
        return redirect()->to("AdminPortal/clubs/members/$clubId")->with('message', 'Member removed.');
    }
}
