<?= $this->extend('templates/auth_header'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card o-hidden border-0 shadow-lg my-4">
                <div class="card-body bg-light p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="p-5">
                                <div class="text-center" class="text">
                                    <img src="<?= base_url(); ?>/admin/assets/img/logo.png" alt="Logo Aplikasi" class="img-logo">
                                    <h1 class="h5 text-gray-900">Login Calon Mahasiswa Baru</h1>
                                    <h1 class="h5 text-gray-900"><b>STMIK Syaikh Zainuddin NW Anjani</b></h1>
                                    <div class="alert alert-primary">
                                        <h1 class="h6 text-gray-900"><b>PROGRAM STUDI</b></h1>
                                        <h6 class="h6 text-gray-900"><span class="badge badge-primary">S1 Teknik Informatika</span>|<span class="badge badge-warning">S1 Sistem Informasi</span>|<span class="badge badge-danger">S1 Sistem Komputer</span></h6>
                                    </div>

                                    <?php if (session()->getFlashdata('pesan')) : ?>

                                        <?= session()->getFlashdata('pesan'); ?>



                                    <?php endif; ?>

                                </div>
                                <form class="user" action="/auth/proses_login" method="POST">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control form-control-user <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>""  placeholder=" Masukkan Email..." style="font-size: 12px;" autofocus value="<?= old('email'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>"" id=" username" placeholder="Masukkan Email..." style="font-size: 12px;" autofocus value="<?= old('password'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password'); ?>
                                        </div>
                                    </div>
                                    <input type="submit" name="btn_login" value="Login" class="btn btn-sm btn-success btn-user btn-block ">
                                    </input>
                                </form>

                                <div class="text-center mt-2 mb-2">
                                    <a class="" style="font-size: 12px;"> Belum punya akun?
                                        <a class="text-success" style="font-size: 14px;" href="/auth/registration"> <span class="badge badge-primary">Registrasi Disini!</span></a>
                                    </a>
                                </div>
                                <div style="margin:5px auto; text-align:center">
                                    <a class="btn btn-sm btn-warning" href="https://bit.ly/Mekanisme-Pendaftaran-PPDB-MANUSGI-2020" target="spmb">
                                        <i class="fas fa-book-open"></i>
                                        Lihat Mekanisme Pendaftaran</a>
                                </div>
                                <hr>
                                <marquee>SELAMAT DATANG DI WEBSITE PMB ONLINE STMIK Syaikh Zainuddin NW Anjani | TAHUN AKADEMIK 2020/2021</marquee>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>