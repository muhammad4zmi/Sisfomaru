<?php

namespace App\Controllers;

use App\Models\InformasiModel;

class Front extends BaseController
{
    protected $informasiModel;
    public function __construct()
    {
        $this->informasiModel = new InformasiModel();
    }
    public function index()
    {
        //$komik = $this->komikModel->findAll();
        $data = [
            'title' => 'Sisfomaru | STMIK Syaikh Zainuddin NW Anjani',
            // 'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'informasi' => $this->informasiModel->getInformasi()
            // 'user' => $this->db->table('users')->getWhere(['email' => session('email')])->getRowArray()
        ];


        // return view('templates/header', $data);
        // return view('templates/sidebar');
        // return view('templates/topbar');
        return view('front/index', $data);

        // return view('templates/footer');
    }
}
