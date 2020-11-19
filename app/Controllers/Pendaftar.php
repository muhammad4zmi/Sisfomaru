<?php

namespace App\Controllers;

use App\Models\PendaftarModel;
use App\Models\PengaturanModel;

class Pendaftar extends BaseController
{
    protected $pendaftarModel;
    public function __construct()
    {
        $this->pendaftarModel = new PendaftarModel();
        $this->pengaturanModel = new PengaturanModel();
        $this->db = \Config\Database::connect();
        helper('pmb');
        is_logged_in();
    }
    public function index()
    {
        //$komik = $this->komikModel->findAll();
        $data = [
            'title' => 'Data Pendaftar',
            'pendaftar' => $this->pendaftarModel->getPendaftar(),
            'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'user' => $this->db->table('users')->getWhere(['email' => session('email')])->getRowArray()
        ];
        return view('admin/pendaftar/index', $data);
    }
    public function detail($id_pendaftar)
    {
        $data = [
            'title' => 'Detail Data Pendaftar',
            'pendaftar' => $this->pendaftarModel->getDetail($id_pendaftar),
            'detail_ortu' => $this->pendaftarModel->getDetailortu($id_pendaftar),
            'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'user' => $this->db->table('users')->getWhere(['email' => session('email')])->getRowArray()
        ];
        return view('admin/pendaftar/detail', $data);
    }
}
