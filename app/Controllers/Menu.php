<?php

namespace App\Controllers;

use App\Models\PengaturanModel;
use App\Models\PendaftarModel;
use App\Models\MenuModel;

class Menu extends BaseController
{
    protected $pengaturanModel;
    protected $pendaftarModel;
    protected $menuModel;
    public function __construct()
    {
        $this->pengaturanModel = new PengaturanModel();
        $this->pendaftarModel = new PendaftarModel();
        $this->menuModel = new MenuModel();
        $this->db = \Config\Database::connect();
        helper('pmb');
        is_logged_in();
    }
    public function index()
    {
        // $db = \Config\Database::connect();
        $query = $this->db->table('users');

        $data = [
            'title' => 'Menu Management',
            'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'user' => $query->getWhere(['email' => session('email')])->getRowArray(),
            'pendaftar' => $this->pendaftarModel->getPendaftar(),
            'validation' => \Config\Services::validation(),
            'menu' => $this->db->table('user_menu')->get()->getResultArray()

        ];
        return view('admin/menu/index', $data);
    }

    public function addmenu()
    {

        //validasi
        if (!$this->validate([
            'menu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '<div class="alert alert-danger" role="alert">{field} tidak boleh kosong!</div>'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/menu')->withInput()->with('validation', $validation);
        }

        // $this->db->table('user_menu')->save([
        //     'menu' => $this->request->getPost('menu')
        // ]);
        // $this->db->insert('user_menu', ['menu' => $this->withInput->getPost('menu')]);
        $this->db->table('user_menu')
            ->insert([
                'menu'    => $this->request->getVar('menu')
            ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/admin/menu');
    }

    public function delete($id)
    {
        $this->db->table('user_menu')
            ->delete([
                'id'    => $id
            ]);
        session()->setFlashdata('pesan', 'Menu berhasil dihapus');
        return redirect()->to('/admin/menu');
    }

    public function submenu()
    {
        $query = $this->db->table('users');

        $data = [
            'title' => 'Submenu Management',
            'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'user' => $query->getWhere(['email' => session('email')])->getRowArray(),
            'pendaftar' => $this->pendaftarModel->getPendaftar(),
            'validation' => \Config\Services::validation(),
            'menu' => $this->db->table('user_menu')->get()->getResultArray(),
            'submenu' => $this->menuModel->getSubmenu()

        ];
        return view('admin/menu/submenu', $data);
    }

    public function addsubmenu()
    {
        //validasi
        if (!$this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong!'
                ]
            ],
            'menu_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong!'
                ]
            ],
            'url' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong!'
                ]
            ],
            'icon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/admin/menu/submenu')->withInput()->with('validation', $validation);
        }

        $this->db->table('user_sub_menu')
            ->insert([
                'title'    => $this->request->getVar('title'),
                'menu_id'    => $this->request->getVar('menu_id'),
                'url'    => $this->request->getVar('url'),
                'icon'    => $this->request->getVar('icon'),
                'is_active'    => $this->request->getVar('is_active'),
            ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambah');
        return redirect()->to('/admin/menu/submenu');
    }

    public function delete_submenu($id)
    {
        $this->db->table('user_sub_menu')
            ->delete([
                'id'    => $id
            ]);
        session()->setFlashdata('pesan', 'Submenu berhasil dihapus');
        return redirect()->to('/admin/menu/submenu');
    }
}
