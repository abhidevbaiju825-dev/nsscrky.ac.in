<?php
namespace App\Controllers;

class Home extends BaseController {

    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    private function getCurrentAcademicYear() {
        $month = (int)date('m');
        $year = (int)date('Y');
        return ($month >= 6) ? $year . '-' . ($year + 1) : ($year - 1) . '-' . $year;
    }

    // ─── HOMEPAGE ──────────────────────────────────────────────
    public function index()
    {
        $data['notice_list'] = $this->db->table('_notice')
            ->where('_status', 'active')
            ->orderBy('_display_date', 'DESC')
            ->limit(10)
            ->get()->getResultArray();

        $data['news_list'] = $this->db->table('_news')
            ->orderBy('_newsid', 'DESC')
            ->limit(10)
            ->get()->getResultArray();

        $data['slide_gallery'] = [];

        // V2 Home — Courses for programmes section
        if ($this->db->tableExists('_programmes')) {
            $builder = $this->db->table('_programmes');
            $builder->select('_programmes.*, _departments._department_name');
            $builder->join('_departments', '_departments._dep_id = _programmes.department_id', 'left');
            $builder->orderBy('id', 'ASC');
            $data['programmes'] = $builder->get()->getResultArray();
        } else {
            $data['programmes'] = [];
        }

        // V2 Home — Testimonials for homepage carousel
        $data['testimonials'] = $this->db->tableExists('_testimonials')
            ? $this->db->table('_testimonials')->orderBy('id', 'DESC')->get()->getResultArray()
            : [];

        // V2 Home — Departments for quick reference
        $data['departments'] = $this->db->tableExists('_departments')
            ? $this->db->table('_departments')->orderBy('_department_name', 'ASC')->get()->getResultArray()
            : [];

        // Announcements Ticker
        $data['announcements'] = $this->db->tableExists('_announcements')
            ? $this->db->table('_announcements')->where('is_active', 1)->orderBy('sort_order', 'ASC')->get()->getResultArray()
            : [];

        // Fetch latest year toppers for home page toppers section + carousel
        $latestToppers = [];
        if ($this->db->tableExists('_university_toppers')) {
            // Get the most recent year in the DB
            $latestYearRow = $this->db->table('_university_toppers')
                ->selectMax('year')
                ->get()->getRowArray();
            $latestYear = $latestYearRow['year'] ?? date('Y');

            $latestToppers = $this->db->table('_university_toppers')
                ->where('year', $latestYear)
                ->orderBy('rank', 'ASC')
                ->get()->getResultArray();
        }
        $data['toppers'] = $latestToppers;

        // Fetch Dynamic Carousels
        if ($this->db->tableExists('_carousel_slides')) {
            $slides = $this->db->table('_carousel_slides')
                ->where('is_active', 1)
                ->orderBy('slide_order', 'ASC')
                ->get()->getResultArray();
            
            foreach ($slides as &$s) {
                if (!empty($s['extra_data']) && is_string($s['extra_data'])) {
                    $s['extra_data'] = json_decode($s['extra_data'], true);
                }
                if ($s['template_type'] === 'ranklist' && isset($s['extra_data']['dynamic_students']) && $s['extra_data']['dynamic_students']) {
                    // Inject latest year's toppers into the ranklist carousel slide
                    $s['students'] = $latestToppers;
                }
            }
            $data['carousel_slides'] = $slides;
        } else {
            $data['carousel_slides'] = [];
        }

        return view('home', $data);
    }

    public function slide_preview($id)
    {
        $slide = $this->db->table('_carousel_slides')->where('id', $id)->get()->getRowArray();
        if ($slide && !empty($slide['extra_data'])) {
            $slide['extra_data'] = json_decode($slide['extra_data'], true);
            if ($slide['template_type'] === 'ranklist' && isset($slide['extra_data']['dynamic_students'])) {
                // If dynamic, give it mock students so the admin sees the layout
                $slide['students'] = [
                    ['name' => 'Demo Student', 'rank' => '1st', 'image' => base_url('uploads/static/avatar.png'), 'department' => 'BBA'],
                    ['name' => 'Demo Student 2', 'rank' => '2nd', 'image' => base_url('uploads/static/avatar.png'), 'department' => 'B.Com']
                ];
            }
        }
        $data['slide'] = $slide;
        return view('admin/carousel/slide_preview_wrapper', $data);
    }


