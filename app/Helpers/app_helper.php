<?php
function GetMenuUser(){
    $db=\Config\Database::connect();
    return $db->table('aksesusermenu')
    ->join('usermenu','usermenu.id_user_menu=aksesusermenu.id_user_menu')
      ->join('subusermenu','usermenu.id_user_menu=subusermenu.id_sub_user_menu')
    ->orderBy('urutan_menu',"ASC")
    ->getWhere([
        'id_akses'=> session('id_akses'),
        'active'=>1
    ])
    ->getResultArray();
}
function geturl() {
    $uri = service('uri');
    return $uri->getSegment(1);
}

?>