<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaturanModel extends Model
{
    protected $table = "pengaturan";
    protected $UseTimestamps = TRUE;
    protected $allowedFields = ['nama_aplikasi', 'nama_pt', 'alamat', 'slug', 'tahun_akademik'];

    public function getPengaturan($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
