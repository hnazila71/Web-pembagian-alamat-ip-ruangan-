<?php

namespace App\Controllers;

use App\Models\RoomModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $roomModel = new RoomModel();
        $rooms = $roomModel->findAll();
        return view('dashboard', ['rooms' => $rooms]);
    }

    public function addRoom()
    {
        return view('add_room');
    }

    public function storeRoom()
    {
        $roomModel = new RoomModel();
        $data = ['name' => $this->request->getPost('name')];
        $roomModel->insert($data);
        return redirect()->to('/dashboard');
    }
}
