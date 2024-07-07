<?php

namespace App\Models;

use CodeIgniter\Model;

class SubUserMenuModel extends Model
{
    protected $table            = 'subusermenus';
    protected $primaryKey       = 'id_sub_user_menu';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nama_sub_menu','url','icon','id_user_menu','active','tanggal_update'];

    protected bool $allowEmptyInserts = true;

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';


}
