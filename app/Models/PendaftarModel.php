<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftarModel extends Model
{
    protected $table = "pendaftar";
    protected $UseTimestamps = TRUE;
    protected $allowedFields = ['no_pendaftaran', 'nama', 'email', 'password', 'status_datadiri', 'status_dataortu', 'users_id'];


    public function getPendaftar()
    {

        $query = "SELECT pendaftar.no_pendaftaran, pendaftar.nama,pendaftar.email,
                         pendaftar.users_id, pendaftar.status_datadiri, pendaftar.status_dataortu, 
                         pendaftar.created_at,data_diri.id_pendaftar,
                         data_diri.pil_prodi1, 
                         data_diri.pil_prodi2, prodi.kode_prodi,prodi.prodi
                 FROM pendaftar,prodi,data_diri
                    WHERE pendaftar.id = data_diri.id_pendaftar 
                AND data_diri.pil_prodi1 = prodi.kode_prodi";
        return $this->db->query($query)->getResultArray();
        // if ($id == false) {
        //     return $this->findAll();
        // }

        // return $this->where(['id' => $id])->first();
    }

    public function getDetail($id_pendaftar)
    {
        $query1 = "SELECT pendaftar.no_pendaftaran, pendaftar.nama,pendaftar.email, 
                          pendaftar.users_id,pendaftar.status_datadiri, pendaftar.status_dataortu, 
                          pendaftar.created_at,data_diri.id_pendaftar,data_diri.tmpt_lahir,data_diri.tgl_lahir, 
                          data_diri.jenis_kelamin,data_diri.no_hp,data_diri.anak_ke,data_diri.alamat, 
                          data_diri.asal_madrasah, data_diri.pil_prodi1, data_diri.pil_prodi2, prodi.kode_prodi,
                          prodi.prodi, users.id, users.image 
                    FROM pendaftar,prodi,data_diri, users 
                        WHERE pendaftar.id = data_diri.id_pendaftar 
                        AND data_diri.pil_prodi1 = prodi.kode_prodi 
                        AND pendaftar.users_id=users.id 
                    AND data_diri.id_pendaftar=$id_pendaftar";

        return $this->db->query($query1)->getResultArray();
    }

    public function getDetailortu($id_pendaftar)
    {
        $queryOrtu = "SELECT data_ortu.id, data_ortu.nama_ayah, data_ortu.nama_ibu, 
                             data_ortu.alamat_ayah,data_ortu.alamat_ibu,data_ortu.pendidikan_ayah,data_ortu.pekerjaan_ayah,
                             data_ortu.pekerjaan_ibu,
                             data_ortu.telepon_ayah,data_ortu.id_pendaftar, pendaftar.id, 
                             pendaftar.status_dataortu 
                      FROM data_ortu, pendaftar 
                            WHERE data_ortu.id_pendaftar=pendaftar.id 
                      AND data_ortu.id_pendaftar=$id_pendaftar";
        return $this->db->query($queryOrtu)->getResultArray();
    }
}
