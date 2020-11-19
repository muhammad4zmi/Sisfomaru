<?php

namespace App\Controllers;

use App\Models\PengaturanModel;
use App\Models\InformasiModel;
use App\Models\PendaftarModel;
use App\Models\IdentitasModel;



class Identitas extends BaseController
{
    protected $pengaturanModel;
    protected $informasiModel;
    protected $pendaftarModel;
    protected $identitasModel;
    public function __construct()
    {
        helper('pmb');
        is_logged_in();
        $this->pengaturanModel = new PengaturanModel();
        $this->informasiModel = new InformasiModel();
        $this->pendaftarModel = new PendaftarModel();
        $this->identitasModel = new IdentitasModel();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data = [
            'title' => 'Sisfomaru | Data Diri',
            'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'informasi' => $this->informasiModel->getInformasi(),
            'user' => $this->db->table('users')->getWhere(['email' => session('email')])->getRowArray(),
            'prodi' => $this->db->table('prodi')->get()->getResultArray(),
            'validation' => \Config\Services::validation()
            // 'pendaftar' = $this->db->table('pendaftar')->getWhere('')
        ];

        return view('user/identitas/index', $data);
    }

    public function add()
    {
        //validasi
        if (!$this->validate([
            'nik' => [
                'rules' => 'required|is_unique[data_diri.nik]|trim',
                'errors' => [
                    'required' => '{field} harus diisi!.',
                    'is_unique' => '{field} sudah terdaftar!'
                ]
            ],
            'nisn' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} harus disi!'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ],
            'alamat' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ],
            'telepon' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ],
            'asal' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Asal Sekolah Tidak boleh kosong!'
                ]
            ],
            'alamat_sekolah' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ],
            'kip' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'KIP harus dipilih!'
                ]
            ],
            'prodi1' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ],
            'prodi2' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/identitas/')->withInput()->with('validation', $validation);
        }

        //$slug = url_title($this->request->getVar('judul'), '-', true);
        $this->db->table('data_diri')
            ->insert([
                'nik'    => $this->request->getVar('nik'),
                'nisn'    => $this->request->getVar('nisn'),
                'tmpt_lahir'    => $this->request->getVar('tempat_lahir'),
                'tgl_lahir'    => $this->request->getVar('tgl_lahir'),
                'jenis_kelamin'    => $this->request->getVar('jenis_kelamin'),
                'status_keluarga'    => $this->request->getVar('status'),
                'anak_ke'    => $this->request->getVar('anak'),
                'agama'    => $this->request->getVar('agama'),
                'alamat'    => $this->request->getVar('alamat'),
                'no_hp'    => $this->request->getVar('telepon'),
                'asal_madrasah'    => $this->request->getVar('asal'),
                'alamat_sekolah'    => $this->request->getVar('alamat_sekolah'),
                'kip' => $this->request->getVar('kip'),
                'kode_kip' => $this->request->getVar('seri'),
                'pil_prodi1'    => $this->request->getVar('prodi1'),
                'pil_prodi2'    => $this->request->getVar('prodi2'),
                'id_pendaftar'    => $this->request->getVar('id_pendaftar')
            ]);
        $id = $this->request->getVar('id_pendaftar');
        $this->db->query("UPDATE pendaftar set status_datadiri = 1 WHERE id= $id");

        session()->setFlashdata('pesan', 'Data Identitas Diri berhasil ditambah');
        return redirect()->to('/user/identitas');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Sisfomaru | Update Data Diri',
            'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'informasi' => $this->informasiModel->getInformasi(),
            'user' => $this->db->table('users')->getWhere(['email' => session('email')])->getRowArray(),
            'prodi' => $this->db->table('prodi')->get()->getResultArray(),
            'validation' => \Config\Services::validation(),
            'datadiri' => $this->db->query("SELECT * FROM data_diri WHERE id=$id")->getResultArray()
        ];

        return view('user/identitas/edit', $data);
    }

    public function update($id)
    {
        //cek judul
        $dataLama = $this->db->query("SELECT * FROM data_diri WHERE id=$id")->getRowArray(($this->request->getVar('id_pendaftar')));
        if ($dataLama['nik'] == $this->request->getVar('nik')) {
            $rule_nik = 'required';
        } else {
            $rule_nik = 'required|is_unique[data_diri.nik]';
        }
        //validasi
        if (!$this->validate([
            'nik' => [
                'rules' => $rule_nik,
                'errors' => [
                    'required' => '{field} harus diisi!.',
                    'is_unique' => '{field} sudah terdaftar!'
                ]
            ],
            'nisn' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} harus disi!'
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ],
            'alamat' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ],
            'telepon' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ],
            'asal' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Asal Sekolah Tidak boleh kosong!'
                ]
            ],
            'alamat_sekolah' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ],
            'kip' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'KIP harus dipilih!'
                ]
            ],
            'prodi1' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ],
            'prodi2' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/identitas/edit/' . $this->request->getVar('id_pendaftar'))->withInput()->with('validation', $validation);
        }
        $this->identitasModel->save([
            'id' => $id,
            'nik'    => $this->request->getVar('nik'),
            'nisn'    => $this->request->getVar('nisn'),
            'tmpt_lahir'    => $this->request->getVar('tempat_lahir'),
            'tgl_lahir'    => $this->request->getVar('tgl_lahir'),
            'jenis_kelamin'    => $this->request->getVar('jenis_kelamin'),
            'status_keluarga'    => $this->request->getVar('status'),
            'anak_ke'    => $this->request->getVar('anak'),
            'agama'    => $this->request->getVar('agama'),
            'alamat'    => $this->request->getVar('alamat'),
            'no_hp'    => $this->request->getVar('telepon'),
            'asal_madrasah'    => $this->request->getVar('asal'),
            'alamat_sekolah'    => $this->request->getVar('alamat_sekolah'),
            'kip' => $this->request->getVar('kip'),
            'kode_kip' => $this->request->getVar('seri'),
            'pil_prodi1'    => $this->request->getVar('prodi1'),
            'pil_prodi2'    => $this->request->getVar('prodi2')



        ]);


        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('/user/identitas');
    }
    public function ortu()
    {
        $data = [
            'title' => 'Sisfomaru | Data Orang Tua',
            'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'informasi' => $this->informasiModel->getInformasi(),
            'user' => $this->db->table('users')->getWhere(['email' => session('email')])->getRowArray(),
            'prodi' => $this->db->table('prodi')->get()->getResultArray(),
            'validation' => \Config\Services::validation()
            // 'pendaftar' = $this->db->table('pendaftar')->getWhere('')
        ];

        return view('user/identitas/ortu', $data);
    }

    //isi data orang tua
    public function add_ortu()
    {
        //validasi
        if (!$this->validate([
            'nama_ayah' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} harus diisi!.'
                ]
            ],
            'nama_ibu' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong!'
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/identitas/ortu')->withInput()->with('validation', $validation);
        }

        //$slug = url_title($this->request->getVar('judul'), '-', true);
        $this->db->table('data_ortu')
            ->insert([
                'nama_ayah'     => $this->request->getVar('nama_ayah'),
                'nama_ibu'      => $this->request->getVar('nama_ibu'),
                'alamat_ayah'   => $this->request->getVar('alamat_ayah'),
                'alamat_ibu'    => $this->request->getVar('alamat_ibu'),
                'telepon_ayah'  => $this->request->getVar('telepon_ayah'),
                'telepon_ibu'   => $this->request->getVar('telepon_ibu'),
                'id_pendaftar'  => $this->request->getVar('id_pendaftar')
            ]);
        $id = $this->request->getVar('id_pendaftar');
        $this->db->query("UPDATE pendaftar set status_dataortu  = 1 WHERE id= $id");

        session()->setFlashdata('pesan', 'Data Identitas Orang tua berhasil ditambah');
        return redirect()->to('/user/identitas/ortu');
    }

    public function edit_ortu($id)
    {
        $data = [
            'title' => 'Sisfomaru | Update Data Orang Tua',
            'pengaturan' => $this->pengaturanModel->getPengaturan(),
            'informasi' => $this->informasiModel->getInformasi(),
            'user' => $this->db->table('users')->getWhere(['email' => session('email')])->getRowArray(),
            'prodi' => $this->db->table('prodi')->get()->getResultArray(),
            'validation' => \Config\Services::validation(),
            'dataortu' => $this->db->query("SELECT * FROM data_ortu WHERE id_pendaftar=$id")->getResultArray()
        ];

        return view('user/identitas/edit_ortu', $data);
    }

    public function update_ortu($id)
    {
        //cek judul
        $dataLama = $this->db->query("SELECT * FROM data_ortu WHERE id_pendaftar=$id")->getRowArray(($this->request->getVar('id_pendaftar')));
        // dd($dataLama);
        // die;
        if ($dataLama['nama_ibu'] == $this->request->getVar('nama_ibu')) {
            $rule_ibu = 'required';
        } else {
            $rule_ibu = 'required|trim';
        }
        //validasi
        if (!$this->validate([
            'nama_ibu' => [
                'rules' => $rule_ibu,
                'errors' => [
                    'required' => 'Nama Ibu harus diisi!.'
                ]
            ],
            'nama_ayah' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Nama Ayah harus disi!'
                ]
            ],
            'telepon_ayah' => [
                'rules' => 'required|trim'
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/user/identitas/edit_ortu/' . $this->request->getVar('id_pendaftar'))->withInput()->with('validation', $validation);
        }
        $this->db->table('data_ortu')
            ->update([

                'nama_ayah'     => $this->request->getVar('nama_ayah'),
                'nama_ibu'      => $this->request->getVar('nama_ibu'),
                'alamat_ayah'   => $this->request->getVar('alamat_ayah'),
                'alamat_ibu'    => $this->request->getVar('alamat_ibu'),
                'telepon_ayah'  => $this->request->getVar('telepon_ayah'),
                'telepon_ibu'   => $this->request->getVar('telepon_ibu')
            ]);
        $this->db->getWhere('data_ortu', ['id_pendaftar' => $id]);
        // $this->db->getWhere(['id_pendaftar' => $id]);
        // => $query->getWhere(['email' => session('email')])->getRowArray()
        // $this->db->WHERE('id_pendaftar', $id);



        session()->setFlashdata('pesan', 'Data berhasil diupdate');
        return redirect()->to('/user/identitas/ortu');
    }
}
