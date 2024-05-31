<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        return view('login_view');
    }

    public function process()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        
        if ($username === 'admin' && $password === 'admin') {
            $session = session();
            $session->set('isLoggedIn', true);

            return redirect()->to('/home/index');
        } else {
            return redirect()->to('/login')->with('error', 'Username atau password salah');
        }
    }

    public function logout()
    {
        $session = session();
        $session->remove('isLoggedIn');

        return redirect()->to('/login');
    }
}
