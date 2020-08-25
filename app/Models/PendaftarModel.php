<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftarModel extends Model
{
    protected $table = "pendaftar";
    protected $UseTimestamps = TRUE;
    protected $allowedFields = ['nama', 'email', 'password', 'status_datadiri', 'status_dataortu', 'users_id'];


    public function getPendaftar($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
