<?= $this->extend('templates/template'); ?>

<?= $this->section('content'); ?>
<?php

// $db = \Config\Database::connect();
// $id_pendaftar = $this->get('id_pendaftar');
// dd($id_pendaftar);
// die;

// // $queryDiri = $db->query("SELECT * FROM pendaftar WHERE id='$id_pendaftar'");
// // $data = $queryDiri->getRowArray();
// $query = $db->query("SELECT pendaftar.no_pendaftaran, pendaftar.nama,pendaftar.email, pendaftar.users_id, pendaftar.status_datadiri, pendaftar.status_dataortu, pendaftar.created_at, data_diri.id_pendaftar, data_diri.tmpt_lahir, data_diri.tgl_lahir, data_diri.jenis_kelamin,data_diri.anak_ke,data_diri.alamat, data_diri.no_hp,data_diri.alamat, data_diri.asal_madrasah, data_diri.pil_prodi1, data_diri.pil_prodi2, prodi.kode_prodi,prodi.prodi, users.id, users.image FROM pendaftar,prodi,data_diri, users WHERE pendaftar.id = data_diri.id_pendaftar AND data_diri.pil_prodi1 = prodi.kode_prodi AND users.id AND users.email=$k");
// $pedaftar = $query->getRowArray();



?>
<div class="container-fluid">
    <!-- Page Heading -->
    <p class="h6 mb-4 text-gray-700 text-left" style="font-size: 12px;">
        <i class="fas fa-home"></i>
        <?php foreach ($pengaturan as $p) : ?>
            <?= $p['nama_aplikasi']; ?> / <a href="/admin/dasboard" class="text-gray-700">Admin</a> / <a href="dasboard" class="text-gray-700"><?= $title; ?> </a> </p>
