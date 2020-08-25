<?= $this->extend('templates/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="h6 mb-3 text-gray-700 text-left" style="font-size: 12px;">
        <i class="fas fa-home"></i>
        <?php foreach ($pengaturan as $k) : ?>
            <?= $k['nama_aplikasi']; ?> / <a href="dashboard" class="text-gray-700">Admin</a> / <a href="dashboard" class="text-gray-700"> Dashboard </a> </p>
<?php endforeach; ?>
<!-- <hr> -->

<div class="row">
    <!-- Pendaftar Masuk -->
    <div class="col-md-6 p-2">
        <div class="card border-left-info h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-info text-uppercase mb-1" style="font-size: 17px;">Pendaftar Masuk</div>
                        <?php $db = \Config\Database::connect();
                        $query = $db->query("SELECT COUNT('nama') as jml FROM pendaftar");
                        $result = $query->getRowArray();
                        $precent = $result['jml'];
                        ?>
                        <div class="h5 mt-3 mb-2 font-weight-bold" style="font-size: 15px;"><?= $precent; ?>
                            Orang
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class="progress progress-sm mr-2">

                                    <div class="progress-bar bg-info" role="progressbar" style="width:<?= $precent; ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300" style="font-size: 50px;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pemberitahuan -->
    <div class="col-md-6 p-2">
        <div class="card border-left-info h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h4 font-weight-bold text-info text-uppercase mb-1" style="font-size: 17px;">pemberitahuan</div>
                        <div class="h5 mt-3 mb-2 font-weight-bold" style="font-size: 15px;">
                            Unduh User Manual bagi Administrator
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="" class="btn btn-sm btn-primary">
                            <i class="fa fa-download"></i>
                            User Manual - Admin
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr class="mb-3 mt-3">
<!-- Data Pendaftar-->
<div class="card mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary text-uppercase" style="font-size: 14px;">Data pendaftar baru yang sudah registrasi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr align="center" style="font-size: 14px;">
                        <th width="2%">No</th>
                        <!-- <th width="3%">NISN</th> -->
                        <th width="15%">Nama</th>
                        <th width="5%">Data Diri</th>
                        <th width="5%">Data Orang Tua</th>
                        <th width="5%">Tahun Akademik</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr align="center" style="font-size: 14px;">
                        <th width="2%">No</th>
                        <!-- <th width="3%">NISN</th> -->
                        <th width="15%">Nama</th>
                        <th width="5%">Data Diri</th>
                        <th width="5%">Data Orang Tua</th>
                        <th width="3%">Tahun Akademik</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($pendaftar as $p) : ?>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $p['nama']; ?></td>
                        <?php if ($p['status_datadiri'] == 1) { ?>
                            <td align="center"><span class="badge badge-success">Sudah Diisi</span></td>
                        <?php } else { ?>
                            <td align="center"><span class="badge badge-danger">Belum Diisi</span></td>
                        <?php } ?>

                        <?php if ($p['status_dataortu'] == 1) { ?>
                            <td align="center"><span class="badge badge-success">Sudah Diisi</span></td>
                        <?php } else { ?>
                            <td align="center"><span class="badge badge-danger">Belum Diisi</span></td>
                        <?php } ?>

                        <td align="center"><span class="badge badge-info"><?= $k['tahun_akademik']; ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- /.container-fluid -->
<?= $this->endSection(); ?>