    // ─── ABOUT SECTION ─────────────────────────────────────────
    public function about()
    {
        $data = [
            'management' => $this->db->table('_our_management')->get()->getResultArray(),
            'our_team' => $this->db->table('_our_team')->orderBy('_id', 'ASC')->limit(4)->get()->getResultArray(),
            'testimonials_lst' => $this->db->table('_testimonials')->orderBy('id', 'DESC')->get()->getResultArray()
        ];
        return view('main/about', $data);
    }

    public function principal_desk()
    {
        $principalModel = new \App\Models\PrincipalDeskModel();
        $formerModel = new \App\Models\FormerPrincipalModel();

        $data['details_p'] = $principalModel->getActivePrincipal();
        $data['fdet'] = $formerModel->getAll();

        return view('main/principal_desk', $data);
    }

    public function organogram()
    {
        return view('main/organogram');
    }

    public function college_counsil()
    {
        $data = [
            'counsil_det' => $this->db->table('_counsil_incharge')->get()->getResultArray(),
            'counsil_members' => $this->db->table('_counsil_members')->get()->getResultArray()
        ];
        return view('main/college_counsil', $data);
    }

    public function institutional_distinctiveness()
    {
        return view('main/institutional_distinctiveness');
    }

    // ─── STAFF ─────────────────────────────────────────────────
    public function staff($val = "")
    {
        // Dept-wise teacher lists
        $departments = $this->db->table('_departments')->get()->getResultArray();
        $staff_list = [];
        foreach ($departments as $i => $dept) {
            $teachers = $this->db->table('_basic_teacher_registration')
                ->where('_department', $dept['_dep_id'])
                ->where('_role !=', 'nonteachingstaff')
                ->where('_status', 'approved')
                ->orderBy('_order', 'DESC')
                ->get()->getResultArray();
            $dept['_staff_list'] = $teachers;
            $staff_list[$i] = $dept;
        }

        // All teacher list (optionally filtered)
        $builder = $this->db->table('_basic_teacher_registration');
        if ($val != '' && $val != 'All') {
            $builder->where('_department', $val);
        }
        $builder->where('_status', 'approved')
                ->where('_role !=', 'nonteachingstaff')
                ->orderBy('_dateofjoin', 'ASC');
        $all_teacher_list = $builder->get()->getResultArray();

        foreach ($all_teacher_list as &$t) {
            $t['_profile_pic'] = !empty($t['_imgloc']) ? base_url($t['_imgloc']) : base_url('uploads/static/avatar.png');
        }

        $data['_staff_list'] = $staff_list;
        $data['_all_teacher_list'] = $all_teacher_list;
        return view('main/staff', $data);
    }

    public function non_staff($filter = "")
    {
        $nonTeachingRoles = ['nonteachingstaff', 'officestaff', 'librarystaff'];

        // Determine filter type
        $filterType = 'all'; // all, office, library, or department id
        $filterRoles = $nonTeachingRoles;

        if ($filter === 'office') {
            $filterType = 'office';
            $filterRoles = ['officestaff', 'nonteachingstaff'];
        } elseif ($filter === 'library') {
            $filterType = 'library';
            $filterRoles = ['librarystaff'];
        } elseif (is_numeric($filter) && $filter != '') {
            $filterType = 'department';
        }

        // Department list with non-teaching staff counts
        $departments = $this->db->table('_departments')->get()->getResultArray();
        $staff_list = [];
        foreach ($departments as $i => $dept) {
            $staff = $this->db->table('_basic_teacher_registration')
                ->where('_department', $dept['_dep_id'])
                ->whereIn('_role', $nonTeachingRoles)
                ->where('_status', 'approved')
                ->orderBy('_order', 'DESC')
                ->get()->getResultArray();
            $dept['_staff_list'] = $staff;
            $staff_list[$i] = $dept;
        }

        // Main staff query
        $builder = $this->db->table('_basic_teacher_registration');
        if ($filterType === 'department') {
            $builder->where('_department', $filter);
            $builder->whereIn('_role', $nonTeachingRoles);
        } else {
            $builder->whereIn('_role', $filterRoles);
        }
        $builder->where('_status', 'approved')
                ->orderBy('_order', 'DESC');
        $all_teacher_list = $builder->get()->getResultArray();

        $data['_staff_list'] = $staff_list;
        $data['_all_teacher_list'] = $all_teacher_list;
        $data['_active_filter'] = $filter;
        return view('main/non_teaching_staf', $data);
    }

