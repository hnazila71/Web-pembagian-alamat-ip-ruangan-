<?php

namespace App\Controllers;

use App\Models\RoomModel;
use App\Models\ComputerModel;

class RoomController extends BaseController
{
    public function view($id)
    {
        $roomModel = new RoomModel();
        $computerModel = new ComputerModel();

        // Dapatkan data ruangan berdasarkan ID
        $room = $roomModel->find($id);

        if (!$room) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Room with ID $id not found.");
        }

        // Dapatkan semua komputer di dalam ruangan tersebut
        $computers = $computerModel->where('room_id', $id)->findAll();

        // Kirim data ruangan dan komputer ke view
        return view('room_view', [
            'room' => $room,
            'computers' => $computers,
        ]);
    }

    public function addComputer()
    {
        $computerModel = new ComputerModel();



        // Ambil data input
        $data = [
            'computer_name' => $this->request->getPost('computer_name'),
            'ip_address'    => $this->request->getPost('ip_address'),
            'room_id'       => $this->request->getPost('room_id'),
        ];

        // Simpan data ke database
        $computerModel->save($data);

        return redirect()->back()->with('success', 'Komputer berhasil ditambahkan.');
    }

    public function editComputer()
    {
        $computerModel = new ComputerModel();

        // Validasi input
        $rules = [
            'computer_name' => 'required|min_length[3]',
            'ip_address'    => 'required|valid_ip',
            'computer_id'   => 'required|integer',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data dari form
        $data = [
            'computer_name' => $this->request->getPost('computer_name'),
            'ip_address'    => $this->request->getPost('ip_address'),
        ];

        $computer_id = $this->request->getPost('computer_id');

        // Update data di database
        if ($computerModel->update($computer_id, $data)) {
            return redirect()->back()->with('success', 'Komputer berhasil diupdate.');
        } else {
            return redirect()->back()->with('error', 'Gagal mengupdate komputer.');
        }
    }
}
