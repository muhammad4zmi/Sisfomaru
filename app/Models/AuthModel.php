<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = "users";
    //protected $UseTimestamps = TRUE;
    protected $allowedFields = ['nama', 'email', 'password', 'image', 'role_id', 'is_active', 'date_created'];

    public function getUsers($email)
    {
        if ($email == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $email])->first();
    }
}