    public function view_teacher_detail($teacher_id)
    {
        $teacher = $this->db->table('_basic_teacher_registration')
            ->where('_teacher_id', $teacher_id)
            ->get()->getRowArray();
        if ($teacher) {
            $teacher['_profile_pic'] = !empty($teacher['_imgloc']) ? base_url($teacher['_imgloc']) : base_url('uploads/static/avatar.png');
            $teacher['array_paper_published'] = [];
        }
        $data['teacher_data'] = $teacher ?: [];
        return view('departments/teacher_profile', $data);
    }

    // ─── DEPARTMENTS ───────────────────────────────────────────
    public function department_view($id, $name = '')
    {
        $dept_data = $this->db->table('_departments')->where('_dep_id', $id)->get()->getRowArray();
        $dept_name = $dept_data['_department_name'] ?? '';

        // Teachers for this department
        $teachers = $this->db->table('_basic_teacher_registration')
            ->where('_department', $id)
            ->where('_role', 'teacher')
            ->where('_status', 'approved')
            ->orderBy('_order', 'ASC')
            ->get()->getResultArray();

        foreach ($teachers as &$t) {
            $t['_profile_pic'] = !empty($t['_imgloc']) ? base_url($t['_imgloc']) : base_url('uploads/static/avatar.png');
            $t['array_paper_published'] = [];
        }

        $hod_name = '';
        foreach ($teachers as $t) {
            if (strpos($t['_designation'] ?? '', '& Head') !== false) {
                $hod_name = $t['_name'];
            }
        }

        // Department news
        $dept_news = $this->db->table('_news')
            ->like('_newsheading', $dept_name)
            ->orderBy('_newsid', 'DESC')
            ->get()->getResultArray();

        // Department clubs
        $dept_club = $this->db->table('_clubandcells')
            ->where('_dept_id', $id)
            ->get()->getResultArray();

        // Department activities
        $department_activity = $this->db->table('_clubactivity')
            ->where('_clubncell_id', $id)
            ->get()->getResultArray();

        // Gallery for this department
        $gallery = $this->db->table('_gallery')
            ->where('_department_id', $id)
            ->get()->getResultArray();

        $gallery_image = [];

        // All departments for sidebar
        $dept = $this->db->table('_departments')->get()->getResultArray();

        // Programmes offered by this department
        $programmes = $this->db->table('_programmes')
            ->where('department_id', $id)
            ->get()->getResultArray();

        $data = [
            'dept' => $dept,
            'dept_data' => $dept_data ?: [],
            'dept_name' => $dept_name,
            'dept_news' => $dept_news,
            'teachers_list' => $teachers,
            'hod_name' => $hod_name,
            'dept_club' => $dept_club,
            'department_activity' => $department_activity,
            'gallery' => $gallery,
            'gallery_images' => [],
            'gallery_image' => $gallery_image,
            'report' => [],
            'programmes' => $programmes,
        ];
        return view('departments/department_page', $data);
    }

    // ─── PROGRAMMES ────────────────────────────────────────────
    public function programs()
    {
        $data['ugcourse_lists'] = $this->db->table('_programmes')
            ->where('type', 'UG')
            ->get()->getResultArray();
        $data['pgcourse_lists'] = $this->db->table('_programmes')
            ->where('type', 'PG')
            ->get()->getResultArray();
        return view('main/programs', $data);
    }

