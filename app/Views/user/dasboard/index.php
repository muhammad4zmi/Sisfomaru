<?= $this->extend('templates/template'); ?>
<?= $this->section('content'); ?>
<?php
$db = \Config\Database::connect();
$userid = session()->get('email');

$queryUser = $db->query("SELECT users.id, users.image, pendaftar.id, pendaftar.nama, 
                                date_format(pendaftar.created_at, '%d %b %Y') as tgl,
                                time(created_at) as jam, pendaftar.no_pendaftaran
                                    FROM users 
                                    JOIN pendaftar ON users.id=pendaftar.users_id 
                                WHERE users.email= '$userid'");
$user = $queryUser->getRowArray();

?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <p class="h6 mb-4 text-gray-700 text-left" style="font-size: 12px;">
        <i class="fas fa-home"></i>
        <?php foreach ($pengaturan as $k) : ?>
            <?= $k['nama_aplikasi']; ?> / <a href="/camaba" class="text-gray-700">Camaba</a> / <a href="dasboard" class="text-gray-700"> Dashboard </a> </p>
<?php endforeach; ?>
<!-- <hr> -->

<div class="row">
    <div class="col-md-12">

    </div>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Kolom Pertama -->
    <div class="col-md-6">
        <div class="col-md-12">
            <div class="card border-left-success mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success text-uppercase" style="font-size: 14px;">INFO PMB
                        <br>Tahun Akademik <?= $k['tahun_akademik']; ?>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="text mb-3">
                        <h6 style="font-size: 14px;" class="text-justify">
                            <?php $db = \Config\Database::connect();
                            $query = $db->query("SELECT judul,info, date_format(created_at, '%d %b %Y') as tgl,
                                                time(created_at) as jam FROM informasi ORDER BY created_at 
                                                DESC LIMIT 0,2");
                            $hasil = $query->getResultArray();

                            ?>
                            <?php foreach ($hasil as $i) : ?>
                                <ul class="list-unstyled timeline widget">
                                    <li>
                                        <div class="block">
                                            <div class="block_content">
                                                <h4 class="title">
                                                    <a><b><?= $i['judul']; ?></b></a>
                                                </h4>
                                                <div class="byline">
                                                    <span class="badge badge-pill badge-primary">
                                                        <i class="far fa-calendar-alt"></i> <?= $i['tgl']; ?> |
                                                        <i class="fas fa-clock"></i> <?= $i['jam']; ?>
                                                    </span>
                                                </div>
                                                <p class="excerpt"><?= substr($i['info'], 0, 500); ?>

                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <?php endforeach; ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kolom Dua -->
    <div class="col-md-6">
        <div class="col-md-12">
            <div class="card border-left-success mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success" style="font-size: 14px;">PEMBERITAHUAN</h6>
                </div>
                <div class="card-body">
                    <div class="text mb-3">
                        <h6 style="font-size: 14px;" class="text-justify">
                            Pendaftaran Mahasiswa Baru untuk Tahun Akademik <?= $k['tahun_akademik']; ?>
                            menggunakan sistem online berbasis Web.<br>
                            Maka dari itu, untuk Calon Mahasiswa Baru Tahun Tahun Akademik <?= $k['tahun_akademik']; ?>
                            <b>
                                WAJIB</b> melengkapi data diri dan data orang tua di Website ini.<br>
                        </h6>
                    </div>
                    <div class="text-center">
                        <a href="/user/identitas" class="btn btn-sm btn-success m-1">
                            <i class="fas fa-user"></i>
                            Data Diri
                        </a>
                        <a href="/user/identitas/ortu" class="btn btn-sm btn-warning m-1">
                            <i class="fas fa-user-friends"></i>
                            Data Orang Tua
                        </a>
                    </div>

                    <div class="text-center mt-1">
                        <a href="https://bit.ly/Panduan-Pengisian-Data-PPDB-MANUSGI-2020" class="btn btn-sm  btn-primary">
                            <i class="fas fa-book-open"></i>
                            Lihat Mekanisme Pengisian Data
                        </a>
                    </div>
                    <div class="card-body">
                        <?php $db = \Config\Database::connect();
                        $id_user = session()->get('email');
                        // dd($id_user);
                        // die;
                        $querystatus = $db->query("SELECT users.id, users.email,pendaftar.status_datadiri, 
                                                        pendaftar.status_dataortu
                                                        FROM users JOIN pendaftar
                                                        ON users.id = pendaftar.users_id
                                                        WHERE users.email = '$id_user'
                                                    ORDER BY pendaftar.users_id");
                        $s = $querystatus->getRowArray();
                        // dd($s);
                        // die;


                        ?>

                        <?php if ($s['status_datadiri'] == 1) : ?>
                            <h4 class="small font-weight-bold">Status Data Diri : <span class="float-right">Complete!</span></h4>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        <?php else : ?>
                            <h4 class="small font-weight-bold">Status Data Diri : <span class="float-right">Belum diisi</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 2%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        <?php endif; ?>
                        <br>
                        <?php if ($s['status_dataortu'] == 1) : ?>
                            <h4 class="small font-weight-bold">Status Data Orang Tua : <span class="float-right">Complete!</span></h4>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        <?php else : ?>
                            <h4 class="small font-weight-bold">Status Data Orang Tua : <span class="float-right">Belum diisi</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 2%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- Content Row -->

<!-- Content Row -->
<div class="row mt-2">
    <div class="col-md-6">
        <div class="col-md-12">
            <div class="card border-left-success mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success" style="font-size: 14px;">CETAK FORMULIR
                        PENDAFTARAN</h6>
                </div>
                <div class="card-body">
                    <div class="text mb-3">
                        <h6 style="font-size: 14px;" class="text-justify">
                            Jika sudah mengisi data diri dan data orang tua. Silahkan download Formulir Pendaftaran
                            Anda!
                        </h6>
                    </div>
                    <div class="text-center mt-1">
                        <a href="" class="btn btn-primary btn-sm">
                            <i class="fas fa-download"></i>
                            Unduh Formulir Pendaftaran
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-6">
        <div class="col-md-12">
            <div class="card border-left-primary mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success" style="font-size: 14px;">RINCIAN PEMBAYARAN</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless table-sm">
                            <tbody>
                                <tr>
                                    <th style="width:23%">No Pendaftaran </th>
                                    <td>: <span class="badge badge-success" style="font-size: 14px;"><?= $user['no_pendaftaran']; ?></span></td>
                                </tr>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td>: <?= $user['nama']; ?></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Daftar</th>
                                    <td>: <?= $user['tgl'] . ' | ' . $user['jam']; ?></td>
                                </tr>

                            </tbody>
                        </table>

                        <hr>
                        <table class="table table-borderless table-sm">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Biaya</th>
                                    <th scope="col">Nominal (Rp)</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Uang Pendaftaran</td>
                                    <td>200.000,-</td>
                                </tr>

                            </tbody>
                        </table>
                        <hr>
                        <p>Status Pembayaran : <span class="badge badge-danger">Belum dibayarkan</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Content Row -->



<!-- /.container-fluid -->

<?= $this->endSection(); ?>