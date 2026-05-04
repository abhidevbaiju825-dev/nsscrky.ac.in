<?php
namespace App\Controllers;

use App\Models\CarouselModel;

class AdminCarousel extends BaseController
{
    protected $carouselModel;

    public function __construct()
    {
        $this->carouselModel = new CarouselModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $data['carousel_slides'] = $this->carouselModel->orderBy('slide_order', 'ASC')->findAll();

        // If a slide requires dynamic students, fetch them for preview
        foreach ($data['carousel_slides'] as &$slide) {
            if (isset($slide['extra_data']) && is_string($slide['extra_data'])) {
                $slide['extra_data'] = json_decode($slide['extra_data'], true);
            }
            if ($slide['template_type'] === 'ranklist') {
                $slide['students'] = $db->table('_university_toppers')->orderBy('rank', 'ASC')->get()->getResultArray();
                // Note: The table name might be different. Let's make sure it's accessible.
                // Assuming it's '_university_toppers'. We can refine it.
            }
        }

        return view('admin/carousel/index', $data);
    }

    public function save()
    {
        $id = $this->request->getPost('id');
        $extra_data = [];

        // Determine if there are stats or tags being submitted
        $stats = $this->request->getPost('stats');
        if (!empty($stats)) {
            $extra_data['stats'] = json_decode($stats, true);
        }
        $affiliation_top = $this->request->getPost('affiliation_top');
        if (!empty($affiliation_top)) {
            $extra_data['affiliation_top'] = $affiliation_top;
            $extra_data['affiliation_bottom'] = $this->request->getPost('affiliation_bottom');
        }

        $tags = $this->request->getPost('tags');
        if (!empty($tags)) {
            // comma separated tags
            $extra_data['tags'] = array_map('trim', explode(',', $tags));
        }

        $dynamic_students = $this->request->getPost('dynamic_students');
        if ($dynamic_students === '1') {
            $extra_data['dynamic_students'] = true;
        }

        // Keep existing extra_data if we are updating
        if ($id) {
            $existing = $this->carouselModel->find($id);
            if ($existing && !empty($existing['extra_data'])) {
                $old_extra = is_string($existing['extra_data']) ? json_decode($existing['extra_data'], true) : $existing['extra_data'];
                if (is_array($old_extra)) {
                    $extra_data = array_merge($old_extra, $extra_data);
                }
            }
        }

        $data = [
            'template_type'      => $this->request->getPost('template_type') ?: 'hero',
            'slide_eyebrow'      => $this->request->getPost('slide_eyebrow'),
            'slide_title'        => $this->request->getPost('slide_title'),
            'slide_description'  => $this->request->getPost('slide_description'),
            'primary_cta_text'   => $this->request->getPost('primary_cta_text'),
            'primary_cta_link'   => $this->request->getPost('primary_cta_link'),
            'secondary_cta_text' => $this->request->getPost('secondary_cta_text'),
            'secondary_cta_link' => $this->request->getPost('secondary_cta_link'),
            'extra_data'         => $extra_data,
        ];

        if ($id) {
            $this->carouselModel->update($id, $data);
            return redirect()->to('AdminPortal/carousel')->with('message', 'Slide updated successfully.');
        } else {
            // New slide
            $data['slide_order'] = $this->carouselModel->countAllResults() + 1;
            $this->carouselModel->insert($data);
            return redirect()->to('AdminPortal/carousel')->with('message', 'Slide added successfully.');
        }
    }

    public function delete($id)
    {
        $this->carouselModel->delete($id);
        return redirect()->to('AdminPortal/carousel')->with('message', 'Slide removed successfully.');
    }
}
