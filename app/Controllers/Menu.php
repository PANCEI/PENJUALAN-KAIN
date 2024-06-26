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
public function tambahMenu()
{
    $namaMenu = $this->request->getVar('nama_menu');
    $urutanMenu = $this->request->getVar('urutan_menu');
    $validation = \Config\Services::validation();
    $validation->setRules([
        'nama_menu' => 'required',
        'urutan_menu' => 'required|numeric'
    ]);

    if (!$validation->run($this->request->getPost())) {
        return "verifikasi";
    }
    $Menu = new \App\Models\UsermenuModel();
    $data = [
        'nama_menu' => $namaMenu,
        'urutan_menu' => $urutanMenu,
    ];


    $save = $Menu->save($data);

    if($save){
       return "berhasil";
    } else {
      return "gagal";
    }
}
    
}
