<?= $this->extend('templates/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <p class="h6 mb-4 text-gray-700 text-left" style="font-size: 12px;">
        <i class="fas fa-home"></i>
        <?php foreach ($pengaturan as $k) : ?>
            <?= $k['nama_aplikasi']; ?> / <a href="/camaba" class="text-gray-700">User</a> / <a href="dasboard" class="text-gray-700"> Data Orang Tua </a> </p>
<?php endforeach; ?>
<?php
$db = \Config\Database::connect();
$userid = session()->get('email');

$queryUser = $db->query("SELECT users.id, users.image, pendaftar.id, pendaftar.nama
                                        FROM users 
                                        JOIN pendaftar ON users.id=pendaftar.users_id 
                                    WHERE users.email= '$userid'");
$user = $queryUser->getRowArray();
$id_pendaftar = $user['id'];

$queryDiri = $db->query("SELECT * FROM pendaftar WHERE id='$id_pendaftar'");
$data = $queryDiri->getRowArray();
?>

<div class="col-md-12">
    <div class="row">
        <!-- Data Nilai -->
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary" style="font-size: 12px;">DATA ORANG TUA SISWA
                    </h6>
                </div>
                <?php if ($data['status_dataortu'] == 1) : ?>
                    <div class="card-body center">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan'); ?>

                            </div>

                        <?php endif; ?>
                        <h6 class="text-center mt-1 mb-3 text-danger" style="font-size: 14px;">* Data Orang Tua anda sudah diisi, jika ingin melakukan Update Data, Silahkan Klik Tombol Update Data.
                        </h6>
                        <div class="col-md-12">
                            <div class="text-center">

                                <a href="/user/identitas/edit_ortu/<?= $data['id']; ?>" class="btn btn-primary btn-center" data-placement="top" title="" data-toggle="tooltip" data-original-title="Update Data <?= $data['nama']; ?>"><i class="fas fa-user-edit"></i> Update Data</a>

                            </div>
                        </div>

                    </div>
                <?php else : ?>
                    <div class="card-body">
                        <h6 class="text-left mt-1 mb-3 text-danger" style="font-size: 12px;">* Masukkan data orang
                            tua Anda dengan benar dan data orang tua ini dapat diedit setelah anda simpan.
                        </h6>



                        <form class="user" method="POST" action="/identitas/add_ortu">
                            <?= csrf_field(); ?>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="hidden" name="id_pendaftar" value="<?= $id_pendaftar; ?>">
                                            <label for="nama" style="font-size: 12px;">Nama Ayah *</label>
                                            <input type="text" name="nama_ayah" class="form-control <?= ($validation->hasError('nama_ayah')) ? 'is-invalid' : ''; ?>" id="nama_ayah" autofocus value="<?= old('nama_ayah'); ?>" style="font-size: 12px;" placeholder="Sesuai KK">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_ayah'); ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat" style="font-size: 12px;">Alamat Ayah</label>
                                            <textarea name="alamat_ayah" id="alamat_ayah" class="form-control" style="font-size: 12px;"></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label for="telepon" style="font-size: 12px;">Nomor HP Ayah</label>
                                            <input type="text" name="telepon_ayah" id="telepon_ayah" class="form-control" placeholder="Nomor HP / WhatsApp (Tidak Wajib)" style="font-size: 12px;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama" style="font-size: 12px;">Nama Ibu *</label>
                                            <input type="text" name="nama_ibu" class="form-control <?= ($validation->hasError('nama_ibu')) ? 'is-invalid' : ''; ?>" id="nama_ibu" autofocus value="<?= old('nama_ibu'); ?>" style="font-size: 12px;" placeholder="Sesuai KK">
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('nama_ibu'); ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat" style="font-size: 12px;">Alamat Ibu</label>
                                            <textarea name="alamat_ibu" id="alamat_ibu" class="form-control" style="font-size: 12px;"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon" style="font-size: 12px;">Nomor HP Ibu</label>
                                            <input type="text" name="telepon_ibu" id="telepon_ibu" class="form-control" placeholder="Nomor HP / WhatsApp (Tidak Wajib)" style="font-size: 12px;">
                                        </div>
                                        <div class="form-group">
                                            <label for="telepon" style="font-size: 12px;">Pekerjaan Ibu</label>
                                            <input type="text" name="telepon_ibu" id="telepon_ibu" class="form-control" placeholder="Nomor HP / WhatsApp (Tidak Wajib)" style="font-size: 12px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-left">
                                    <a href="/user/dasboard" class="btn btn-sm btn-danger" name="kembali">
                                        <i class="fas fa-arrow-left"></i>
                                        Kembali</a>
                                    <button type="submit" name="btn_simpan" class="btn btn-sm btn-success">
                                        <i class="fas fa-save"></i>
                                        Simpan </button>

                                </div>
                            </div>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </div>
</div>


<!-- /.container-fluid -->

<?= $this->endSection(); ?>