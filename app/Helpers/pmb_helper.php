<?php



function is_logged_in()
{
    $db = \Config\Database::connect();
    $request = \Config\Services::request();
    $session = session();
    if (session()->get('email')) {
        return true;
    } else {
        $role_id = session()->get('role_id');
        $menu = $request->uri->getSegment(1);

        $queryMenu = $db->query("SELECT * FROM user_menu WHERE menu= '$menu'");
        $hasil = $queryMenu->getRowArray();
        // dd($hasil);
        // die;
        //$queryMenu = $db->table('user_menu')->getWhere(['menu' => $menu])->getRowArray();
        $menu_id = $hasil['id'];
        $userAccess = $db->query("SELECT * FROM user_access_menu 
                                      WHERE role_id = $role_id 
                                      AND menu_id = $menu_id");

        if ($userAccess->getRowArray() < 1) {
            header('auth/blocked');
        }
        header("Location: /auth");
        exit;
    }
}
