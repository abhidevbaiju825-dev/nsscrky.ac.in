<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class AdminClubActivities extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('_club_cells_news');
        $builder->select('_club_cells_news.*, _clubandcells._name as club_name');
        $builder->join('_clubandcells', '_clubandcells._id = _club_cells_news._club_and_cell_id', 'left');
        $data['news'] = $builder->orderBy('id', 'DESC')->get()->getResultArray();
        
        $data['clubs'] = $db->table('_clubandcells')->orderBy('_name', 'ASC')->get()->getResultArray();
        
        return view('admin/clubs/activities', $data);
    }

    public function store()
    {
        $file = $this->request->getFile('news_image');
        $imgLoc = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/clubs/news', $newName);
            $imgLoc = 'uploads/clubs/news/' . $newName;
        }

        $data = [
            '_news_title' => $this->request->getPost('title'),
            '_news_description' => $this->request->getPost('description'),
            '_club_and_cell_id' => $this->request->getPost('club_id'),
            '_added_by' => 'admin',
        ];

        if (!empty($imgLoc)) {
            $data['_doc_loc'] = $imgLoc;
        }

        $db = \Config\Database::connect();
        $db->table('_club_cells_news')->insert($data);

        return redirect()->to('AdminPortal/clubs/activities')->with('message', 'Activity/News logged.');
    }

    public function delete($id)
    {
        $db = \Config\Database::connect();
        $news = $db->table('_club_cells_news')->where('id', $id)->get()->getRowArray();
        if ($news && !empty($news['_doc_loc']) && file_exists(FCPATH . $news['_doc_loc'])) {
            unlink(FCPATH . $news['_doc_loc']);
        }
        $db->table('_club_cells_news')->where('id', $id)->delete();

        return redirect()->to('AdminPortal/clubs/activities')->with('message', 'Activity/News removed.');
    }
}
