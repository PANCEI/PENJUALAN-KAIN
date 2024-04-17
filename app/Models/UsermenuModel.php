<?php

namespace App\Models;

use CodeIgniter\Model;

class UsermenuModel extends Model
{
    protected $table            = 'usermenu';
    protected $primaryKey       = 'id_user_menu';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_menu', 'urutan_menu'];
    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'date';
    protected $createdField  = 'tanggal_update';
    protected $updatedField  = 'tanggal_update';
    
}