    // AJAX endpoint for programme details modal
    public function course_details()
    {
        $id = $this->request->getPost('course_id');
        $row = $this->db->table('_programmes')->where('id', $id)->get()->getRowArray();
        if ($row) {
            return $this->response->setJSON(['responceData' => [
                '_title'      => $row['title'],
                '_duration'   => $row['duration'],
                '_maxseat'    => $row['max_seats'],
                '_description'=> $row['description'],
                '_eligibity'  => $row['eligibility'] ?? '',
                '_vission'    => $row['vision'] ?? '',
                '_mission'    => $row['mission'] ?? '',
                '_objectives' => $row['objectives'] ?? '',
                '_imgloc'     => $row['image'] ?? '',
                '_syllabus'   => $row['syllabus'] ?? '',
                '_hodmessage' => '',
            ]]);
        }
        return $this->response->setJSON(['responceData' => []]);
    }

    // ─── NEWS & EVENTS ─────────────────────────────────────────
    public function news()
    {
        $data['news_list'] = $this->db->table('_news')
            ->orderBy('_newsid', 'DESC')
            ->get()->getResultArray();
        return view('main/news', $data);
    }

    public function newsdetails($id)
    {
        $data['news_detail'] = $this->db->table('_news')
            ->where('_newsid', $id)
            ->get()->getRowArray();
        return view('main/newsdetails', $data);
    }


    // ─── CLUBS & CELLS ─────────────────────────────────────────
    public function clubsandcells()
    {
        $data['clubs'] = $this->db->table('_clubandcells')
            ->get()->getResultArray();
        return view('main/clubsandcells', $data);
    }

    public function clubdetails($id = "")
    {
        $clubdetails = $this->db->table('_clubandcells')
            ->where('_id', $id)->get()->getRowArray();

        if (!$clubdetails) {
            return redirect()->to('/');
        }

        $year = $this->getCurrentAcademicYear();

        $clubevents = $this->db->table('_clubactivity')
            ->where('_clubncell_id', $id)
            ->where('_academic_year', $year)
            ->get()->getResultArray();

        $gallery = $this->db->table('_gallery')
            ->where('_department_id', $id)
            ->get()->getResultArray();

        $clubModel = new \App\Models\ClubModel();
        $club_members_raw = $clubModel->get_club_tablememberlst_bycellid_new($id, $year);
        // Group members by designation for the view
        $club_members = [];
        foreach ($club_members_raw as $member) {
            $desig = $member['_designation'];
            if (!isset($club_members[$desig])) {
                $club_members[$desig] = ['designation' => $member['_designation'], 'members' => []];
            }
            $club_members[$desig]['members'][] = [
                'org_name' => $member['org_name'] ?? $member['_name'],
                '_desig' => $member['_designation'],
                'acc_data' => $member['acc_data'] ?? ['_imgloc' => '']
            ];
        }

        $data = [
            'clubdetails' => $clubdetails,
            'club_members' => array_values($club_members),
            'clubDesig' => $clubModel->get_clubdesigWithId($id, $year),
            'clubevents' => $clubevents,
            'club_activites' => $clubevents,
            'gallery' => $gallery,
            'gallery_images' => [],
            'gallery_image' => [],
        ];
        return view('main/clubdetails', $data);
    }

    // ─── NSS / NCC ─────────────────────────────────────────────
    public function nss()    { return $this->nationl_service_scheme(); }
    public function ncc()    { return $this->nationl_cadet_corps(); }

    public function nationl_service_scheme()
    {
        $year = $this->getCurrentAcademicYear();
        $data['nss_incharge'] = $this->db->table('_nss_incharges')->where('_academic_year', $year)->get()->getResultArray();
        return view('main/nss_details', $data);
    }

    public function nationl_cadet_corps()
    {
        $ncc = $this->db->table('_clubandcells')
            ->where('_display_as', 'ncc')
            ->get()->getRowArray();

        $nccId = $ncc['_id'] ?? 0;
        $year = $this->getCurrentAcademicYear();

        // Fetch ALL NCC members (both Incharge and Member types) — the view filters by _type
        $allMembers = $this->db->table('_ncc_incharge_member')->where('_academic_year', $year)->get()->getResultArray();

        $data = [
            'ncc_details' => $ncc ?: [],
            'ncc_staf' => $allMembers,
            'club_activity' => $this->db->table('_clubactivity')->where('_clubncell_id', $nccId)->where('_academic_year', $year)->get()->getResultArray(),
            'clubevents' => $this->db->table('_clubactivity')->where('_clubncell_id', $nccId)->where('_academic_year', $year)->get()->getResultArray(),
            'gallery' => [],
            'gallery_images' => [],
            'gallery_image' => [],
            'ncc_mem' => $allMembers,
        ];
        return view('main/ncc_details', $data);
    }

