<?php

namespace App\Controllers;

use App\Models\PengaturanModel;
use App\Models\PendaftarModel;


class Admin extends BaseController
{
    protected $pengaturanModel;
    protected $pendaftarModel;
    public function __construct()
    {
        helper('pmb');
        is_logged_in();
        $this->pengaturanModel = new PengaturanModel();
        $this->pendaftarModel = new PendaftarModel();
    }

    public function index()
    {
        //$komik = $this->komikModel->findAll();
        $db = \Config\Database::connect();
        $query = $db->table('users');

        $data = [
            'title' => 'Dasboard Admin',
            'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'user' => $query->getWhere(['email' => session('email')])->getRowArray(),
            'pendaftar' => $this->pendaftarModel->getPendaftar()

        ];
        return view('admin/dasboard/index', $data);


        // return view('admin/informasi/index', $data);
        // return view('admin/pengaturan/index', $data);
    }
    // public function detail($slug)
    // {
    //     $data = [
    //         'title' => 'Detail Informasi',
    //         'informasi' => $this->informasiModel->getInformasi($slug)
    //     ];
    //     // $komik = $this->komikModel->getKomik($slug);
    //     return view('informasi/detail', $data);
    // }
}
