<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
        $session = session();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        if (!$username || !$password) {
            return view('Login/index');
        }

        $userModel = new \App\Models\UserModel(); // Asumsikan Anda memiliki UserModel
        $user = $userModel->where('email', $username)->first();
      
dd($user);
        if (!$user || !password_verify($password, $user['password'])) {
           echo "masuk ke dalam sini";                      
            dd();
            return view('Login/index', ['error' => 'Username atau password salah.']);
        }

        // Set session data atau lakukan tindakan lain setelah login berhasil
        $sessionData = [
            'username' => $user['username'],
            'isLoggedIn' => true,
        ];
        $session->set($sessionData);

        return redirect()->to('/dashboard'); // Asumsikan Anda memiliki route ke dashboard
    }

    public function cek(){
    
    }
}