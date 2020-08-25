<?php

namespace App\Controllers;

use App\Models\PengaturanModel;


class Pengaturan extends BaseController
{
    protected $pengaturanModel;
    public function __construct()
    {
        $this->pengaturanModel = new PengaturanModel();
        helper('pmb');
        is_logged_in();
    }
    public function index()
    {
        //$komik = $this->komikModel->findAll();
        $db = \Config\Database::connect();
        $query = $db->table('users');
        $data = [
            'title' => 'Sisfomaru | Pengaturan PMB',
            'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'user' => $query->getWhere(['email' => session('email')])->getRowArray(),
            'validation' => \Config\Services::validation()
        ];


        return view('admin/pengaturan/index', $data);
        //return view('templates/template');
    }

    public function update($id)
    {
        //cek judul
        $pengaturanLama = $this->pengaturanModel->getPengaturan($this->request->getVar('slug'));
        if ($pengaturanLama['nama_aplikasi'] == $this->request->getVar('nama_aplikasi')) {
            $rule_pengaturan = 'required';
        } else {
            $rule_pengaturan = 'required|is_unique[pengaturan.nama_aplikasi]';
        }
        //validasi
        if (!$this->validate([
            'nama_aplikasi' => [
                'rules' => $rule_pengaturan,
                'errors' => [
                    'required' => 'Nama Aplikasi harus diisi!.',
                    'is_unique' => 'Nama Aplikasi sudah terdaftar!'
                ]
            ],
            'nama_pt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Perguruan Tinggi harus diisi!.'

                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/pengaturan/index/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }
        $slug = url_title($this->request->getVar('nama_aplikasi'), '-', true);
        $this->pengaturanModel->save([
            'id' => $id,
            'nama_aplikasi' => $this->request->getVar('nama_aplikasi'),
            'slug' => $slug,
            'nama_pt' => $this->request->getVar('nama_pt'),
            'alamat' => $this->request->getVar('alamat'),
            'tahun_akademik' => $this->request->getVar('tahun_akademik')

        ]);

        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('/admin/pengaturan');
    }
}
