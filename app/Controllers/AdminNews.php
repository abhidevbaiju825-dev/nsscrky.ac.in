<?php
namespace App\Controllers;

use App\Models\NewsModel;

class AdminNews extends BaseController
{
    protected $newsModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
    }

    public function index()
    {
        $data['news_list'] = $this->newsModel->get_news_desc();
        return view('admin/news/index', $data);
    }

    public function create()
    {
        return view('admin/news/form');
    }

    public function store()
    {
        $file = $this->request->getFile('news_image');
        $imgloc = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/news', $newName);
            $imgloc = 'uploads/news/' . $newName;
        }

        $data = [
            '_date' => date('Y-m-d'),
            '_newsheading' => $this->request->getPost('heading'),
            '_newsdescription' => $this->request->getPost('description'),
            '_added_by' => session()->get('username'),
            '_imgloc' => $imgloc,
            '_created_at' => date('Y-m-d H:i:s'),
        ];

        $this->newsModel->insert_news($data);
        return redirect()->to('AdminPortal/news')->with('message', 'News created successfully.');
    }

    public function delete($id)
    {
        // Model deletes the file too natively (from our ported logic)
        $this->newsModel->delete_news($id);
        return redirect()->to('AdminPortal/news')->with('message', 'News deleted successfully.');
    }
}
