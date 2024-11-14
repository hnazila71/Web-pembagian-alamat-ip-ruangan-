<?php

namespace App\Models;

use CodeIgniter\Model;

class ComputerModel extends Model
{
    protected $table = 'computers';
    protected $allowedFields = ['room_id', 'computer_name', 'ip_address'];
}
