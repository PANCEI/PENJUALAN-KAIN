<?php
function GetMenuUser(){
    $db=\Config\Database::connect();
    return $db->table('aksesusermenu')
    ->join('usermenu','usermenu.id_user_menu=aksesusermenu.id_user_menu')
    ->orderBy('urutan_menu',"ASC")
    ->getWhere([
        'id_akses'=> session('id_akses')
    ])
    ->getResultArray();
}
function geturl() {
    $uri = service('uri');
    return $uri->getSegment(1);
}
function getSubUserMenu($IdUserMenu){
    $db = \Config\Database::connect();
    return $db->table("subusermenu")
        ->getWhere(
            [
                "id_user_menu" => $IdUserMenu,
                "active" => 1
            ]
        )
        ->getResultArray();
}

?>