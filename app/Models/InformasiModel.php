<?php

namespace App\Models;

use CodeIgniter\Model;

class InformasiModel extends Model
{
    protected $table = "informasi";
    protected $UseTimestamps = TRUE;
    protected $allowedFields = ['judul', 'slug', 'info'];

    public function getInformasi($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
