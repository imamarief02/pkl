<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;
use CodeIgniter\I18n\Time;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function login()
    {
        return view('auth/login');
    }

    // Proses login
    public function loginProcess()
    {
		
        // Validasi input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->to('/login')->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil data input
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Cek apakah email dan password sesuai
        $userModel = new UserModel();
        $user = $userModel->where('email', $email)->first();

        if ($user && md5($password)) {
            // Set session user
            session()->set([
                'user_id'   => $user['id'],
                'email'     => $user['email'],
                'is_logged_in' => true
            ]);

            // Redirect ke halaman dashboard
            return redirect()->to('/dashboard');
        }

        // Jika gagal login, kembali ke halaman login dengan pesan error
        return redirect()->to('/login')->withInput()->with('error', 'Email atau password salah.');
    }

    // Proses logout
    public function logout()
    {
        // Hapus session user
        session()->remove('user_id');
        session()->remove('email');
        session()->remove('is_logged_in');

        // Redirect ke halaman login
        return redirect()->to('/login');
    }
}
