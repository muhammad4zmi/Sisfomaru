<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    // protected $table = "user_sub_menu";
    // protected $UseTimestamps = TRUE;
    // protected $allowedFields = ['judul', 'slug', 'info'];

    public function getSubmenu()
    {
        $query = "SELECT user_sub_menu.*, user_menu.menu
                  FROM user_sub_menu JOIN user_menu
                  ON user_sub_menu.menu_id = user_menu.id";

        return $this->db->query($query)->getResultArray();
    }
}
