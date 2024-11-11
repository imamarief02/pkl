<?php

use CodeIgniter\Config\Services;

if (!function_exists('is_logged_in')) {
    /**
     * Memeriksa apakah pengguna sudah login.
     * Jika belum, pengguna akan dialihkan ke halaman login.
     *
     * @return bool
     */
    function is_logged_in()
    {
        // Mengambil instance session
        $session = Services::session();
        
        // Mendapatkan status login pengguna
        $isLoggedIn = $session->get('is_logged_in');
        
        // Jika pengguna sudah login, return true
        if ($isLoggedIn) {
            return true;
        }

        // Jika pengguna belum login, redirect ke halaman login
        return redirect()->to('/login');
    }
}
