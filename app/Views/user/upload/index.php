<?= $this->extend('templates/template'); ?>
<?= $this->section('content'); ?>
<?php
$db = \Config\Database::connect();
$userid = session()->get('email');

$queryUser = $db->query("SELECT users.id, users.image, pendaftar.id, pendaftar.nama, pendaftar.created_at, pendaftar.no_pendaftaran
                                    FROM users 
                                    JOIN pendaftar ON users.id=pendaftar.users_id 
                                WHERE users.email= '$userid'");
$user = $queryUser->getRowArray();
$id_pendaftar = $user['id'];

$queryDiri = $db->query("SELECT * FROM pendaftar WHERE id='$id_pendaftar'");
$data = $queryDiri->getRowArray();
$diri = $data['status_datadiri'];
$ortu = $data['status_dataortu'];

?>
<style type="text/css">
    .foto-thumbnail {
        padding: .07rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: .25rem;
        width: 3.3rem;
        height: auto;
    }

    .foto-preview {
        padding: .25rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: .25rem;
        width: 10rem;
        height: 14rem;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <p class="h6 mb-4 text-gray-700 text-left" style="font-size: 12px;">
        <i class="fas fa-home"></i>
        <?php foreach ($pengaturan as $k) : ?>
            <?= $k['nama_aplikasi']; ?> / <a href="/camaba" class="text-gray-700">User</a> / <a href="dasboard" class="text-gray-700"> Upload Berkas </a> </p>
<?php endforeach; ?>
<!-- <hr> -->

<div class="row">
    <div class="col-md-12">

    </div>
</div>
<?php if (($diri & $ortu) == 0) : ?>
    <div class="alert alert-danger" role="alert">
        <h4><i class="fas fa-exclamation-triangle"></i>
            Perhatian :</h4><br>
        <p style="font-size: 14px;">Anda Belum melengkapi Data Diri dan Data Orang Tua Anda!, Silahkan lengkapi terlebih dahulu sebelum melakukan Upload Berkas!</p>
        <div class="text-left">
            <a href="/user/identitas" class="btn btn-sm btn-success m-1">
                <i class="fas fa-user"></i>
                Isi Data Diri
            </a>
            <a href="/user/identitas/ortu" class="btn btn-sm btn-warning m-1">
                <i class="fas fa-user-friends"></i>
                Isi Data Orang Tua
            </a>
        </div>
    </div>
<?php else : ?>
    <!-- Content Row -->
    <div class="row">
        <!-- Kolom Pertama -->
        <div class="col-md-3">
            <div class="col-md-12">
                <div class="card border-left-primary mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success text-uppercase" style="font-size: 14px;">Upload Foto

                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="text mb-3">
                            <div class="form-group">
                                <label for="inputEmail">Photo Calon Mahasiswa Baru <span class="required">*</span>
                                </label>
                                <div id="imagePreview">
                                    <img class="foto-preview" src="<?= base_url('/admin/assets/img/profil') . '/' . $user['image']; ?>">
                                </div>
                                <input type="file" class="form-control-file mb-3 center" id="foto" name="foto" onchange="return validasiFile()" autocomplete="off" required="required">
                                <div class="invalid-feedback">Pas Fhoto Tidak Boleh Kosong dan Tidak boleh lebih dari 1 MB</div>
                            </div>
                        </div>

                        <div class="text-center">

                            <a href="dashboard.php" class="btn btn-sm btn-danger" name="kembali">
                                <i class="fas fa-arrow-left"></i>
                                Kembali</a>
                            <button type="submit" name="btn_simpan" value="simpan_dataortu" class="btn btn-sm btn-success">
                                <i class="fas fa-upload"></i>
                                Upload </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- Kolom Dua -->
        <div class="col-md-9">
            <div class="col-md-12">
                <div class="card border-left-success mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-success" style="font-size: 14px;">Upload Berkas Pendaftaran</h6>
                    </div>
                    <div class="card-body">
                        <div class="text mb-3">
                            <h6 style="font-size: 14px;" class="text-justify">
                                <div class="form-group">
                                    <label for="asal" style="font-size: 12px;">No Pendaftaran
                                        *</label>
                                    <input type="text" name="asal" id="asal" class="form-control" style="font-size: 14px;" value="<?= $user['no_pendaftaran']; ?>" readonly>

                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input">
                                        <label class="custom-file-label" style="font-size: 14px;">Upload Scan KTP</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-upload"></i>Upload</button>
                                    </div>
                                </div><br>

                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input">
                                        <label class="custom-file-label" style="font-size: 14px;">Upload Scan Kartu Keluarga</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-upload"></i>Upload</button>
                                    </div>
                                </div><br>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input">
                                        <label class="custom-file-label" style="font-size: 14px;">Upload Scan Akta Kelahiran</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-upload"></i>Upload</button>
                                    </div>
                                </div><br>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input">
                                        <label class="custom-file-label" style="font-size: 14px;">Upload Scan Ijazah</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-upload"></i>Upload</button>
                                    </div>
                                </div><br>


                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input">
                                        <label class="custom-file-label" style="font-size: 14px;">Upload Scan Bukti Transfer Uang Pendaftaran</label>
                                    </div>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i class="fas fa-upload"></i>Upload</button>
                                    </div>
                                </div>

                            </h6>
                        </div>




                    </div>
                </div>
            </div>
        </div>


    </div>
<?php endif; ?>
<!-- Content Row -->

<!-- Content Row -->

<!-- Content Row -->



<!-- /.container-fluid -->
<script>
    const alert = document.getElementById('datadiri_sukses');
    alert = function() {
        swal({
            icon: "success",
        });
    }
</script>

<?= $this->endSection(); ?>