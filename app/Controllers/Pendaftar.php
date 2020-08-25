<?php

namespace App\Controllers;

use App\Models\PendaftarModel;

class Pendaftar extends BaseController
{
    protected $pendaftarModel;
    public function __construct()
    {
        $this->pendaftarModel = new PendaftarModel();
        helper('pmb');
        is_logged_in();
    }
    public function index()
    {
        //$komik = $this->komikModel->findAll();
        $data = [
            'title' => 'Data Pendaftar PMB',
            'pendaftar' => $this->pendaftarModel->getPendaftar()
        ];



        return view('admin/dasboard/index', $data);
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
