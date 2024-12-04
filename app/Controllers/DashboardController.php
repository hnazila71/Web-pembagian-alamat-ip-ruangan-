<?php

namespace App\Controllers;

use App\Models\RoomModel;
use App\Models\ComputerModel;

class DashboardController extends BaseController
{
    public function index()
    {
        // Mendapatkan data room
        $roomModel = new RoomModel();
        $rooms = $roomModel->findAll();

        // Cek role user, jika viewer hanya menampilkan data room tanpa bisa menambah
        $role = session()->get('role');
        
        // Tampilkan halaman dashboard dengan data room dan role
        if ($role === 'admin') {
            return view('admin_dashboard', [
                'rooms' => $rooms,
                'role' => $role
            ]);
        } elseif ($role === 'viewer') {
            return view('viewer_dashboard', [
                'rooms' => $rooms,
                'role' => $role
            ]);
        }

        // Jika tidak ada role yang sesuai, redirect ke login
        return redirect()->to('/login');
    }

    // Menampilkan form untuk menambah room
    public function addRoom()
    {
        // Cek apakah pengguna adalah admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak! Hanya admin yang bisa menambah room.');
        }

        // Tampilkan halaman form tambah room
        return view('add_room');
    }

    // Menyimpan data room baru
    public function storeRoom()
    {
        // Cek apakah pengguna adalah admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak! Hanya admin yang bisa menambah room.');
        }

        // Menyimpan data room
        $roomModel = new RoomModel();
        $data = ['name' => $this->request->getPost('name')];
        $roomModel->insert($data);

        // Redirect kembali ke dashboard setelah sukses
        return redirect()->to('/dashboard')->with('success', 'Room berhasil ditambahkan.');
    }

    // Menampilkan form untuk menambah komputer
    public function addComputer()
    {
        // Cek apakah pengguna adalah admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak! Hanya admin yang bisa menambah komputer.');
        }

        // Tampilkan halaman form tambah komputer
        return view('add_computer');
    }

    // Menyimpan data komputer baru
    public function storeComputer()
    {
        // Cek apakah pengguna adalah admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak! Hanya admin yang bisa menambah komputer.');
        }

        // Menyimpan data komputer
        $computerModel = new ComputerModel();
        $data = [
            'room_id' => $this->request->getPost('room_id'),
            'name' => $this->request->getPost('name'),
            'ip_address' => $this->request->getPost('ip_address'),
        ];
        $computerModel->insert($data);

        // Redirect kembali ke dashboard setelah sukses
        return redirect()->to('/dashboard')->with('success', 'Komputer berhasil ditambahkan.');
    }

    // Menghapus room
    public function deleteRoom($id)
    {
        // Cek apakah pengguna adalah admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak! Hanya admin yang bisa menghapus room.');
        }

        // Menghapus room
        $roomModel = new RoomModel();
        $roomModel->delete($id);

        // Redirect kembali ke dashboard setelah sukses
        return redirect()->to('/dashboard')->with('success', 'Room berhasil dihapus.');
    }

    // Menghapus komputer
    public function deleteComputer($id)
    {
        // Cek apakah pengguna adalah admin
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak! Hanya admin yang bisa menghapus komputer.');
        }

        // Menghapus komputer
        $computerModel = new ComputerModel();
        $computerModel->delete($id);

        // Redirect kembali ke dashboard setelah sukses
        return redirect()->to('/dashboard')->with('success', 'Komputer berhasil dihapus.');
    }
}
