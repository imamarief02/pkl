<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends BaseController
{
    public function __construct()
    {
		
 
		
    }
	
	public function validasiLogin(){
		
		
	}

    public function index()
    {
		
        // Memastikan pengguna sudah login sebelum mengakses controller ini
        $session = session(); // Mendapatkan session instance
				
		$isLoggedIn = $session->get('is_logged_in');

		if ($isLoggedIn) {
			//echo "Pengguna sudah login.";
		} else {
			echo "Pengguna Belum login.";
			return redirect()->to('/login');  // Tidak akan bekerja
		}
		
		
		//print_r($_SESSION);
        return view('dashboard');
    }

    public function profile()
    {		
        // Memastikan pengguna sudah login sebelum mengakses controller ini
        $session = session(); // Mendapatkan session instance
				
		$isLoggedIn = $session->get('is_logged_in');

		if ($isLoggedIn) {
			//echo "Pengguna sudah login.";
		} else {
			echo "Pengguna Belum login.";
			return redirect()->to('/login');  // Tidak akan bekerja
		}
        return view('profile');
    }

    public function settings()
    {		
        // Memastikan pengguna sudah login sebelum mengakses controller ini
        $session = session(); // Mendapatkan session instance
				
		$isLoggedIn = $session->get('is_logged_in');

		if ($isLoggedIn) {
			//echo "Pengguna sudah login.";
		} else {
			echo "Pengguna Belum login.";
			return redirect()->to('/login');  // Tidak akan bekerja
		}
		
        return view('setting');
    }
}

