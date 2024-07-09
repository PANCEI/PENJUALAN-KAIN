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
public function SubMenu(){
    $sub_menu= new \App\Models\SubUserMenuModel();
    $menu=new \App\Models\UsermenuModel();
    $data = [
        'sub_menu' => $sub_menu->getSubMenu(),
        'menu'=>$menu->findAll()
    ];

    return view('submenu/index',$data);
}
public function deleteMenu(){
    $id=$this->request->getVar('id');
    $Menu = new \App\Models\UsermenuModel();
    $delete = $Menu->delete($id);

    if($delete){
       return "berhasil";
    } else {
      return "gagal";
    }
}
public function editSubMenu(){
$id_sub_menu=$this->request->getVar('id_sub_user_menu');
$nama_sub_menu=$this->request->getVar('nama_sub_menu');
$url=$this->request->getVar('url');
$icon=$this->request->getVar('icon');
$id_menu=$this->request->getVar('id_menu');
$validation = \Config\Services::validation();  
$validation->setRules([
    'id_sub_user_menu' => 'required',
    'nama_sub_menu' => 'required',
    'url' => 'required',
    'icon' => 'required',
    'id_menu' => 'required'
]);


if (!$validation->run($this->request->getPost())) {
    session()->setFlashdata('error', 'Data Yang Dimasukan Tidak lengkap');
    return redirect()->to('/menu/submenu');
}else{
    $sub_menu= new \App\Models\SubUserMenuModel();
    $data = [
        'nama_sub_menu' => $nama_sub_menu,
        'url' => $url,
        'icon'=>$icon,
        'id_menu'=>$id_menu
    ];
  $cek=  $sub_menu->update($id_sub_menu,$data);
  if($cek){
      session()->setFlashdata('success', 'Data berhasil Di updates');
      return redirect()->to('/menu/submenu');
  }else{
    session()->setFlashdata('success', 'Gagal Melakukan Update pada data');
      return redirect()->to('/menu/submenu');
  }
}

}
public function editStatus(){
    $id=$this->request->getVar('id');
    $active=$this->request->getVar('active');
    if($active == 1){
        $status= 0;
    }elseif($active==0){
        $status = 1;
    }
    
}   
}