    // ─── PLACEMENT ─────────────────────────────────────────────
    public function placement()
    {
        $allPlacements = $this->db->table('_placement')->get()->getResultArray();
        $data = [
            'dataall' => $allPlacements,
            'year' => [],
            'list' => $allPlacements,
            'incharge_list' => [],
            'placement' => $allPlacements,
            'data2019' => [], 'data2018' => [], 'data2017' => [],
            'data2016' => [], 'data2015' => [],
        ];
        return view('main/placement', $data);
    }

    // ─── ALUMNI ────────────────────────────────────────────────
    public function alumini()
    {
        $data = [
            'data' => [],
            'members' => $this->db->table('_alumini_members')->get()->getResultArray(),
            'activity' => $this->db->tableExists('alumni_activities')
                ? $this->db->table('alumni_activities')->orderBy('id', 'DESC')->get()->getResultArray()
                : [],
            'test' => [],
            'incharges' => [],
        ];
        return view('main/alumini', $data);
    }

    public function alumini_registration()
    {
        return view('alumini/alumini_registration');
    }


    // ─── STUDENT UNION ─────────────────────────────────────────
    public function students_union()
    {
        $year = $this->getCurrentAcademicYear();
        $data = [
            'union_panel_lst' => $this->db->table('_studentunion_panel')->where('_academic_year', $year)->get()->getResultArray(),
            'union_incharge_lst' => $this->db->table('_studentunion_incharge')->where('_academic_year', $year)->get()->getResultArray(),
            'union_activities_lst' => $this->db->table('_studentunion_activities')->where('_academic_year', $year)->get()->getResultArray(),
            'union_gallery_lst' => $this->db->table('_studentunion_gallery')->where('_academic_year', $year)->get()->getResultArray(),
        ];
        return view('main/students_union', $data);
    }

    // ─── SCHOLARSHIP ───────────────────────────────────────────
    public function scholarship()
    {
        $data['scholarship_lst'] = $this->db->table('_scholarship')->get()->getResultArray();
        return view('main/scholarship', $data);
    }

    public function scholarship_details($id)
    {
        $data['scholarship_details'] = $this->db->table('_scholarship')->where('_scholarship_id', $id)->get()->getRowArray();
        return view('main/scholarship_details', $data);
    }

    // ─── UGC PROJECTS ──────────────────────────────────────────
    public function ugc_projects()
    {
        $data['ugc_list'] = $this->db->table('_ugcprojects')
            ->get()->getResultArray();
        return view('main/ugc_projects', $data);
    }

    // ─── DOWNLOADS ─────────────────────────────────────────────
    public function downloads()
    {
        $data['down_list'] = $this->db->table('_web_downloads')->orderBy('_order', 'ASC')->get()->getResultArray();
        return view('main/downloads', $data);
    }

    // ─── IQAC / NAAC / NIRF ────────────────────────────────────
    public function iqac()
    {
        $db = \Config\Database::connect();

        // Load settings
        $rows = $db->table('_iqac_settings')->get()->getResultArray();
        $data['settings'] = [];
        foreach ($rows as $row) {
            $data['settings'][$row['setting_key']] = $row['setting_value'];
        }

        // Load documents grouped by category
        $allDocs = $db->table('_iqac_documents')->orderBy('sort_order', 'ASC')->get()->getResultArray();
        $data['documents'] = [];
        foreach ($allDocs as $doc) {
            $data['documents'][$doc['category']][] = $doc;
        }

        return view('main/iqac', $data);
    }

    public function aqar()
    {
        $db = \Config\Database::connect();
        $data['reports'] = $db->table('_iqac_documents')
                              ->where('category', 'aqar')
                              ->orderBy('sort_order', 'ASC')
                              ->get()->getResultArray();
        return view('main/aqar', $data);
    }

