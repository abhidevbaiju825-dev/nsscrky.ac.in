<?php
namespace App\Controllers;

use App\Models\UnionModel;

class AdminUnion extends BaseController
{
    protected $unionModel;

    public function __construct() {
        $this->unionModel = new UnionModel();
    }

    // --- Panel ---
    public function panel()
    {
        $year = session('academic_year');
        $data['panel'] = $this->unionModel->get_union_panel($year);
        return view('admin/union/panel', $data);
    }

    public function storePanel()
    {
        $file = $this->request->getFile('image');
        $imgLoc = '';
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/union', $newName);
            $imgLoc = 'uploads/union/' . $newName;
        }

        $data = [
            '_name' => $this->request->getPost('name'),
            '_designation' => $this->request->getPost('designation'),
            '_department' => $this->request->getPost('department'),
            '_academic_year' => session('academic_year')
        ];
        if (!empty($imgLoc)) $data['_imgloc'] = $imgLoc;

        $this->unionModel->insert_union_panel($data);
        return redirect()->to('AdminPortal/union/panel')->with('message', 'Panel member added.');
    }

    public function deletePanel($id)
    {
        $this->unionModel->delete_union_panel($id);
        return redirect()->to('AdminPortal/union/panel')->with('message', 'Panel member removed.');
    }

    // --- Incharge ---
    public function incharge()
    {
        $year = session('academic_year');
        $data['incharge'] = $this->unionModel->get_union_incharge($year);
        return view('admin/union/incharge', $data);
    }

    public function storeIncharge()
    {
        $file = $this->request->getFile('image');
        $imgLoc = '';
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/union', $newName);
            $imgLoc = 'uploads/union/' . $newName;
        }

        $data = [
            '_name' => $this->request->getPost('name'),
            '_designation' => $this->request->getPost('designation'),
            '_details' => $this->request->getPost('about'),
            '_academic_year' => session('academic_year')
        ];
        if (!empty($imgLoc)) $data['_imgloc'] = $imgLoc;

        $this->unionModel->insert_union_incharge($data);
        return redirect()->to('AdminPortal/union/incharge')->with('message', 'Incharge added.');
    }

    public function deleteIncharge($id)
    {
        $this->unionModel->delete_union_panel_incharge($id);
        return redirect()->to('AdminPortal/union/incharge')->with('message', 'Incharge removed.');
    }

    // --- Activities ---
    public function activities()
    {
        $year = session('academic_year');
        $data['activities'] = $this->unionModel->get_union_activities($year);
        return view('admin/union/activities', $data);
    }

    public function storeActivity()
    {
        $file = $this->request->getFile('image');
        $imgLoc = '';
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/union', $newName);
            $imgLoc = 'uploads/union/' . $newName;
        }

        $data = [
            '_activity_name' => $this->request->getPost('title'),
            '_details' => $this->request->getPost('description'),
            '_academic_year' => session('academic_year')
        ];
        if (!empty($imgLoc)) $data['_imgloc'] = $imgLoc;

        $this->unionModel->insert_union_activities($data);
        return redirect()->to('AdminPortal/union/activities')->with('message', 'Activity added.');
    }

    public function deleteActivity($id)
    {
        $this->unionModel->delete_union_activities($id);
        return redirect()->to('AdminPortal/union/activities')->with('message', 'Activity removed.');
    }

    // --- Gallery ---
    public function gallery()
    {
        $year = session('academic_year');
        $data['images'] = $this->unionModel->get_union_gallery($year);
        return view('admin/union/gallery', $data);
    }

    public function storeGallery()
    {
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/union', $newName);
            $this->unionModel->insert_union_gallery([
                '_imgloc' => 'uploads/union/' . $newName,
                '_academic_year' => session('academic_year')
            ]);
            return redirect()->to('AdminPortal/union/gallery')->with('message', 'Image uploaded.');
        }
        return redirect()->to('AdminPortal/union/gallery')->with('message', 'Failed to upload image.');
    }

    public function deleteGallery($id)
    {
        $db = \Config\Database::connect();
        $img = $db->table('_union_gallery')->where('_union_gallery_id', $id)->get()->getRowArray();
        if ($img && !empty($img['_imgloc']) && file_exists(FCPATH . $img['_imgloc'])) {
            unlink(FCPATH . $img['_imgloc']);
        }
        $this->unionModel->delete_galley_images($id);
        return redirect()->to('AdminPortal/union/gallery')->with('message', 'Image removed.');
    }
}
