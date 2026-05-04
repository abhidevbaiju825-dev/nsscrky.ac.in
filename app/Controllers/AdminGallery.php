<?php

namespace App\Controllers;

class AdminGallery extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // ─── Album Listing ───────────────────────────────────────
    public function index()
    {
        $albums = $this->db->table('_galleryalbum')
            ->orderBy('_album_id', 'DESC')
            ->get()->getResultArray();

        // Attach cover image (first image) for each album
        foreach ($albums as &$album) {
            $cover = $this->db->table('_gallery')
                ->where('_albumid', $album['_album_id'])
                ->orderBy('_id', 'ASC')
                ->limit(1)
                ->get()->getRowArray();
            $album['cover'] = $cover['_imgloc'] ?? null;

            // Get actual image count
            $album['_imagecount'] = $this->db->table('_gallery')
                ->where('_albumid', $album['_album_id'])
                ->countAllResults();
        }

        $data['albums'] = $albums;
        return view('admin/gallery/index', $data);
    }

    // ─── Create Album ────────────────────────────────────────
    public function createAlbum()
    {
        $data['album'] = null;
        return view('admin/gallery/form', $data);
    }

    public function storeAlbum()
    {
        $data = [
            '_albumname'    => $this->request->getPost('albumname'),
            '_description'  => $this->request->getPost('description') ?? '',
            '_imagecount'   => 0,
            '_mian_gallery' => 'main',
            '_deptid'       => 0,
            '_added_by'     => session()->get('username') ?? 'Admin',
            '_created_at'   => date('Y-m-d H:i:s'),
        ];

        $this->db->table('_galleryalbum')->insert($data);
        return redirect()->to('AdminPortal/gallery')->with('message', 'Album created successfully.');
    }

    // ─── Edit Album ──────────────────────────────────────────
    public function editAlbum($id)
    {
        $data['album'] = $this->db->table('_galleryalbum')
            ->where('_album_id', $id)
            ->get()->getRowArray();

        if (!$data['album']) {
            return redirect()->to('AdminPortal/gallery')->with('message', 'Album not found.');
        }

        return view('admin/gallery/form', $data);
    }

    public function updateAlbum($id)
    {
        $data = [
            '_albumname'   => $this->request->getPost('albumname'),
            '_description' => $this->request->getPost('description') ?? '',
        ];

        $this->db->table('_galleryalbum')->where('_album_id', $id)->update($data);
        return redirect()->to('AdminPortal/gallery')->with('message', 'Album updated successfully.');
    }

    // ─── Delete Album (cascade images) ──────────────────────
    public function deleteAlbum($id)
    {
        // Delete all image files in this album
        $images = $this->db->table('_gallery')
            ->where('_albumid', $id)
            ->get()->getResultArray();

        foreach ($images as $img) {
            if (!empty($img['_imgloc']) && file_exists(FCPATH . $img['_imgloc'])) {
                unlink(FCPATH . $img['_imgloc']);
            }
        }

        // Delete image rows
        $this->db->table('_gallery')->where('_albumid', $id)->delete();

        // Delete album
        $this->db->table('_galleryalbum')->where('_album_id', $id)->delete();

        return redirect()->to('AdminPortal/gallery')->with('message', 'Album and all its images deleted.');
    }

    // ─── View Images in Album ────────────────────────────────
    public function images($albumId)
    {
        $data['album'] = $this->db->table('_galleryalbum')
            ->where('_album_id', $albumId)
            ->get()->getRowArray();

        if (!$data['album']) {
            return redirect()->to('AdminPortal/gallery')->with('message', 'Album not found.');
        }

        $data['images'] = $this->db->table('_gallery')
            ->where('_albumid', $albumId)
            ->orderBy('_id', 'DESC')
            ->get()->getResultArray();

        return view('admin/gallery/images', $data);
    }

    // ─── Upload Image to Album ───────────────────────────────
    public function storeImage($albumId)
    {
        $file = $this->request->getFile('gallery_image');

        if (!$file || !$file->isValid() || $file->hasMoved()) {
            return redirect()->to('AdminPortal/gallery/images/' . $albumId)
                ->with('message', 'No valid image file was uploaded.');
        }

        // Ensure upload directory exists
        $uploadPath = FCPATH . 'uploads/gallery';
        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $newName = $file->getRandomName();
        $file->move($uploadPath, $newName);
        $imgloc = 'uploads/gallery/' . $newName;

        $data = [
            '_albumid'         => $albumId,
            '_imgloc'          => $imgloc,
            '_img_title'       => $this->request->getPost('img_title') ?? '',
            '_img_description' => $this->request->getPost('img_description') ?? '',
            '_added_by'        => session()->get('username') ?? 'Admin',
            '_added_at'        => date('Y-m-d H:i:s'),
            '_modified_date'   => date('Y-m-d'),
        ];

        $this->db->table('_gallery')->insert($data);

        // Update image count
        $count = $this->db->table('_gallery')->where('_albumid', $albumId)->countAllResults();
        $this->db->table('_galleryalbum')->where('_album_id', $albumId)->update(['_imagecount' => $count]);

        return redirect()->to('AdminPortal/gallery/images/' . $albumId)
            ->with('message', 'Image uploaded successfully.');
    }

    // ─── Delete Single Image ─────────────────────────────────
    public function deleteImage($id)
    {
        $img = $this->db->table('_gallery')->where('_id', $id)->get()->getRowArray();

        if (!$img) {
            return redirect()->to('AdminPortal/gallery')->with('message', 'Image not found.');
        }

        $albumId = $img['_albumid'];

        // Delete physical file
        if (!empty($img['_imgloc']) && file_exists(FCPATH . $img['_imgloc'])) {
            unlink(FCPATH . $img['_imgloc']);
        }

        $this->db->table('_gallery')->where('_id', $id)->delete();

        // Update image count
        $count = $this->db->table('_gallery')->where('_albumid', $albumId)->countAllResults();
        $this->db->table('_galleryalbum')->where('_album_id', $albumId)->update(['_imagecount' => $count]);

        return redirect()->to('AdminPortal/gallery/images/' . $albumId)
            ->with('message', 'Image deleted successfully.');
    }
}
