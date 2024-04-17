<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Menu extends BaseController
{
    public function index()
    {
        $Menu = new \App\Models\UsermenuModel();
        $data =[
            'menu'=> $Menu->orderBy('urutan_menu', 'ASC')->findAll()
        ] ;   
        return view('menu/index', $data);
    }
}
