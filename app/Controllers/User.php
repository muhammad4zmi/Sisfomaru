<?php

namespace App\Controllers;

use App\Models\PengaturanModel;
use App\Models\InformasiModel;
use App\Models\PendaftarModel;



class User extends BaseController
{
    protected $pengaturanModel;
    protected $informasiModel;
    protected $pendaftarModel;
    public function __construct()
    {
        helper('pmb');
        is_logged_in();
        $this->pengaturanModel = new PengaturanModel();
        $this->informasiModel = new InformasiModel();
        $this->pendaftarModel = new PendaftarModel();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {


        $data = [
            'title' => 'Sisfomaru | Dasboard Camaba',
            'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'informasi' => $this->informasiModel->getInformasi(),
            'user' => $this->db->table('users')->getWhere(['email' => session('email')])->getRowArray()
        ];
        return view('camaba/dasboard/index', $data);
    }

    public function data_diri()
    {
        $data = [
            'title' => 'Sisfomaru | Data Diri',
            'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'informasi' => $this->informasiModel->getInformasi(),
            'user' => $this->db->table('users')->getWhere(['email' => session('email')])->getRowArray()
            // 'pendaftar' = $this->db->table('pendaftar')->getWhere('')
        ];
        return view('camaba/identitas/index', $data);
    }
}
