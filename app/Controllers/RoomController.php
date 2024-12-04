<?php

namespace App\Controllers;

use App\Models\RoomModel;
use App\Models\ComputerModel;

class RoomController extends BaseController
{
    protected $roomModel;
    protected $computerModel;

    public function __construct()
    {
        $this->roomModel = new RoomModel();
        $this->computerModel = new ComputerModel();
    }

    // Menampilkan data ruangan dan komputer berdasarkan ID ruangan
    public function view($id)
    {
        $room = $this->roomModel->find($id);
        if (!$room) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Ruangan dengan ID $id tidak ditemukan.");
        }

        $computers = $this->computerModel->where('room_id', $id)->findAll();
        $isAdmin = $this->isAdmin();

        // Tampilkan view berdasarkan role
        $view = $isAdmin ? 'room_view_admin' : 'room_view_viewer';
        return view($view, [
            'room' => $room,
            'computers' => $computers,
        ]);
    }

    // Menambah komputer baru ke ruangan
    public function addComputer()
    {
        if (!$this->isAdmin()) {
            return $this->redirectDenied();
        }

        // Validasi input
        $rules = [
            'computer_name' => 'required|min_length[3]',
            'ip_address'    => 'required|valid_ip',
            'room_id'       => 'required|integer|is_not_unique[rooms.id]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data komputer ke database
        $data = [
            'computer_name' => $this->request->getPost('computer_name'),
            'ip_address'    => $this->request->getPost('ip_address'),
            'room_id'       => $this->request->getPost('room_id'),
        ];
        $this->computerModel->save($data);

        return redirect()->back()->with('success', 'Komputer berhasil ditambahkan.');
    }

    // Mengedit data komputer
    public function editComputer()
    {
        if (!$this->isAdmin()) {
            return $this->redirectDenied();
        }

        // Validasi input
        $rules = [
            'computer_id'   => 'required|integer|is_not_unique[computers.id]',
            'computer_name' => 'required|min_length[3]',
            'ip_address'    => 'required|valid_ip',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $computerId = $this->request->getPost('computer_id');
        $data = [
            'computer_name' => $this->request->getPost('computer_name'),
            'ip_address'    => $this->request->getPost('ip_address'),
        ];

        // Update data komputer
        if ($this->computerModel->update($computerId, $data)) {
            return redirect()->back()->with('success', 'Komputer berhasil diupdate.');
        }

        return redirect()->back()->with('error', 'Gagal mengupdate komputer.');
    }

    // Menambah ruangan baru
    public function addRoom()
    {
        if (!$this->isAdmin()) {
            return $this->redirectDenied();
        }

        // Validasi input
        $rules = [
            'name' => 'required|min_length[3]|is_unique[rooms.name]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data ruangan ke database
        $this->roomModel->save(['name' => $this->request->getPost('name')]);

        return redirect()->back()->with('success', 'Ruangan berhasil ditambahkan.');
    }

    // Fungsi untuk mengecek apakah user adalah admin
    private function isAdmin()
    {
        return session()->get('role') === 'admin';
    }

    // Redirect jika akses ditolak
    private function redirectDenied()
    {
        return redirect()->to('/dashboard')->with('error', 'Akses ditolak! Hanya admin yang diizinkan.');
    }
}
