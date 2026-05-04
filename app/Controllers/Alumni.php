<?php

namespace App\Controllers;

use App\Models\AlumniUserModel;
use App\Models\AlumniEducationModel;
use App\Models\AlumniExperienceModel;
use App\Models\AlumniActivityModel;

class Alumni extends BaseController
{
    protected $alumniUserModel;
    protected $alumniEducationModel;
    protected $alumniExperienceModel;
    protected $alumniActivityModel;

    public function __construct()
    {
        $this->alumniUserModel = new AlumniUserModel();
        $this->alumniEducationModel = new AlumniEducationModel();
        $this->alumniExperienceModel = new AlumniExperienceModel();
        $this->alumniActivityModel = new AlumniActivityModel();
        
        $this->session = \Config\Services::session();
    }

    // --- Public Directory & Activities ---
    public function index()
    {
        $data['alumni'] = $this->alumniUserModel->where('status', 'approved')->orderBy('id', 'DESC')->get()->getResultArray();
        $data['activities'] = $this->alumniActivityModel->orderBy('id', 'DESC')->get()->getResultArray();
        return view('alumni/index', $data);
    }

    // --- Authentication ---
    public function login()
    {
        if ($this->session->get('alumni_logged_in')) {
            return redirect()->to('alumni/dashboard');
        }
        return view('alumni/login');
    }

    public function attemptLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->alumniUserModel->where('email', $email)->get()->getRowArray();

        if ($user) {
            if ($user['status'] == 'pending') {
                return redirect()->back()->with('error', 'Your registration is still pending approval by the administration.');
            }
            if ($user['status'] == 'rejected') {
                return redirect()->back()->with('error', 'Your registration was rejected. Please contact the college.');
            }
            
            if (password_verify((string)$password, $user['password_hash'])) {
                $this->session->set([
                    'alumni_id'        => $user['id'],
                    'alumni_name'      => $user['full_name'],
                    'alumni_logged_in' => true,
                ]);
                return redirect()->to('alumni/dashboard')->with('success', 'Welcome back, ' . $user['full_name']);
            }
        }
        return redirect()->back()->with('error', 'Invalid email or password.');
    }

    public function logout()
    {
        $this->session->remove(['alumni_id', 'alumni_name', 'alumni_logged_in']);
        return redirect()->to('alumni')->with('success', 'Logged out successfully.');
    }

    // --- Registration ---
    public function register()
    {
        return view('alumni/register');
    }

    public function submitRegistration()
    {
        // Validation rules can be added here
        $email = $this->request->getPost('email');
        if($this->alumniUserModel->where('email', $email)->countAllResults() > 0) {
            return redirect()->back()->with('error', 'This email is already registered.');
        }

        $password = $this->request->getPost('password');
        $password_confirmation = $this->request->getPost('password_confirmation');
        
        if ($password !== $password_confirmation) {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }

        // Handle profile picture
        $file = $this->request->getFile('profile_picture');
        $imgloc = null;
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/alumni_profiles', $newName);
            $imgloc = 'uploads/alumni_profiles/' . $newName;
        }

        $data = [
            'email'           => $email,
            'password_hash'   => password_hash((string)$password, PASSWORD_DEFAULT),
            'full_name'       => $this->request->getPost('full_name'),
            'phone'           => $this->request->getPost('phone'),
            'dob'             => $this->request->getPost('dob'),
            'gender'          => $this->request->getPost('gender'),
            'blood_group'     => $this->request->getPost('blood_group'),
            'passout_year'    => $this->request->getPost('passout_year'),
            'address'         => $this->request->getPost('address'),
            'location'        => $this->request->getPost('location'),
            'profile_picture' => $imgloc,
            'status'          => 'pending',
            'created_at'      => date('Y-m-d H:i:s'),
            'updated_at'      => date('Y-m-d H:i:s'),
        ];

        $this->alumniUserModel->insert($data);
        return redirect()->to('alumni/login')->with('success', 'Registration submitted successfully! Please wait for administration approval before logging in.');
    }

    // --- Protected Dashboard ---
    private function checkAuth()
    {
        if (!$this->session->get('alumni_logged_in')) {
            return false;
        }
        return true;
    }

    public function dashboard()
    {
        if (!$this->checkAuth()) return redirect()->to('alumni/login');
        
        $alumniId = $this->session->get('alumni_id');
        $data['profile'] = $this->alumniUserModel->find($alumniId);
        $data['education'] = $this->alumniEducationModel->where('alumni_id', $alumniId)->get()->getResultArray();
        $data['experience'] = $this->alumniExperienceModel->where('alumni_id', $alumniId)->get()->getResultArray();
        
        return view('alumni/dashboard', $data);
    }

    public function addEducation()
    {
        if (!$this->checkAuth()) return redirect()->to('alumni/login');
        
        $this->alumniEducationModel->insert([
            'alumni_id'   => $this->session->get('alumni_id'),
            'course'      => $this->request->getPost('course'),
            'institution' => $this->request->getPost('institution'),
            'from_year'   => $this->request->getPost('from_year'),
            'to_year'     => $this->request->getPost('to_year'),
        ]);
        
        return redirect()->back()->with('success', 'Education record added.');
    }

    public function addExperience()
    {
        if (!$this->checkAuth()) return redirect()->to('alumni/login');
        
        $this->alumniExperienceModel->insert([
            'alumni_id'   => $this->session->get('alumni_id'),
            'company'     => $this->request->getPost('company'),
            'designation' => $this->request->getPost('designation'),
            'description' => $this->request->getPost('description'),
            'from_year'   => $this->request->getPost('from_year'),
            'to_year'     => $this->request->getPost('to_year'),
        ]);
        
        return redirect()->back()->with('success', 'Experience record added.');
    }

    public function dropEducation($id)
    {
        if (!$this->checkAuth()) return redirect()->to('alumni/login');
        // Ensure the record belongs to the logged in alumni
        $this->alumniEducationModel->where('alumni_id', $this->session->get('alumni_id'))->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Education record removed.');
    }

    public function dropExperience($id)
    {
        if (!$this->checkAuth()) return redirect()->to('alumni/login');
        $this->alumniExperienceModel->where('alumni_id', $this->session->get('alumni_id'))->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Experience record removed.');
    }
}
