<?php

namespace App\Controllers;

use App\Models\InformasiModel;
use App\Models\PengaturanModel;

class Informasi extends BaseController
{
    protected $pengaturanModel;
    protected $informasiModel;
    // protected $table = 'users';
    public function __construct()
    {
        $this->informasiModel = new InformasiModel();
        $this->pengaturanModel = new PengaturanModel();
        $this->db = \Config\Database::connect();
        helper('pmb');
        is_logged_in();
    }


    public function index()
    {

        //$query = $db->table('users');
        $data = [
            'title' => 'Sisfomaru | Informasi PMB',
            'informasi' => $this->informasiModel->getInformasi(),
            'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'user' => $this->db->table('users')->getWhere(['email' => session('email')])->getRowArray()
        ];

        return view('admin/informasi/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Sisfomaru | Form Tambah Data',
            'validation' => \Config\Services::validation(),
            'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'user' => $this->db->table('users')->getWhere(['email' => session('email')])->getRowArray()
        ];

        return view('admin/informasi/create', $data);
    }

    public function save()
    {
        //validasi
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[informasi.judul]',
                'errors' => [
                    'required' => '{field} Informasi harus diisi!.',
                    'is_unique' => '{field} Informasi sudah terdaftar!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/informasi/create')->withInput()->with('validation', $validation);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->informasiModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'info' => $this->request->getVar('info')

        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/admin/informasi');
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

    public function delete($id)
    {
        $this->informasiModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/admin/informasi');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Sisfomaru | Form Ubah Data',
            'validation' => \Config\Services::validation(),
            'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'user' => $this->db->table('users')->getWhere(['email' => session('email')])->getRowArray(),
            'informasi' => $this->informasiModel->getInformasi($slug)
        ];

        return view('admin/informasi/edit', $data);
    }

    public function update($id)
    {
        //cek judul
        $infoLama = $this->informasiModel->getInformasi($this->request->getVar('slug'));
        if ($infoLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[informasi.judul]';
        }
        //validasi
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} Informasi harus diisi!.',
                    'is_unique' => '{field} Informasi sudah terdaftar!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/informasi/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->informasiModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'info' => $this->request->getVar('info')

        ]);

        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('/admin/informasi');
    }
}
