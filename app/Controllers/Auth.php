<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index(): string
    {
        return view('login');
    }

    public function autentikasi()
    {
        $session = session();
        $userModel = new UserModel();

        // Ambil input dari form login
        $usernameOrEmail = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari pengguna berdasarkan username atau email
        $user = $userModel->where('username', $usernameOrEmail)
            ->orWhere('email', $usernameOrEmail)
            ->first();

        // Validasi keberadaan pengguna
        if ($user) {
            // Verifikasi password
            if (password_verify($password, $user['password'])) {
                // Simpan informasi pengguna ke dalam sesi
                $sessionData = [
                    'id_user' => $user['id_user'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'isLoggedIn' => true,
                ];
                $session->set($sessionData);

                // Redirect ke halaman dashboard sesuai role
                if ($user['role'] == 1) {
                    return redirect()->to('/AdminGudang/dashboard');
                } elseif ($user['role'] == 2) {
                    return redirect()->to('/KepalaGudang/dashboard');
                }
            } else {
                // Password salah
                return redirect()->back()->with('error', 'Password salah.');
            }
        } else {
            // Pengguna tidak ditemukan
            return redirect()->back()->with('error', 'Username tidak ditemukan.');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy(); 
        
        return redirect()->to('/')->with('success', 'Anda telah berhasil logout.');
    }
}
