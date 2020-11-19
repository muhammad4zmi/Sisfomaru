<?php

namespace App\Controllers;

use App\Models\PengaturanModel;

class Setting extends BaseController
{
    protected $pengaturanModel;
    public function __construct()
    {
        $this->pengaturanModel = new PengaturanModel();
    }

    public function navbar()
    {
        $db = \Config\Database::connect();
        $query = $db->table('pengaturan');
        $data = [
            'pengaturan' => $query->getWhere(['nama_aplikasi' => set_value('nama_aplikasi')])->getRowArray()
        ];

        // dd($data);
        // die;
        // return view('templates/navbar', $data);
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
