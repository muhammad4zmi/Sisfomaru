<?= $this->extend('templates/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <p class="h6 mb-4 text-gray-700 text-left" style="font-size: 12px;">
        <i class="fas fa-home"></i>
        PPDB Online / <a href="dashboard.php" class="text-gray-700">Siswa</a> / <a href="dashboard.php" class="text-gray-700"> Dashboard </a> </p>

    <!-- <hr> -->

    <div class="row">
        <div class="col-md-12">
            <?php

            // if (isset($_SESSION['update_sukses']) && $_SESSION['update_sukses'] <> '') {
            //     echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 12px;">' . $_SESSION['update_sukses'] . '
            //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //             <span aria-hidden="true">&times;</span>
            //         </button>
            //         </div>';
            // }
            ?>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Kolom Pertama -->
        <div class="col-md-6">
            <div class="col-md-12">
                <div class="card border-left-success mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success text-uppercase" style="font-size: 14px;">SELAMAT
                            DATANG,<br>
                            Calon siswa baru MA NU Sunan Giri Prigen<br>Tahun Pelajaran
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="text mb-3">
                            <h6 style="font-size: 14px;" class="text-justify">
                                MA NU Sunan Giri Prigen adalah salah satu Madrasah Aliyah yang ada di Kabupaten Pasuruan
                                yang memiliki program Vokasional yaitu Multimedia, Pariwisata & Perhotelan.
                                Selain itu, sistem pembelajarannya tidak hanya kesisi keagamaan saja, melainkan ke minat
                                dan bakat siswa. Dengan tujuan dapat bersaing di dunia global seperti saat ini.
                                Dan yang paling penting adalah mencetak generasi yang berakhlaqul karimah, bermanfaat
                                bagi bangsa dan negara.
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
                                Pendaftaran Siswa Baru di MA NU Sunan Giri Prigen untuk Tahun Pelajaran
                                menggunakan sistem online berbasis Web.<br>
                                Maka dari itu, untuk Calon Siswa Baru MA NU Sunan Giri Prigen Tahun Pelajaran
                                <?php if (isset($data_setting['tahun_pelajaran'])) {
                                    echo $data_setting['tahun_pelajaran'];
                                }  ?><b>
                                    WAJIB</b> melengkapi data diri dan data orang tua di Website ini.<br>
                            </h6>
                        </div>
                        <div class="text-center">
                            <a href="data_diri.php" class="btn btn-sm btn-success m-1">
                                <i class="fas fa-user"></i>
                                Data Diri
                            </a>
                            <a href="data_orangtua.php" class="btn btn-sm btn-warning m-1">
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
    </div>
    <!-- Content Row -->




    <!-- /.container-fluid -->
    <?= $this->endSection(); ?>