    public function best()
    {
        $db = \Config\Database::connect();
        $data['reports'] = $db->table('_iqac_documents')
                              ->where('category', 'best_practices')
                              ->orderBy('sort_order', 'ASC')
                              ->get()->getResultArray();
        return view('main/best', $data);
    }

    public function nirf()
    {
        return view('main/nirf');
    }

    public function nirf1()
    {
        return view('main/nirf1');
    }

    public function aqar1()
    {
        return view('main/aqar1');
    }

    public function naac_certificates()
    {
        $data['certificates'] = $this->db->table('_naac_certificates')->get()->getResultArray();
        return view('main/naac_certificates', $data);
    }

    public function naac_journey()
    {
        $data = [
            'naac' => $this->db->table('_naac_journey')->get()->getResultArray(),
            'cordinators' => $this->db->table('_naac_cordinators')->get()->getResultArray()
        ];
        return view('main/naac_journey', $data);
    }

    public function naac_minutes()
    {
        return view('main/naac_minutes');
    }

    public function naac_self_stdy_report()
    {
        return view('main/naac_selfstudey');
    }

    public function iqacresult()
    {
        return view('main/iqacresult');
    }

    // ─── STATIC / SIMPLE PAGES ─────────────────────────────────
    public function contact()         { return view('main/contact'); }
    public function rti()
    {
        $db = \Config\Database::connect();
        $data['declaration'] = $db->table('_rti')->where('category', 'statutory_declaration')->get()->getRowArray();
        $data['officers'] = $db->table('_rti')->where('category', 'officer')->orderBy('sort_order', 'ASC')->get()->getResultArray();
        return view('main/rti', $data);
    }
    public function research()        { return view('main/research'); }
    public function codeofconduct()   { return view('main/codeofconduct'); }
    public function college_examination() { return view('main/college_examination'); }
    public function onlineresourses() { $data = ['course'=>[],'subject'=>[],'online'=>[],'subandcourse'=>[],'flag'=>'yes']; return view('main/onlineresourse', $data); }
    public function syllabus()        
    { 
        $data['ugcourse_lists'] = $this->db->table('_programmes')
            ->where('type', 'UG')
            ->get()->getResultArray();
        $data['pgcourse_lists'] = $this->db->table('_programmes')
            ->where('type', 'PG')
            ->get()->getResultArray();
        return view('syllabus/syllabus', $data); 
    }
    public function rank_holder()     { return view('main/rank_holder'); }
    public function fee()             { return view('main/fee'); }
    public function university_toppers() { $data['data'] = $this->db->table('_university_toppers')->orderBy('rank', 'ASC')->get()->getResultArray(); return view('main/university_toppers', $data); }
    public function greivence_cell()
    {
        $db = \Config\Database::connect();
        $data['item'] = $db->table('_grievance_cell')->get()->getRowArray();
        return view('main/greivence_cell', $data);
    }

    public function pta()
    {
        $db = \Config\Database::connect();
        $data['pta_about'] = $db->table('_pta')->where('category', 'about')->get()->getRowArray();
        $items = $db->table('_pta')->whereNotIn('category', ['about'])->orderBy('sort_order', 'ASC')->get()->getResultArray();
        
        $data['president'] = array_filter($items, fn($i) => $i['category'] === 'president');
        $data['secretary'] = array_filter($items, fn($i) => $i['category'] === 'secretary');
        $data['incharge']  = array_filter($items, fn($i) => $i['category'] === 'incharge');
        $data['members']   = array_filter($items, fn($i) => $i['category'] === 'member');
        $data['activities']= array_filter($items, fn($i) => $i['category'] === 'activity');
        
        return view('main/pta', $data);
    }

    public function anti_ragging_cell()
    {
        $db = \Config\Database::connect();
        $data['anti_ragging'] = $db->table('_anti_ragging')->get()->getRowArray();
        return view('main/anti_ragging_cell', $data);
    }
    public function genderequity()    { return view('genderequity/genderequity'); }
    public function internal()        { return view('main/internal'); }
    public function events()          { $data['events_list'] = []; return view('main/events', $data); }
    public function eventdetails($id) { $data['event_detail'] = []; return view('main/eventdetails', $data); }
    public function sub_downloads()   { return view('main/sub_downloads'); }

