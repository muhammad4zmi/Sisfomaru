<?= $this->extend('templates/auth_header'); ?>
<?= $this->section('content'); ?>
<?php
$db = \Config\Database::connect();
date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d");
$tgl_daftar = date('d-m-Y', strtotime($date));
// cari id transaksi terakhir yang berawalan tanggal hari ini
$query = $db->query("SELECT max(no_pendaftaran) AS last FROM pendaftar");
$data = $query->getRowArray();
// dd($data);
// die;
//$noOrder = $data['maxKode'];

$nomorreg = $data['last'];

// baca nomor urut transaksi dari id transaksi terakhir
$noUrut = (int) substr($nomorreg, 9, 3);
$noUrut++;

$tahun = substr($date, 0, 4);
$bulan = substr($date, 5, 2);
$tgl1 = substr($date, 8, 2);
// nomor urut ditambah 1
//$nextNoUrut = $lastNoUrut + 1;

// membuat format nomor transaksi berikutnya
$id_Order = $tahun . $bulan . $tgl1 . sprintf("%04s", $noUrut);


?>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="<?= base_url(); ?>/admin/assets/img/logo.png" alt="Logo Aplikasi" class="img-logo-regis">
                                    <h1 class="h5 text-gray-900">Registrasi Calon Mahasiswa Baru</h1>
                                    <h1 class="h5 text-gray-900"><b>STMIK Syaikh Zainuddin NW Anjani</b></h1>
                                    <div class="alert alert-primary">
                                        <h1 class="h6 text-gray-900"><b>PROGRAM STUDI</b></h1>
                                        <h6 class="h6 text-gray-900"><span class="badge badge-primary">S1 Teknik Informatika</span>|<span class="badge badge-warning">S1 Sistem Informasi</span>|<span class="badge badge-danger">S1 Sistem Komputer</span></h6>
                                    </div>
                                </div>
                                <form class="user" action="/auth/proses_register" method="POST">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="hidden" name="no_daftar" value="<?= $id_Order; ?>">
                                        <label for="nama" style="font-size: 12px">Nama Lengkap</label>
                                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="judul" name="nama" autofocus value="<?= old('nama'); ?>" style="font-size: 12px;" placeholder="Masukkan Nama Lengkap">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama'); ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" style="font-size: 12px">Email</label>
                                            <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" autofocus value="<?= old('email'); ?>" style="font-size: 12px;" placeholder="Masukkan Email">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('email'); ?>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-6 pb-3">
                                                    <label for="password" style="font-size: 12px">Password</label>
                                                    <input type="password" name="password1" id="password" class="form-control <?= ($validation->hasError('password1')) ? 'is-invalid' : ''; ?>" placeholder="Password" autofocus style="font-size: 12px;" data-toggle="tooltip" data-placement="right" title="Password min 5 karakter">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('password1'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="ulangi_password" style="font-size: 12px">Ulangi Password</label>
                                                    <input type="password" name="password2" id="password" class="form-control <?= ($validation->hasError('password2')) ? 'is-invalid' : ''; ?>" placeholder="Password" autofocus style="font-size: 12px;" data-toggle="tooltip" data-placement="left" title="Password harus sama!">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('password2'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" name="btn_registrasi" value="Registrasi" class="btn btn-sm btn-success btn-user btn-block"></input>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <strong><a class="" style="font-size: 12px;">Sudah punya akun?
                                            <a class="btn btn-sm btn-primary" style="font-size: 12px;" href="/auth"> Login Disini!</a></strong>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>