<?php endforeach; ?>
<div class="row">
    <!-- Data Pendaftar -->
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" style="font-size: 14px;">DATA DIRI CALON MAHASISWA</h6>
            </div>
            <?php foreach ($pendaftar as $k) : ?>
                <div class="card-body">
                    <div class="text-center">


                        <img src="<?= base_url('/admin/assets/img/profil') . '/' . $k['image']; ?>" alt="fotoprofil" class="img-fuild rounded-circle" style="width: 200px; height:200px">
                    </div>
                    <h5 class="text-center text-gray-900 card-title mt-4 text-uppercase" style="font-size: 15px">
                        <b><?= $k['nama'] . " | No Pendaftaran : " . $k['no_pendaftaran'] ?></b>
                    </h5>
                    <ul class="list-group">

                        <li class="list-group-item ">
                            <?php
                            $tmpt_lahir = "";
                            $tgl_lahir = "";
                            if (isset($k['tmpt_lahir']) || isset($k['tgl_lahir'])) {
                                $tmpt_lahir = $k['tmpt_lahir'];
                                $tgl_lahir = $k['tgl_lahir'];
                            } else {
                                $tmpt_lahir = "TTL Belum Diisi";
                                $tgl_lahir  = "-";
                            }
                            ?>
                            <h6 class="mb-0 text-gray-900" style="font-size: 13px"><b>Tempat, Tanggal Lahir</b></h6>
                            <medium class="text-muted"><?= $tmpt_lahir ?>, <?= date("d-m-Y", strtotime($tgl_lahir)) ?></medium>
                        </li>
                        <li class="list-group-item ">
                            <?php
                            $jenis_kelamin = "";
                            if (isset($k['jenis_kelamin'])) {
                                $jenis_kelamin = $k['jenis_kelamin'];
                            } else {
                                $jenis_kelamin = "-";
                            }
                            ?>
                            <h6 class="mb-0 text-gray-900" style="font-size: 13px"><b>Jenis Kelamin</b></h6>
                            <medium><?= $jenis_kelamin ?></medium>
                        </li>

                        <li class="list-group-item ">
                            <?php
                            $anak_ke = "";
                            if (isset($k['anak_ke'])) {
                                $anak_ke = $k['anak_ke'];
                            } else {
                                $anak_ke = "-";
                            }
                            ?>
                            <h6 class="mb-0 text-gray-900" style="font-size: 13px"><b>Anak Ke-</b></h6>
                            <medium><?= $anak_ke ?></medium>
                        </li>

                        <li class="list-group-item ">
                            <?php
                            $alamat = "";
                            if (isset($k['alamat'])) {
                                $alamat = $k['alamat'];
                            } else {
                                $alamat = "-";
                            }
                            ?>
                            <h6 class="mb-0 text-gray-900" style="font-size: 13px"><b>Alamat</b></h6>
                            <medium> <?= $alamat ?> </medium>
                        </li>
                        <li class="list-group-item ">
                            <h6 class="mb-0 text-gray-900" style="font-size: 13px"><b>Email</b></h6>
                            <medium><?= $k['email'] ?></medium>
                        </li>
                        <li class="list-group-item ">
                            <?php
                            $no_hp = "";
                            if (isset($k['no_hp'])) {
                                $no_hp = $k['no_hp'];
                            } else {
                                $no_hp = "-";
                            }
                            ?>
                            <h6 class="mb-0 text-gray-900" style="font-size: 13px"><b>Nomor HP</b></h6>
                            <medium><?= $no_hp ?></medium>
                        </li>
                        <li class="list-group-item ">
                            <?php
                            $asal_madrasah = "";
                            if (isset($k['asal_madrasah'])) {
                                $asal_madrasah = $k['asal_madrasah'];
                            } else {
                                $asal_madrasah = "-";
                            }
                            ?>
                            <h6 class="mb-0 text-gray-900" style="font-size: 13px"><b>Asal Madrasah / Sekolah</b></h6>
                            <medium><?= $asal_madrasah ?></medium>
                        </li>
                        <li class="list-group-item ">
                            <?php
                            $pil_prodi1 = "";
                            if (isset($k['prodi'])) {
                                $pil_prodi1 = $k['prodi'];
                            } else {
                                $pil_prodi1 = "-";
                            }
                            ?>
                            <h6 class="mb-0 text-gray-900" style="font-size: 13px"><b>Prodi Pilihan</b></h6>
                            <medium><?= $pil_prodi1 ?></medium>
                        </li>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- Data Pendaftar -->
    <div class="col-md-6">
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary" style="font-size: 14px;">DATA ORANG TUA SISWA</h6>
            </div>

            <?php foreach ($detail_ortu as $j) : ?>


                <?php if ($j['status_dataortu'] == 0) : ?>

                    <div class="alert alert-danger" role="alert">
                        <h4><i class="fas fa-exclamation-triangle"></i>
                            Perhatian :</h4><br>
                        <p style="font-size: 14px;">Anda Belum melengkapi Data Diri dan Data Orang Tua Anda!, Silahkan lengkapi terlebih dahulu sebelum melakukan Upload Berkas!</p>

                    </div>
                <?php else : ?>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="<?= base_url('/admin/assets/img/orang_tua.png') ?>" alt="fotoprofil" class="img-fuild rounded-circle" style="width: 200px; height:200px">
                        </div>
                        <div class="card-header py-3 mb-2 mt-4">
                            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 14px;">DATA AYAH</h6>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item ">
                                <?php
                                $nama_ayah = "";
                                $nama_ibu = "";
                                $alamat_ayah = "";
                                $alamat_ayah = "";
                                $telepon_ayah = "";
                                $pendidikan_ayah = "";
                                $pekerjaan_ayah = "";
                                $pekerjaan_ibu = "";

                                if (
                                    isset($j['nama_ayah']) || isset($j['nama_ibu']) || isset($j['alamat_ayah']) || isset($j['pekerjaan_ayah']) || isset($j['pendidikan_ayah']) || isset($j['pekerjaan_ibu'])
                                    || isset($j['alamat_ibu']) || isset($j['telepon_ayah']) || isset($j['telepon_ibu'])
                                ) {
                                    $nama_ayah = $j['nama_ayah'];
                                    $nama_ibu = $j['nama_ibu'];
                                    $alamat_ayah = $j['alamat_ayah'];
                                    $alamat_ibu = $j['alamat_ibu'];
                                    $pekerjaan_ayah = $j['pekerjaan_ayah'];
                                    $pendidikan_ayah = $j['pendidikan_ayah'];
                                    $pekerjaan_ibu = $j['pekerjaan_ibu'];
                                    $telepon_ayah = $j['telepon_ayah'];


                                    // if ($j['telepon_ayah'] != NULL || $j['telepon_ibu'] != NULL) {
                                    //     $telepon_ayah = $j['telepon_ayah'];
                                    // }
                                } else {
                                    $nama_ayah = "-";
                                    $nama_ibu = "-";
                                    $alamat_ayah = "-";
                                    $alamat_ibu = "-";
                                    $telepon_ayah = "-";
                                    $pekerjaan_ayah = "-";
                                    $pendidikan_ayah = "-";
                                    $pekerjaan_ibu = "-";
                                }
                                ?>
                                <h6 class="mb-0 text-gray-900" style="font-size: 13px" style="font-size: 10px;"><b>Nama Ayah</b></h6>
                                <medium><?= $nama_ayah ?></medium>
                            </li>
                            <li class="list-group-item ">
                                <h6 class="mb-0 text-gray-900" style="font-size: 13px" style="font-size: 10px;"><b>Alamat Ayah</b></h6>
                                <medium><?= $alamat_ayah ?></medium>
                            </li>
                            <li class="list-group-item ">
                                <h6 class="mb-0 text-gray-900" style="font-size: 13px" style="font-size: 10px;"><b>Nomor HP Ayah</b></h6>
                                <medium> <?= $telepon_ayah ?> </medium>
                            </li>
                            <li class="list-group-item ">
                                <h6 class="mb-0 text-gray-900" style="font-size: 13px" style="font-size: 10px;"><b>Pekerjaan Ayah</b></h6>
                                <medium> <?= $pekerjaan_ayah ?> </medium>
                            </li>

                        </ul>
                        <div class="card-header py-3 mb-2 mt-2">
                            <h6 class="m-0 font-weight-bold text-primary" style="font-size: 14px;"> DATA IBU</h6>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item ">
                                <h6 class="mb-0 text-gray-900" style="font-size: 13px"><b>Nama Ibu</b></h6>
                                <medium><?= $nama_ibu ?></medium>
                            </li>
                            <li class="list-group-item ">
                                <h6 class="mb-0 text-gray-900" style="font-size: 13px"><b>Alamat Ibu</b></h6>
                                <medium><?= $alamat_ibu ?></medium>
                            </li>
                            <li class="list-group-item ">
                                <h6 class="mb-0 text-gray-900" style="font-size: 13px"><b>Pekerjaan Ibu</b></h6>
                                <medium><?= $pekerjaan_ibu ?></medium>
                            </li>

                        </ul>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

        </div>

        <!-- Modal -->

        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <div class="mb-4">
                    <a href="/admin/pendaftar" class="btn btn-secondary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="text">Kembali ke halaman data pendaftar</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

<?= $this->endSection(); ?>