    // ─── ACTIVITY DETAIL VIEWS ─────────────────────────────────
    public function activity_detailed_view($id = "")
    {
        $data['activity'] = $this->db->table('_clubactivity')
            ->where('_id', $id)->get()->getRowArray();
        $data['news'] = [];
        return view('nss_activity/activity_details', $data);
    }

    public function department_activity($id = "")
    {
        $data['dept_activity'] = $this->db->table('_clubactivity')
            ->where('_id', $id)->get()->getRowArray();
        return view('nss_activity/activity_details', $data);
    }

    public function alumni_detailed_view($id = "")
    {
        $data['alumnidata'] = [];
        return view('nss_activity/activity_details', $data);
    }

    // ─── CATCH-ALL REMAP ───────────────────────────────────────
    public function _remap($method, ...$params)
    {
        if (method_exists($this, $method)) {
            return $this->$method(...$params);
        }

        // Try to locate a view in main folder directly
        if (is_file(APPPATH . 'Views/main/' . $method . '.php')) {
            return view('main/' . $method, ['data' => []]);
        }

        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    public function submit_grievance()
    {
        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message'),
            'status'  => 'pending'
        ];

        if ($this->db->table('_complaints')->insert($data)) {
            return redirect()->back()->with('success', 'Your grievance has been submitted successfully. We will review it soon.');
        }

        return redirect()->back()->with('error', 'There was an error submitting your grievance. Please try again.');
    }

    // ─── PUBLIC GALLERY ───────────────────────────────────────
    public function gallery()
    {
        // Fetch all albums with their first image as cover
        $albums = $this->db->table('_galleryalbum')
            ->orderBy('_created_at', 'DESC')
            ->get()->getResultArray();

        foreach ($albums as &$album) {
            $cover = $this->db->table('_gallery')
                ->where('_albumid', $album['_album_id'])
                ->orderBy('_id', 'ASC')
                ->limit(1)
                ->get()->getRowArray();
            $album['cover'] = $cover['_imgloc'] ?? null;

            $album['image_count'] = $this->db->table('_gallery')
                ->where('_albumid', $album['_album_id'])
                ->countAllResults();
        }

        $data['albums'] = $albums;
        return view('main/gallery', $data);
    }

    public function view_gallery($albumId)
    {
        $data['album'] = $this->db->table('_galleryalbum')
            ->where('_album_id', $albumId)
            ->get()->getRowArray();

        if (!$data['album']) {
            return redirect()->to('Home/gallery');
        }

        $data['images'] = $this->db->table('_gallery')
            ->where('_albumid', $albumId)
            ->orderBy('_id', 'DESC')
            ->get()->getResultArray();

        return view('main/view_gallery', $data);
    }

    public function submit_enquiry()
    {
        $enquiryModel = new \App\Models\EnquiryModel();

        $data = [
            'name'    => $this->request->getPost('name'),
            'phone'   => $this->request->getPost('phone'),
            'email'   => $this->request->getPost('email'),
            'message' => $this->request->getPost('message'),
            'status'  => 'New',
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($enquiryModel->insert($data)) {
            return redirect()->to(base_url('Home/contact'))->with('status', 'Your enquiry has been sent successfully.');
        } else {
            return redirect()->to(base_url('Home/contact'))->with('status', 'Failed to send enquiry.');
        }
    }

    public function submit_antiragging_complaint()
    {
        $subject = $this->request->getPost('subject');
        $complaint = $this->request->getPost('complaint');

        if (!empty($subject) && !empty($complaint)) {
            $this->db->table('_anti_ragging_complaints')->insert([
                'subject' => $subject,
                'complaint' => $complaint,
                'status' => 'pending',
                'created_at' => date('Y-m-d H:i:s')
            ]);
            return redirect()->to(base_url('Home/anti_ragging_cell'))->with('success', 'Your anonymous complaint has been submitted successfully and securely.');
        }

        return redirect()->to(base_url('Home/anti_ragging_cell'))->with('error', 'Please fill in all required fields.');
    }
}
