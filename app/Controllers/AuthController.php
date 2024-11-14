<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends BaseController
{
    // Menampilkan form registrasi
    public function register()
    {
        // Cek jika sudah login, arahkan ke dashboard
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }

        // Tampilkan halaman registrasi
        return view('register');
    }

    // Menyimpan data pengguna baru
    public function store()
    {
        $model = new UserModel();

        // Mengambil data input
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Hash password untuk keamanan
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Data yang akan disimpan
        $data = [
            'username' => $username,
            'password' => $hashedPassword,
        ];

        // Simpan data ke database dan cek apakah berhasil
        if ($model->save($data)) {
            return redirect()->to('/')->with('success', 'Registrasi berhasil! Silakan login.');
        } else {
            // Jika gagal, kembali ke halaman registrasi dengan pesan error
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data. Silakan coba lagi.');
        }
    }

    // Menampilkan form login
    public function login()
    {
        // Cek jika sudah login, arahkan ke dashboard
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }

        // Tampilkan halaman login
        return view('login');
    }

    // Fungsi autentikasi pengguna
    public function authenticate()
    {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Cari pengguna berdasarkan username
        $user = $model->where('username', $username)->first();

        // Verifikasi password dan login jika cocok
        if ($user && password_verify($password, $user['password'])) {
            // Simpan sesi pengguna
            session()->set([
                'logged_in' => true,
                'username' => $username,
            ]);

            // Arahkan ke dashboard dengan pesan sukses
            return redirect()->to('/dashboard')->with('success', 'Login berhasil!');
        } else {
            // Kembalikan ke login jika gagal
            return redirect()->back()->with('error', 'Username atau password salah.');
        }
    }

    // Fungsi untuk logout pengguna
    public function logout()
    {
        // Hapus sesi pengguna
        session()->destroy();

        // Arahkan ke halaman login dengan pesan sukses
        return redirect()->to('/')->with('success', 'Logout berhasil.');
    }
}
