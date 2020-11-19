<?php

namespace App\Models;

use CodeIgniter\Model;

class IdentitasModel extends Model
{
    protected $table = "data_diri";
    protected $UseTimestamps = TRUE;
    protected $allowedFields = [
        'id', 'nik', 'nisn', 'tmpt_lahir', 'tgl_lahir', 'jenis_kelamin',
        'status_keluarga', 'anak_ke', 'agama', 'alamat', 'alamat', 'no_hp',
        'asal_madrasah', 'alamat_sekolah', 'kip', 'kode_kip', 'pil_prodi1',
        'pil_prodi2', 'id_pendaftar'
    ];


    public function getIdentitas($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}
