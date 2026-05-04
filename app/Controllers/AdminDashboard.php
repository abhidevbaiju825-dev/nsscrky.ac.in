<?php
namespace App\Controllers;

class AdminDashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        // Basic stats for dashboard
        $data = [
            'news_count' => $db->table('_news')->countAllResults(),
            'gallery_count' => $db->table('_gallery')->countAllResults(),
            'notice_count' => $db->table('_notice')->countAllResults(),
            'dept_count' => $db->table('_departments')->countAllResults(),
            'grievance_count' => $db->table('_complaints')->where('status', 'pending')->countAllResults(),
            'enquiry_count' => $db->table('enquiries')->where('status', 'New')->countAllResults(),
            'latest_grievances' => $db->table('_complaints')->orderBy('created_at', 'DESC')->limit(5)->get()->getResultArray(),
            'latest_enquiries' => $db->table('enquiries')->orderBy('created_at', 'DESC')->limit(5)->get()->getResultArray(),
        ];

        return view('admin/dashboard', $data);
    }

    public function setAcademicYear()
    {
        $year = $this->request->getPost('academic_year');
        if ($year) {
            session()->set('academic_year', $year);
        }
        return redirect()->back()->with('message', 'Academic year context updated to ' . $year);
    }
}
