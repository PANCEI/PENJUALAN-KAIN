<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends BaseController
{
    public function index()
    {
     
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        if (!$username || !$password) {
            return view('Login/index');
        }

        $userModel = new \App\Models\UserModel(); // Asumsikan Anda memiliki UserModel
        $user = $userModel->getuser($username);

        if (!$user || !password_verify($password, $user['password'])) {
         
            return view('Login/index', ['error' => 'Username atau password salah.']);
        }

        // Set session data atau lakukan tindakan lain setelah login berhasil
        $sessionData = [
            'username' => $user['nama_lengkap'],
            'akses' => $user['akses'],
        ];
        session()->set($sessionData);

        return redirect()->to('/dashboard'); // Asumsikan Anda memiliki route ke dashboard
    }

    public function out(){
        session()->destroy();
        return redirect()->to('/');
    }
}

