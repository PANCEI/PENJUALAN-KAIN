<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Menu extends BaseController
{
    public function index()
    {
        return view('menu/index');
    }
}
