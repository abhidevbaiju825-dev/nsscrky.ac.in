<?php

namespace App\Controllers;

class AdminAuth extends BaseController
{
    public function login()
    {
        // If already logged in, redirect to admin dashboard
        if (session()->get('isLoggedIn') && session()->get('role') === 'admin') {
            return redirect()->to('AdminPortal'); // Or target dashboard
        }

        return view('admin/login');
    }

    public function attemptLogin()
    {
        $db = \Config\Database::connect();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $db->table('admin_users')->where('username', $username)->get()->getRowArray();

        if ($user && password_verify((string)$password, $user['password_hash'])) {
            // Set session
            session()->set([
                'admin_id'   => $user['id'],
                'username'   => $user['username'],
                'role'       => $user['role'],
                'isLoggedIn' => true,
            ]);
            
            return redirect()->to('AdminPortal');
        }

        return redirect()->back()->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('nssmanage')->with('message', 'Successfully logged out.');
    }
}
