<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];



    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'DATE';
    protected $createdField  = 'tanggal_update';
    protected $table2 = 'akses';
    protected $on='id_akses.akses=id_akses.user';

    public function getuser($email){
    return $this->table($this->table)->join($this->table2, 'user.id_akses=akses.id_akses')->where('email', $email)->first();
    }
}
